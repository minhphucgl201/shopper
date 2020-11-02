@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                   Thêm danh mục sản phẩm
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
                        <form action="{{URL::to('/save-category-product')}}" method="post">
                            {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên danh mục</label>
                            <input type="text" class="form-control" name="category_product_name" id="exampleInputEmail1" placeholder="Tên danh mục">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mô tả danh mục</label>
                            <textarea style="resize: none;" class="form-control"rows="5" name="category_product_desc" id="exampleInputPassword1" placeholder="Mô tả danh mục" ></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hiện thị</label>
                            <select class="form-control input-lg m-bot15" name="category_product_status">
                                <option value="0">Ẩn</option>
                                <option  value="1">Hiện thị</option>
                            </select>
                        </div>
                        
                        <button type="submit" onclick="sweetalert();" name="add_category_product" class="btn btn-info">Thêm danh mục</button>
                    </form>
                    <a href="{{URL::to('all-category-product')}}"><button type="submit" name="add_category_product" class="btn btn-info">Danh sách danh mục</button></a>
                    </div>

                </div>
            </section>

    </div>
    
</div>
@endsection