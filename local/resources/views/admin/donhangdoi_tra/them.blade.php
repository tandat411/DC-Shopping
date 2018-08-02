@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Đơn Hàng Đổi Trả
                    <small>Add</small>
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
                <form action="admin/donhangdoi_tra/them" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                  <div class="form-group">
                      <label>Mã khách hàng  :</label>
                      <select class="form-control" name="dhdt_kh_id">
                        @foreach($khachhang as $kh)
                          <option value="{{$kh->kh_id}}">{{$kh->kh_ten}}</option>
                        @endforeach
                      </select>
                  </div>
                  <div class="form-group">
                      <label>Mã đơn hàng  :</label>
                      <select class="form-control" name="dhdt_dh_id">
                        @foreach($donhang as $dh)
                          <option value="{{$dh->dh_id}}">{{$dh->dh_id}}</option>
                        @endforeach
                      </select>
                  </div>
                  <div class="form-group">
                      <label>Ngày đổi trả  :</label>
                      <input class="form-control" name="dhdt_ngay_doi_tra" placeholder="Nhập ngày đổi tra" />
                  </div>
                  <div class="form-group">
                      <label>Thao tác :</label>
                      <input class="form-control" name="dhdt_thao_tac" placeholder="Nhập thao tác" />
                  </div>
                  <div class="form-group">
                      <label>Lý do :</label>
                      <input class="form-control" name="dhdt_ly_do" placeholder="Nhập lý do" />
                  </div>
                  <div class="form-group">
                      <label>Mã tình trạng  :</label>
                      <select class="form-control" name="dhdt_tinh_trang_id">
                        @foreach($tinhtrangdonhang as $ttdh)
                          <option value="{{$ttdh->tinh_trang_id}}">{{$ttdh->tinh_trang_ten}}</option>
                        @endforeach
                      </select>
                  </div>

                  <div class="form-group">
                      <label>Ngày tạo:</label>
                      <input type="date" class="form-control" name="created_at" placeholder="Nhập ngày tạo đơn hàng" />
                  </div>
                    <button type="submit" class="btn btn-default">Add</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection
