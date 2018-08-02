@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">  Danh Sách Người Dùng
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
                        <th>Mã người dùng</th>
                        <th>Mã loại người dùng</th>
                        <th>Họ tên người dùng</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Số điện thoại</th>
                        <th>Ngày Tạo</th>
                        <th>Ngày Update</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($nguoidung as $ng)
                  <tr class="odd gradeX" align="center">
                      <td>{{$ng->ng_id}}</td>
                      <td>{{$ng->nd_lnd__id}}</td>
                      <td>{{$ng->name}}</td>
                      <td>{{$ng->email}}</td>
                      <td>{{$ng->password}}</td>
                      <td>{{$ng->lnd_sdt}}</td>
                      <td>{{$ng->created_at}}</td>
                        <td>{{$ng->updated_at}}</td>
                      <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/nguoidung/xoa/{{$ng->ng_id}}"> Delete</a></td>
                      <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/nguoidung/sua/{{$ng->ng_id}}">Edit</a></td>
                  </tr>
                @endforeach
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

@endsection
