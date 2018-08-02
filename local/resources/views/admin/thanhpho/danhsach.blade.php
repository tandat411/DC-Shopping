@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">  Danh Sách Thành Phố
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>Mã thành phố</th>
                        <th>Tên thành phố</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($thanhpho as $tp)
                  <tr class="odd gradeX" align="center">
                      <td>{{$tp->tp_id}}</td>
                      <td>{{$tp->tp_name}}</td>
                      <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/thanhpho/xoa/{{$tp->tp_id}}"> Delete</a></td>
                      <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/thanhpho/sua/{{$tp->tp_id}}">Edit</a></td>
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
