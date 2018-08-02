@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">  Danh Sách Khách Hàng
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>Mã khách hàng</th>
                        <th>Họ tên khách hàng</th>
                        <th>Ngày sinh</th>
                        <th>Giới tính</th>
                        <th>Số điện thoại</th>
                        <th>Email</th>
                        <th>Ngày tạo</th>
                        <th>Ngày update</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="odd gradeX" align="center">
                        <td>1</td>
                        <td>Nguyễn Văn A</td>
                        <td>20/10/1997</td>
                        <td>Nam</td>
                        <td>123456789</td>
                        <td>nguyenvana@gmail.com</td>
                        <td>20/1/1991</td>
                        <td>22/5/1996</td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#">Edit</a></td>
                    </tr>
                    <tr class="even gradeC" align="center">
                      <td>2</td>
                      <td>Nguyễn Văn B</td>
                      <td>20/10/1998</td>
                      <td>Nữ</td>
                      <td>12345678911</td>
                      <td>nguyenvanb@gmail.com</td>
                      <td>20/1/1992</td>
                      <td>22/5/1997</td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#">Edit</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

@endsection
