@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh Mục Sản Phẩm
                    <small>{{$danhmucsanpham->dmsp_ten}}</small>
                </h1>
            </div>
            @if(count($errors)>0)
                  <div class="alert alert-danger">
                    @foreach($errors->all() as $err)
                        {{$err}}<br>
                    @endforeach
                    </div>
              @endif
              @if(session('thongbao'))
              <div class="alert alert-success">{{session('thongbao')}}</div>
              @endif
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="admin/danhmucsanpham/sua/{{$danhmucsanpham->dmsp_id}}" method="POST">
                  <input type="hidden"name="_token" value="{{csrf_token()}}"/>
                  <div class="form-group">
                      <label>Tên danh mục  :</label>
                      <input class="form-control" name="dmsp_ten" placeholder="Nhập tên danh mục"
                             value={{$danhmucsanpham->dmsp_ten}} />
                  </div>
                  <div class="form-group">
                      <label>Parent :</label>
                      <select class="form-control" name="parent">
                          @foreach($parent as $item)
                              <option value="{{$item['dmsp_id']}}"
                              <?php
                              if($danhmucsanpham->parent == $item['dmsp_id']){
                                  echo "selected";
                              }
                              ?>
                              >{{$item['dmsp_ten']}}</option>
                          @endforeach
                      </select>
                  </div>
                  <div class="form-group">
                      <label>Trạng thái :</label>
                      <label class="radio-inline">
                          <input name="trang_thai" value="ON" checked="" type="radio">ON
                      </label>
                      <label class="radio-inline">
                          <input name="trang_thai" value="OFF" type="radio">OFF
                      </label>
                  </div>
                    <button type="submit" class="btn btn-default">Edit</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection
