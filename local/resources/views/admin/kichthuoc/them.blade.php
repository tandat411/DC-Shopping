@extends('admin.layout.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thêm hình cho sản phẩm
                        <small>Add</small>
                    </h1>
                </div>
                @if(count($errors)>0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $err)
                            {{$err}}<br>
                        @endforeach
                    </div>
                @endif
                @if(session('thongbao'))
                    <div class="alert alert-success">{{session('thongbao')}}</div>
            @endif
            <!-- /.col-lg-12 -->
                <!-- /.col-lg-12 -->

                <div class="col-lg-7" style="padding-bottom:120px">
                    <form action="{{url('admin/sanpham/them-kich-thuoc/'.$sp_id)}} " method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <div class="form-group">
                            <label>Tên kích thước</label>
                            <input type="text" class="form-control" name="size_ten" placeholder="Nhập tên kích thước" />
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
