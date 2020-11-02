<?php

namespace App\Http\Controllers;
use RealRashid\SweetAlert\Facades\Alert;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
Session_start();
use File;
use Image;
use Mail;
USE Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function add_product(){
        $cate_product=DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        $brand_product=DB::table('tbl_brand')->orderby('brand_id','desc')->get();
        return view('admin.add_product')->with('cate_product',$cate_product)->with('brand_product',$brand_product);
    }

    public function all_product(){
        $cate_product=DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        $brand_product=DB::table('tbl_brand')->orderby('brand_id','desc')->get();
        $all_product=DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')->orderby('product_id','desc')->get();
        $manager_product= view('admin.all_product')->with('all_product', $all_product);
        return view('admin_layout')->with('admin.all_product',$manager_product);
    }

    public function save_product(Request $request){
        $data= array();
        $data['product_name']=$request->product_name;
        $data['product_desc']=$request->product_desc;
        $data['product_content']=$request->product_content;
        $data['category_id']=$request->product_cate;
        $data['product_price']=$request->product_price;
        $data['brand_id']=$request->product_brand;
        $data['product_status']=$request->product_status;
        $get_image= $request->file('product_image');
        if ($get_image) {
            $get_name_image=$get_image->getClientOriginalName();
            $name_image= current(explode('.',$get_name_image));
            $new_image = $name_image.'.'.time().'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/upload/product',$new_image);
            $data['product_image']=$new_image;
            DB::table('tbl_product')->insert($data);
            Session::put('message','Thêm sản phẩm thành công');
            return Redirect::to('add-product');
        }
        $data['product_image']='';
       DB::table('tbl_product')->insert($data);
       Session::put('message','Thêm sản phẩm thành công');
       return Redirect::to('add-product');
    }

    public function unactive_product($product_id){
        DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>1]);
        Session::put('message','Không Kích hoạt danh mục sản phẩm thành công');
        return Redirect::to('all-product');
    }

    public function active_product($product_id){
        DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>0]);
        Session::put('message',' Kích hoạt danh mục sản phẩm thành công');
        return Redirect::to('all-product');
    }

    public function edit_product($product_id){
        $cate_product=DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        $brand_product=DB::table('tbl_brand')->orderby('brand_id','desc')->get();
        $edit_product=DB::table('tbl_product')->where('product_id',$product_id)->get();
        $manager_product= view('admin.edit_product')->with('edit_product', $edit_product)->with('cate_product',$cate_product)->with('brand_product',$brand_product);
        return view('admin_layout')->with('admin.edit_product',$manager_product);
    }

    public function update_product(Request $request,$product_id){
        $data= array();
        $data['product_id']=$request->product_id;
        $data['category_id']=$request->product_cate;
        $data['brand_id']=$request->product_brand;
        $data['product_name']=$request->product_name;
        $data['product_price']=$request->product_price;
        $data['product_content']=$request->product_content;
        $data['product_desc']=$request->product_desc;
        $data['product_status']=$request->product_status;
        $get_image= $request->file('product_image');
        if ($get_image) {
            $get_name_image=$get_image->getClientOriginalName();
            $name_image= current(explode('.',$get_name_image));
            $new_image = $name_image.'.'.time().'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/upload/product',$new_image);
            $data['product_image']=$new_image;
            DB::table('tbl_product')->where('product_id',$product_id)->update($data);
            Session::put('message','Update sản phẩm thành công');
            return Redirect::to('all-product');
        }
        DB::table('tbl_product')->where('product_id',$product_id)->update($data);
        Session::put('message',' Update sản phẩm thất bại');
        return Redirect::to('all-product');
    }
    public function delete_product($product_id){
        DB::table('tbl_product')->where('product_id',$product_id)->delete();
        Session::put('message',' Delete danh mục sản phẩm thành công');

        return Redirect::to('all-product');
    }
}
