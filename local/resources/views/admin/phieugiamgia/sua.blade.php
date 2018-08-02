@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Phiếu Giảm Giá
                    <small>{{$phieugiamgia->pgg_ten}}</small>
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
                <form action="admin/phieugiamgia/sua/{{$phieugiamgia->pgg_id}}" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                  <div class="form-group">
                      <label>Tên phiếu giảm giá  :</label>
                      <input class="form-control" name="pgg_ten" value="{{$phieugiamgia->pgg_ten}}"placeholder="Nhập tên phiếu giảm giá" />
                  </div>
                  <div class="form-group">
                      <label>Phiếu giảm(%) :</label>
                      <input class="form-control" name="pgg_giam_gia_percent" value="{{$phieugiamgia->pgg_giam_gia_percent}}" placeholder="Nhập phần trăm phiếu giảm giá" />
                  </div>

                  <div class="form-group">
                      <label>Ngày bắt đầu :</label>
                      <input type="datetime-local" class="form-control" name="pgg_ngay_bat_dau" placeholder="Nhập ngày bắt đầu của voucher" />
                  </div>
                  <div class="form-group">
                      <label>Ngày kết thúc:</label>
                      <input type="datetime-local" class="form-control" name="pgg_ngay_ket_thuc" placeholder="Nhập ngày kết thúc của voucher" />
                  </div>
                  <div class="form-group">
                      <label>Trạng thái :</label>
                      <label class="radio-inline">
                          <input name="trang_thai" value="Bật" checked="" type="radio">Bật
                      </label>
                      <label class="radio-inline">
                          <input name="trang_thai" value="Tắt" type="radio">Tắt
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
