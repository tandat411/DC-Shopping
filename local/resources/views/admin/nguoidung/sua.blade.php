@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Người Dùng Edit
                    <small>{{$nguoidung->nd_id}}</small>
                </h1>
            </div>
            @if(count($errors)>0)
                <div class="alert alert-danger">
                  @foreach($errors->all() as $err)
                      {{$err}}<br>
                  @endforeach
                  <div>
            @endif
            @if(session('thongbao'))
            <div class="alert alert-success">{{session('thongbao')}}</div>
            @endif
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="admin/nguoidung/sua/{{$nguoidung->nd_id}}" method="POST">
                  <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                  <div class="form-group">
                      <label>Mã loại nhân viên  :</label>
                      <select class="form-control" name="nd_lnd__id">
                        @foreach($loainguoidung as $lnd)
                          <option value="{{$lnd->lnd_id}}">{{$lnd->lnd_ten}}</option>
                        @endforeach
                      </select>
                  </div>
                  <div class="form-group">
                      <label>Họ tên người dùng  :</label>
                      <input class="form-control" name="name" value="name"placeholder="Nhập họ tên người dùng" />
                  </div>
                  <div class="form-group">
                      <label>Email :</label>
                      <input class="form-control" name="email"value="email" placeholder="Nhập vào email" />
                  </div>
                  <div class="form-group">
                      <label>Password :</label>
                      <input type="password" class="form-control" name="password" value="password"placeholder="Nhập vào password" />
                  </div>
                  <div class="form-group">
                      <label>Số điện thoại :</label>
                      <input class="form-control" name="lnd_sdt" value="lnd_sdt"placeholder="Nhập số điện thoại" />
                  </div>

                  <div class="form-group">
                      <label>Update:</label>
                      <input type="date" class="form-control" name="updated_at" placeholder="Nhập ngày tạo :" />
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
