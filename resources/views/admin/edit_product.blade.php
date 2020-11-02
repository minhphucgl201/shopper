@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                   Thêm sản phẩm
                </header>
                <div class="panel-body">
                    
                    <div class="position-center">
                        <?php 
                        $message= Session::get('message');
                        if ($message) {
                            echo '<div class="alert alert-success" role="alert">
                            '.$message.'
                            </div>';
                            Session::put('message',null);
                            }
                        ?>
                        @foreach ($edit_product as $key => $pro)
                        <form role="form" action="{{URL::to('/update-product/'.$pro->product_id)}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên sản phẩm</label>
                            <input type="text" class="form-control" name="product_name" id="exampleInputEmail1" placeholder="" value="{{$pro->product_name}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Danh mục sản phẩm</label>
                            <select class="form-control input-lg m-bot15" name="product_cate" placeholder="Chọn Danh mục sản phẩm">
                                @foreach     ($cate_product as $key => $cate)
                                    @if ($cate->category_id==$pro->category_id)
                                    <option selected value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                    
                                    @endif
                                    <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                    
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Thương hiệu sản phẩm</label>
                            <select class="form-control input-lg m-bot15" name="product_brand">
                                @foreach     ($brand_product as $key => $brand)
                                    @if ($brand->brand_id==$pro->brand_id)
                                        <option selected value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                    @endif
                                        <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Hình ảnh sản phẩm</label>
                            <input type="file" class="form-control" name="product_image" id="" >
                            <img src="{{URL::to('public/upload/product/'.$pro->product_image)}}" height="80px" width="100px" >
                            
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá sản phẩm</label>
                            <input type="text" class="form-control" value="{{$pro->product_price}}" name="product_price" id="exampleInputEmail1" placeholder="Tên danh mục">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mô tả sản phẩm</label>
                            <textarea style="resize: none;" value="" class="form-control" rows="5" name="product_desc" id="exampleInputPassword1"  >{{$pro->product_desc}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nội dung sản phẩm</label>
                            <textarea style="resize: none;" value="{{$pro->product_content}}" class="form-control"rows="5" name="product_content" id="exampleInputPassword1" placeholder="Mô tả danh mục" ></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hiện thị</label>
                            <select class="form-control input-lg m-bot15" name="product_status">
                                <option value="0">Ẩn</option>
                                <option  value="1">Hiện thị</option>
                            </select>
                        </div>
                        
                        <button type="submit" onclick="sweetalert();" name="add_product" class="btn btn-info">Thêm danh mục</button>
                    </form>
                        @endforeach
                        
                    <a href="{{URL::to('all-category-product')}}"><button type="submit" name="add_category_product" class="btn btn-info">Danh sách danh mục</button></a>
                    </div>

                </div>
            </section>

    </div>
    
</div>
@endsection