@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Mục Thuế
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
                <form action="admin/mucthue/them" method="POST">
                  <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                  <div class="form-group">
                      <label>Tên mục thuế  :</label>
                      <input class="form-control" name="mt_ten"placeholder="Nhập tên mục thuế" />
                  </div>
                  <div class="form-group">
                      <label>Mục thuế(%) :</label>
                      <input class="form-control" name="mt_muc_thue_percent" placeholder="Nhập phẩn trăm thuế" />
                  </div>
                  <div class="form-group">
                      <label>Mã loại nhân viên  :</label>
                      <select class="form-control" name="mt_loai_thue">
                        @foreach($loaithue as $lt)
                          <option value="{{$lt->loai_thue_id}}">{{$lt->loai_thue_ten}}</option>
                        @endforeach
                      </select>
                  </div>
                  <div class="form-group">
                      <label>Ngày tạo:</label>
                      <input type="date" class="form-control" name="created_at" placeholder="Nhập ngày tạo mục thuế" />
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
