@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Địa Chỉ Giao Hàng
                    <small>Add</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
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
                <form action="admin/diachigiaohang/them" method="POST">
                  <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                  <select class="form-control" name="dcgh_kh_id">
                    @foreach($khachhang as $kh)
                      <option value="{{$kh->kh_id}}">{{$kh->kh_ten}}</option>
                    @endforeach
                  </select>
                  <div class="form-group">
                      <label>Địa chỉ  :</label>
                      <input class="form-control" name="dcgh_dia_chi" placeholder="Nhập vào địa chỉ giao hàng" />
                  </div>
                    <button type="submit" class="btn btn-default"> Add</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection
