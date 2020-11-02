@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                   Thêm thương hiệu sản phẩm
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
                        <form action="{{URL::to('/save-brand-product')}}" method="post">
                            {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên thương hiệu</label>
                            <input type="text" class="form-control" name="brand_product_name" id="exampleInputEmail1" placeholder="Tên danh mục">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hiện thị</label>
                            <select class="form-control input-lg m-bot15" name="brand_product_status">
                                <option value="0">Ẩn</option>
                                <option  value="1">Hiện thị</option>
                            </select>
                        </div>
                        
                        <button type="submit" onclick="sweetalert();" name="add_brand_product" class="btn btn-info">Thêm danh mục</button>
                    </form>
                    <a href="{{URL::to('all-brand-product')}}"><button type="submit" name="add_brand_product" class="btn btn-info">Danh sách danh mục</button></a>
                    </div>

                </div>
            </section>

    </div>
    
</div>
@endsection