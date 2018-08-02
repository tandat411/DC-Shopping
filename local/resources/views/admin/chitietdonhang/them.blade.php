@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                  <h1 class="page-header">  Chi Tiết Đơn Hàng
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
                <form action="admin/chitietdonhang/them" method="POST">
                  <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                  <div class="form-group">
                      <label>Mã sản phẩm  :</label>
                      <select class="form-control" name="ctdh_sp_id">
                        @foreach($sanpham as $sp)
                          <option value="{{$sp->sp_id}}">{{$sp->sp_ten}}</option>
                        @endforeach
                      </select>
                  </div>
                  <div class="form-group">
                      <label>Mã đơn hàng  :</label>
                      <select class="form-control" name="ctdh_dh_id">
                        @foreach($donhang as $dh)
                          <option value="{{$dh->dh_id}}">{{$dh->dh_id}}</option>
                        @endforeach
                      </select>
                  </div>
                  <div class="form-group">
                      <label>Số lượng  :</label>
                      <input class="form-control" name="ctdh_so_luong" placeholder="Nhập số lượng" />
                  </div>
                  <div class="form-group">
                      <label>Giá bán :</label>
                      <input class="form-control" name="ctdh_gia_ban" placeholder="Nhập giá bán" />
                  </div>
                  <div class="form-group">
                      <label>Ngày tạo:</label>
                      <input type="datetime-local" class="form-control" name="created_at"  placeholder="Nhập ngày tạo đơn hàng chi tiết" />
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
