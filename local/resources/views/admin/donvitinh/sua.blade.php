@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Đơn Vị Tính
                    <small>{{$donvitinh->donvitinh_ten}}</small>
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
                <form action="admin/donvitinh/sua/{{$donvitinh->donvitinh_id}}" method="POST">
                  <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                  <div class="form-group">
                      <label>Tên đơn vị  :</label>
                      <input class="form-control" name="donvitinh_ten" value="{{$donvitinh->donvitinh_ten}}" placeholder="Nhập đơn vị tính toán" />
                  </div>
                  <div class="form-group">
                      <label>Chú thích :</label>
                      <input class="form-control" name="chu_thich" value="{{$donvitinh->chu_thich}}" placeholder="Nhập chú thích" />
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
