@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                   Update danh mục sản phẩm
                </header>
                <?php 
                $message= Session::get('message');
                if ($message) {
                    echo '<div class="alert alert-success" role="alert">
                    '.$message.'
                    </div>';
                    Session::put('message',null);
                    }
                ?>
                <div class="panel-body">
                   
                   
                    @foreach ($edit_brand_product as $key =>$edit_value)
                    <div class="position-center">
                           
                        
                        <form action="{{URL::to('/update-brand-product/'.$edit_value->brand_id)}}" method="post">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên thương hiệu</label>
                                <input type="text" class="form-control" value="{{$edit_value ->brand_name}}" name="brand_product_name" id="exampleInputEmail1" placeholder="Tên danh mục">
                            </div>
                            
                            
                            
                            <button type="submit" name="update_brand_product" class="btn btn-info">Update danh mục</button>
                        </form>
                        <a href="{{URL::to('all-brand-product')}}"><button type="submit" name="add_brand_product" class="btn btn-info">Danh sách danh mục</button></a>
                    </div>
                    @endforeach
                    
                </div>
            </section>

    </div>
    
</div>
@endsection