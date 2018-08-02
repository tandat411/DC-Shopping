@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Đơn Hàng Edit
                    <small> {{$donhang->dh_id}}</small>
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
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="admin/donhang/sua/{{$donhang->dh_id}}" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <div class="form-group">
                        <label>Mã khách hàng  :</label>
                        <select class="form-control" name="dh_kh_id">
                          @foreach($khachhang as $kh)
                            <option value="{{$kh->kh_id}}">{{$kh->kh_ten}}</option>
                          @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Mã phiếu giảm giá  :</label>
                        <select class="form-control" name="dh_pgg_id">
                          @foreach($phieugiamgia as $pgg)
                            <option value="{{$pgg->pgg_id}}">{{$pgg->pgg_ten}}</option>
                          @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Loại thanh toán  :</label>
                        <select class="form-control" name="dh_ltt_id">
                          @foreach($loaithanhtoan as $ltt)
                            <option value="{{$ltt->ltt_id}}">{{$ltt->ltt_ten}}</option>
                          @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Mã nhân viên  :</label>
                        <select class="form-control" name="dh_nv_id">
                          @foreach($nhanvien as $nv)
                            <option value="{{$nv->nv_id}}">{{$nv->nv_ten}}</option>
                          @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Mã tình trạng  :</label>
                        <select class="form-control" name="dh_tinh_trang_id">
                          @foreach($tinhtrangdonhang as $ttdh)
                            <option value="{{$ttdh->tinh_trang_id}}">{{$ttdh->tinh_trang_ten}}</option>
                          @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Mã cước phí vận chuyển  :</label>
                        <select class="form-control" name="dh_cpvc_id">
                          @foreach($cuocphivanchuyen as $cpvc)
                            <option value="{{$cpvc->cpvc_id}}">{{$cpvc->cpvc_id}}</option>
                          @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tổng tiền đơn hàng  :</label>
                        <input class="form-control" name="dh_tong_tien" value="{{$donhang->dh_tong_tien}}" placeholder="Nhập tổng tiền đơn hàng" />
                    </div>
                    <div class="form-group">
                        <label>Ngày đặt hàng :</label>
                        <input type="date"class="form-control" name="dh_ngay_dat_hang" value="{{$donhang->dh_ngay_dat_hang}}" placeholder="Nhập ngày đặt hàng" />
                    </div>
                    <div class="form-group">
                        <label>Ngày giao hàng :</label>
                      <input type="date" class="form-control" name="dh_ngay_giao_hang"  value="{{$donhang->dh_ngay_giao_hang}}" placeholder="Nhập ngày giao hàng" />
                    </div>
                    <div class="form-group">
                        <label>Ngày tạo:</label>
                        <input type="date"class="form-control" name="created_at" placeholder="Nhập ngày tạo tài khoản" />
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
