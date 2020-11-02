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
                        <form role="form" action="{{URL::to('/save-product')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên sản phẩm</label>
                            <input type="text" class="form-control" name="product_name" id="exampleInputEmail1" placeholder="Tên danh mục">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Danh mục sản phẩm</label>
                            <select class="form-control input-lg m-bot15" name="product_cate" placeholder="Chọn Danh mục sản phẩm">
                                @foreach     ($cate_product as $key => $cate)
                                <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                    
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Thương hiệu sản phẩm</label>
                            <select class="form-control input-lg m-bot15" name="product_brand">
                                @foreach     ($brand_product as $key => $brand)
                                <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                    
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Hình ảnh sản phẩm</label>
                            <input type="file" class="form-control" name="product_image" id="" placeholder="Tên danh mục">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá sản phẩm</label>
                            <input type="text" class="form-control" name="product_price" id="exampleInputEmail1" placeholder="Tên danh mục">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mô tả sản phẩm</label>
                            <textarea style="resize: none;" class="form-control"rows="5" name="product_desc" id="exampleInputPassword1" placeholder="Mô tả danh mục" ></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nội dung sản phẩm</label>
                            <textarea style="resize: none;" class="form-control"rows="5" name="product_content" id="exampleInputPassword1" placeholder="Mô tả danh mục" ></textarea>
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
                    <a href="{{URL::to('all-category-product')}}"><button type="submit" name="add_category_product" class="btn btn-info">Danh sách danh mục</button></a>
                    </div>

                </div>
            </section>

    </div>
    
</div>
@endsection