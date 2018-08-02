@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">  Danh Sách Đơn Hàng
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
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>Mã hóa đơn đặt hàng</th>
                        <th>Mã khách hàng</th>
                        <th>Mã phiếu giảm giá</th>
                        <th>Mã loại thanh toán</th>
                        <th>Mã nhân viên</th>
                        <th>Mã cước phí vận chuyển</th>
                        <th>Mã tình trạng</th>
                        <th>Tổng tiền</th>
                        <th>Ngày đặt hàng</th>
                        <th>Ngày giao hàng</th>
                        <th>Ngày Tạo</th>
                        <th>Ngày Update</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($donhang as $dh)
                  <tr class="odd gradeX" align="center">
                      <td>{{$dh->dh_id}}</td>
                      <td>{{$dh->dh_kh_id}}</td>
                      <td>{{$dh->dh_pgg_id}}</td>
                      <td>{{$dh->dh_ltt_id}}</td>
                      <td>{{$dh->dh_nv_id}}</td>
                      <td>{{$dh->dh_tinh_trang_id}}</td>
                      <td>{{$dh->dh_cpvc_id}}</td>
                      <td>{{$dh->dh_tong_tien}}</td>
                      <td>{{$dh->dh_ngay_dat_hang}}</td>
                      <td>{{$dh->dh_ngay_giao_hang}}</td>
                      <td>{{$dh->created_at}}</td>
                      <td>{{$dh->updated_at}}</td>
                      <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/donhang/xoa/{{$dh->dh_id}}"> Delete</a></td>
                      <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/donhang/sua/{{$dh->dh_id}}">Edit</a></td>
                  </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

@endsection
