@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh Sách Mục Thuế
                </h1>
            </div>
            @if(count($errors)>0)
                <div class="alert alert-damter">
                  @foreach($errors->all() as $err)
                      {{$err}}<br>
                  @endforeach
                  <div>
            @endif
            @if(session('thomtbao'))
            <div class="alert alert-success">{{session('thomtbao')}}</div>
            @endif
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>Mã mục thuế</th>
                        <th>Tên mục thuế</th>
                        <th>Mục thuế (%)</th>
                        <th>mtày Tạo</th>
                        <th>mtày Update</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($mucthue as $mt)
                  <tr class="odd gradeX" align="center">
                      <td>{{$mt->mt_id}}</td>
                      <td>{{$mt->mt_ten}}</td>
                      <td>{{$mt->mt_muc_thue_percent}}</td>
                      <td>{{$mt->mt_loai_thue}}</td>
                      <td>{{$mt->created_at}}</td>
                      <td>{{$mt->updated_at}}</td>
                      <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/mucthue/xoa/{{$mt->mt_id}}"> Delete</a></td>
                      <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/mucthue/sua/{{$mt->mt_id}}">Edit</a></td>
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
