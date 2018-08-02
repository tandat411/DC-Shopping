@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Khách Hàng
                    <small>Edit</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="" method="POST">
                  <div class="form-group">
                      <label>Họ tên khách hàng  :</label>
                      <input class="form-control" name="CustomerName" placeholder="Nhập họ tên khách hàng" />
                  </div>
                  <div class="form-group">
                      <label>Ngày sinh :</label>
                      <input class="form-control" name="CustomerNgaySinh" placeholder="Nhập thông tin ngày sinh" />
                  </div>
                  <div class="form-group">
                      <label>Giới tính :</label>
                      <label class="radio-inline">
                          <input name="rdoStatus" value="Nam" checked="" type="radio">Nam
                      </label>
                      <label class="radio-inline">
                          <input name="rdoStatus" value="Nữ" type="radio">Nữ
                      </label>
                  </div>
                  <div class="form-group">
                      <label>Số điện thoại :</label>
                      <input class="form-control" name="CustomerSDT" placeholder="Nhập số điện thoại" />
                  </div>
                  <div class="form-group">
                      <label>Email:</label>
                      <input class="form-control" name="CustomerEmail" placeholder="Nhập thông tin email" />
                  </div>
                  <div class="form-group">
                      <label>Ngày tạo:</label>
                      <input class="form-control" name="CustomerNgayTao" placeholder="Nhập ngày tạo tài khoản" />
                  </div>
                  <div class="form-group">
                      <label>Ngày update:</label>
                      <input class="form-control" name="CustomerUpdate" placeholder="Nhập ngày update:" />
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
