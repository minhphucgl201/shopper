@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Quản lí thương hiệu sản phẩm
      </div>
      <div class="row w3-res-tb">
        <div class="col-sm-5 m-b-xs">
          <select class="input-sm form-control w-sm inline v-middle">
            <option value="0">Bulk action</option>
            <option value="1">Delete selected</option>
            <option value="2">Bulk edit</option>
            <option value="3">Export</option>
          </select>
          <button class="btn btn-sm btn-default">Apply</button>                
        </div>
        <div class="col-sm-4">
        </div>
        <div class="col-sm-3">
          <div class="input-group">
            <input type="text" class="input-sm form-control" placeholder="Search">
            <span class="input-group-btn">
              <button class="btn btn-sm btn-default" type="button">Go!</button>
            </span>
          </div>
        </div>
      </div>
      <div class="table-responsive">
        <?php 
        $message= Session::get('message');
        if ($message) {
            echo '<div class="alert alert-success" role="alert">
            '.$message.'
            </div>';
            Session::put('message',null);
            }
        ?>
        <table class="table table-striped b-t b-light">
          <thead>
            <tr>
              <th style="width:20px;">
                <label class="i-checks m-b-none">
                  <input type="checkbox"><i></i>
                </label>
              </th>
              <th>Tên thương hiệu</th>
              <th>Hiện thị</th>
              <th>Action</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
            
        
               @foreach ($all_brand_product as $key => $brand_pro)
            <tr>
                <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                <td>{{$brand_pro->brand_name}}</td>
                <td><span class="text-ellipsis">
                  <?php 
                    if ($brand_pro->brand_status==0) {
                      ?>
                      <a href="{{URL::to('/unactive-brand-product/'.$brand_pro->brand_id)}}"><span class="text-success fa fa-thumbs-up fa-2x"></span></a>
                    <?php  }else{ ?>
                     <a href="{{URL::to('/active-brand-product/'.$brand_pro->brand_id)}}"><span class="text-danger fa fa-thumbs-down fa-2x"></span></a>
                     <?php }
                     ?> 
                </span></td>
                <td>
                  <a href="" class="active " ui-toggle-class="">
                    <a href="{{URL::to('/edit-brand-product/'.$brand_pro->brand_id)}}" ><i class="fa fa-pencil-square-o fa-2x text-success text-active" style="margin-right:10px;"></i></a>
                    <a href="{{URL::to('/delete-brand-product/'.$brand_pro->brand_id)}}" onclick="return confirm('Bạn có muốn xóa danh mục này?')" ><i class="fa fa-times fa-2x text-danger text "></i></a>
                  </a>
                </td>
                 
              </tr>
              @endforeach
            
           
            
            
          </tbody>
        </table>
      </div>
      <footer class="panel-footer">
        <div class="row text-right">
          
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                  <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                      <span class="sr-only">Previous</span>
                    </a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                      <span class="sr-only">Next</span>
                    </a>
                  </li>
                </ul>
              </nav>
        </div>
      </footer>
    </div>
  </div>
@endsection
<script type="text/javascript">
  function sweetalert(){
		
		}
</script>