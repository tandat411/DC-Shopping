@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tin tức
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
                <form action="admin/tintuc/them" method="POST">
                  <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                  <div class="form-group">
                      <label>Loại tin tức  :</label>
                      <select class="form-control" name="tt_ltt_id">
                        @foreach($loaitintuc as $ltt)
                          <option value="{{$ltt->dmtt_id}}">{{$ltt->dmtt_ten}}</option>
                        @endforeach
                      </select>
                  </div>
                  <div class="form-group">
                      <label>Hình ảnh tin tức  :</label>
                      <input class="form-control" name="tt_hinh_anh" />
                  </div>
                  <div class="form-group">
                      <label>Tiêu đề :</label>
                      <input class="form-control" name="tt_tieu_de" placeholder="Nhập tiêu đề tin tức" />
                  </div>
                  <div class="form-group">
                      <label>Mô tả :</label>
                    <input class="form-control" name="tt_mo_ta" placeholder="Nhập tiêu đề tin tức" />
                  </div>
                  <div class="form-group">
                      <label>Nội dung :</label>
                      <input class="form-control" name="tt_noi_dung" placeholder="Nhập nội dung" />
                  </div>
                  <div class="form-group">
                      <label>Trạng thái:</label>
                      <label class="radio-inline">
                          <input name="trang_thai" value="Bật" checked="" type="radio">Bật
                      </label>
                      <label class="radio-inline">
                          <input name="trang_thai" value="Tắt" type="radio">Tắt
                      </label>
                  </div>
                  <div class="form-group">
                      <label>Ngày tạo:</label>
                      <input type="date" class="form-control" name="created_at" placeholder="Nhập ngày tạo tin tức" />
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
