@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sản Phẩm Edit
                    <small> {{$sanpham->sp_id}}</small>
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
            <!-- /.col-lg-12 -->

            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="admin/sanpham/sua/{{$sanpham->sp_id}}" method="POST">
                  <input type="hidden" name="_token" value="{{csrf_token()}}"/>

                  <div class="form-group">
                      <label>Tên sản phẩm:</label>
                      <input class="form-control" name="sp_ten" value="{{$sanpham->sp_ten}}"placeholder="Nhập tên sản phẩm" />
                  </div>
                  <div class="form-group">
                      <label>Số lượng tồn kho :</label>
                      <input class="form-control" name="sp_so_luong_ton_kho" value="{{$sanpham->sp_so_luong_ton_kho}}"placeholder="Nhập số lượng tồn kho sản phẩm" />
                  </div>
                  <div class="form-group">
                      <label>Giá niêm yết :</label>
                      <input class="form-control" name="sp_gia_niem_yet"value="{{$sanpham->sp_gia_niem_yet}}" placeholder="Nhập giá niêm yết" />
                  </div>
                  <div class="form-group">
                      <label>Giá bán :</label>
                      <input class="form-control" name="sp_gia_ban" value="{{$sanpham->sp_gia_ban}}"placeholder="Nhập giá bán sản phẩm" />
                  </div>
                  <div class="form-group">
                      <label>Mô tả :</label>
                      <input class="form-control" name="sp_mo_ta" value="{{$sanpham->sp_mo_ta}}"placeholder="Điền thông tin mô tả sản phẩm" />
                  </div>
                  <div class="form-group">
                      <label>Hình ảnh:</label>
                      <input class="form-control" name="sp_hinh_anh" />
                  </div>
                  <div class="form-group">
                      <label>Mã đơn vị tính   :</label>
                      <select class="form-control" name="sp_don_vi_tinh_id">
                        @foreach($donvitinh as $dvt)
                          <option value="{{$dvt->donvitinh_id}}">{{$dvt->donvitinh_ten}}</option>
                        @endforeach
                      </select>
                  </div>
                  <div class="form-group">
                      <label>Mã danh mục sản phẩm  :</label>
                      <select class="form-control" name="sp_danh_muc_id">
                        @foreach($danhmucsanpham as $dmsp)
                          <option value="{{$dmsp->dmsp_id}}">{{$dmsp->dmsp_ten}}</option>
                        @endforeach
                      </select>
                  </div>
                  <div class="form-group">
                      <label>Mã nhà sản xuất  :</label>
                      <select class="form-control" name="sp_nsx_id">
                        @foreach($nhasanxuat as $nsx)
                          <option value="{{$nsx->nsx_id}}">{{$nsx->nsx_ten}}</option>
                        @endforeach
                      </select>
                  </div>
                  <div class="form-group">
                      <label>Mã kho hàng  :</label>
                      <select class="form-control" name="sp_kho_hang_id">
                        @foreach($khohang as $kh)
                          <option value="{{$kh->khohang_id}}">{{$kh->khohang_ten}}</option>
                        @endforeach
                      </select>
                  </div>
                  <div class="form-group">
                      <label>Mã mục thuế  :</label>
                      <select class="form-control" name="sp_muc_thue_id">
                        @foreach($mucthue as $mt)
                          <option value="{{$mt->mt_id}}">{{$mt->mt_ten}}</option>
                        @endforeach
                      </select>
                  </div>
                  <div class="form-group">
                      <label>Mã khuyến mãi  :</label>
                      <select class="form-control" name="sp_khuyen_mai_id">
                        @foreach($khuyenmai as $km)
                          <option value="{{$km->km_id}}">{{$km->km_ten}}</option>
                        @endforeach
                      </select>
                  </div>
                  <div class="form-group">
                      <label>Trạng thái :</label>
                      <label class="radio-inline">
                          <input name="trang_thai" value="Yes" checked="" type="radio">Bật
                      </label>
                      <label class="radio-inline">
                          <input name="trang_thai" value="No" type="radio">Tắt
                      </label>
                  </div>
                  <div class="form-group">
                      <label>Ngày update:</label>
                      <input type="date" class="form-control" name="updated_at" placeholder="Nhập ngày update:" />
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
