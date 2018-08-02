@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">  Danh Sách Địa Chỉ Giao Hàng
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>Số thứ tự địa chỉ giao hàng</th>
                        <th>Mã khách hàng</th>
                        <th>Địa chỉ</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($diachigiaohang as $dcgh)
                  <tr class="odd gradeX" align="center">
                      <td>{{$dcgh->dcgh_stt}}</td>
                      <td>{{$dcgh->dcgh_kh_id}}</td>
                      <td>{{$dcgh->dcgh_dia_chi}}</td>
                      <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/phieugiamgia/xoa/{{$dcgh->dcgh_stt}}"> Delete</a></td>
                      <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/phieugiamgia/sua/{{$dcgh->dcgh_stt}}">Edit</a></td>
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
