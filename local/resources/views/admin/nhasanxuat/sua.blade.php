@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Nhà Sản Xuất
                    <small>{{$nhasanxuat->nsx_ten}}</small>
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
                <form action="admin/nhasanxuat/sua/{{$nhasanxuat->nsx_id}}" method="POST" enctype="multipart/form-data">
                  <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                  <div class="form-group">
                      <label>Tên nhà cung cấp  :</label>
                      <input class="form-control" name="nsx_ten" value="{{$nhasanxuat->nsx_ten}}"placeholder="Nhập thông tin họ tên" />
                  </div>
                  <div class="form-group">
                      <label>Địa chỉ :</label>
                      <input class="form-control" name="nsx_dia_chi" value="{{$nhasanxuat->nsx_dia_chi}}" placeholder="Nhập thông tin địa chỉ chính xác" />
                  </div>
                  <div class="form-group">
                      <label>Số điện thoại :</label>
                      <input class="form-control" name="nsx_sdt" value="{{$nhasanxuat->nsx_sdt}}" placeholder="Nhập số điện thoại nhà cung cấp" />
                  </div>
                  <div class="form-group">
                      <label>Hình ảnh :</label>
                      <input class="form-control" type="file" name="nsx_hinh_anh"  />
                  </div>
                    <div class="form-group">
                        <label>Trạng thái:</label>
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
            <div class="col-lg-5 text-center">
                <div class="card-img">
                    <img  style="width: 100%" src="uploads/nhasanxuat/{{$nhasanxuat->nsx_hinh_anh}}">
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection
