@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Cước Phí Vận Chuyển
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
                <form action="admin/cuocphivanchuyen/them" method="POST">
                  <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                  <div class="form-group">
                      <label>Thành phố :</label>
                      <input class="form-control" name="cpvc_thanh_pho" placeholder="Nhập thành phố" />
                  </div>
                  <div class="form-group">
                      <label>Giá cước :</label>
                      <input class="form-control" name="cpvc_gia_cuoc" placeholder="Nhập giá cước" />
                  </div>
                  <div class="form-group">
                      <label>Mã loại thành phố  :</label>
                      <select class="form-control" name="tp_id">
                        @foreach($thanhpho as $tp)
                          <option value="{{$tp->tp_id}}">{{$tp->tp_name}}</option>
                        @endforeach
                      </select>
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
