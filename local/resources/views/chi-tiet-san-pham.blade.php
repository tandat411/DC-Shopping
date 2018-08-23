@extends('layouts.master-layout')

@section('title')
    <title>DC-Shopping</title>
@endsection

@section('header')
    @include('layouts.header')
@endsection

@section('navigation')
    @include('layouts.nav')
@endsection

@section('home')
@endsection

@section('content')
    <!-- BREADCRUMB -->
    <div id="breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{url('/')}}">Home</a></li>
                <li>{{$loaimathang->dmsp_ten}}</li>
                <li><a href="{{url('muc-san-pham/'.$loaisanpham->dmsp_id)}}">{{$loaisanpham->dmsp_ten}}</a></li>
                <li class="active">{{$sanpham->sp_ten}}</li>
            </ul>
        </div>
    </div>
    <!-- /BREADCRUMB -->

    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!--  Product Details -->
                <div class="product product-details clearfix">
                    <div class="col-md-6">
                        {{-- Hình ảnh sản phẩm --}}
                        <div id="product-main-view">
                            @foreach($hinhanh as $pic)
                            <div class="product-view">
                                <img src="uploads/sanpham/{{$pic['hasp_ten']}}" alt="">
                            </div>
                            @endforeach
                        </div>
                        <div id="product-view">
                            @foreach($hinhanh as $pic)
                                <div class="product-view">
                                    <img src="uploads/sanpham/{{$pic['hasp_ten']}}" alt="">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product-body">
                            {{-- Label sản phẩm mới/ khuyến mãi --}}
                            <div class="product-label">
                                <?php

                                    //Tìm xem sản phẩm này có được khách hàng đó yêu thích hay không
                                    if(isset($Customer)){
                                        $yeuthich = \App\SanPhamYeuThich::where('spyt_sp_id',$sanpham->sp_id)
                                            ->where('spyt_kh_id', $Customer['kh_id'])->count();
                                    }

                                    //Lấy danh sách bình luận về sản phẩm
                                    $binhluan = \App\BinhLuan::where('bl_sp_id', $sanpham->sp_id);

                                    //Lấy thông tin nhà sản xuất
                                    $nhasanxuat = \App\NhaSanXuat::find($sanpham->sp_nsx_id);

                                    //Lấy loại thuế của sản phẩm
                                    $mucthue = \App\MucThue::find($sanpham->sp_muc_thue_id);

                                    //Lấy thời gian hiện tại
                                    $now = \Carbon\Carbon::now('Asia/Ho_Chi_Minh');

                                    //Check ngày bán sản phẩm tới nay đã được 30 ngày hay chưa
                                    $checkDay = $now->diffInDays($sanpham->created_at);

                                    //Kiểm tra sản phẩm có thuộc loại sản phẩm khuyến mãi hay không: id = 2 là ko khuyến mãi
                                    if($sanpham->sp_khuyenMai_id != 2){
                                        //Lấy loại khuyến mãi của sản phẩm
                                        $khuyenmai = \App\LoaiKhuyenMai::find($sanpham->sp_khuyen_mai_id);

                                        //Ngày bắt đầu và ngày kết thúc khuyến mãi
                                        $end = Carbon\Carbon::parse($khuyenmai['km_ngay_ket_thuc']);
                                        $start = \Carbon\Carbon::parse($khuyenmai['km_ngay_bat_dau']);

                                        //Biến checkKM để kiểm tra ngày hiện tại có nằm trong ngày bắt đầu và
                                        //ngày kết thúc khuyến mãi hay không
                                        $checkKM = $now->between($start, $end);
                                    }
                                ?>
                                @if($checkDay <= 30)
                                <span>New</span>
                                @endif
                                @if($checkKM == true)
                                <span class="sale">-{{$khuyenmai->km_gia}} %</span>
                            </div>
                            <h2 class="product-name" id="nameProd">{{$sanpham->sp_ten}}</h2>
                            <h3 class="product-price">Giá mới: {{number_format($sanpham->sp_gia_ban)}} <u>đ</u>
                            {{-- Giá cũ = giá bán hiện tại / 1 - (giá khuyến mãi/100))--}}
                            <del class="product-old-price">
                                {{number_format($sanpham->sp_gia_ban / (1 - ($khuyenmai->km_gia/100)))}} <u>đ</u>
                            </del>
                            </h3>
                            @else
                                {{--Tên sản phẩm--}}
                            <h2 class="product-name" >{{$sanpham->sp_ten}}</h2>
                            <h3 class="product-price">Giá: {{number_format($sanpham->sp_gia_ban)}} <u>đ</u></h3>
                        </div>
                            @endif

                            {{--Phần Rating--}}
                            <div>
                                <div class="product-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o empty"></i>
                                </div>
                                @if($binhluan->count() == 0)
                                    <span>Chưa có bình luận nào</span>
                                @else
                                    <span>Có {{$binhluan->count()}} bình luận</span>
                                @endif
                            </div>
                            @if($sanpham->sp_so_luong_ton_kho > 0)
                            <strong>Tình trạng: <span style="color: #1c7430; size: 32px">CÒN HÀNG</span></strong>
                            @else
                                <div><strong>Tình trạng:</strong> <span style="color: #D50000">HẾT HÀNG</span></div>
                            @endif
                            {{--Nhà sản xuất--}}
                            <p><strong>Thương hiệu:</strong> {{$nhasanxuat->nsx_ten}}</p>

                            {{--Form thông tin đơn hàng--}}
                            <form method="post" action="{{url('user/gio-hang')}}">

                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <input type="hidden" name="id_SP" value="{{$sanpham->sp_id}}">
                                @if(isset($Customer))
                                <input type="hidden" name="id_KH" value="{{$Customer->kh_id}}">
                                @endif
                                <div class="product-options">
                                    <ul class="size-option">
                                        <li><span class="text-uppercase">Kích thước (Size) : </span></li>
                                        <li>
                                            <select name="sizeSelect" class="select-custom">
                                            @foreach($kichthuoc as $kt)
                                                <option><a>{{$kt->size_ten}}</a></option>
                                            @endforeach
                                            </select>
                                        </li>
                                        {{--<li><a class="active">S</a></li>
                                        <li><a>M</a></li>
                                        <li><a>L</a></li>
                                        <li><a>XL</a></li>
                                        <li><a>SL</a></li>
                                        <li><a>XL</a></li>
                                        <li><a>SL</a></li>--}}
                                        {{-- Đơn vị tính là inch (Tivi) --}}

                                    </ul>
                                    <ul class="color-option" id="color">
                                        <li><span class="text-uppercase">Màu:</span></li>
                                        <li>
                                            <select name="colorSelect" class="select-custom">
                                                @foreach($color as $item)
                                                    @foreach($item as $row)
                                                        <option style="background-color:{{$row['mau_code']}};"
                                                                value="{{$row['mau_code']}}">
                                                        </option>
                                                    @endforeach
                                                @endforeach
                                            </select>
                                        </li>
                                    </ul>
                                </div>
                                {{--SỐ lượng--}}
                                <div class="product-btns">
                                    <div class="qty-input">
                                        <span class="text-uppercase">Số lượng: </span>
                                        <input class="input" type="number" name="soluong" id="soluong" min="1" value="1">
                                        <div class="text-danger" id="error"></div>
                                    </div>
                                    <div style="margin-top: 5%">
                                    @if(Auth::check()) {{--Nếu khách hàng đã đăng nhập--}}
                                        {{--Nút mua ngay--}}
                                        <button class="btn primary-btn add-to-cart" type="submit" name="btMuaNgay" style="width: 40%">
                                            <i class="fa fa-shopping-bag"></i> Mua ngay
                                        </button>
                                        {{--Nút thêm vào giỏ hàng--}}
                                        <button class="btn primary-btn add-to-cart" type="submit" name="btThemVaoGio" style="width: 40%">
                                            <i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng
                                        </button>
                                    <div class="pull-right">
                                        <a class="main-btn icon-btn"
                                            @if($yeuthich > 0) {{--Nếu sản phẩm đã đc yêu thích--}}
                                            style="color: #D50000;cursor: pointer"
                                            title="Bỏ yêu thích"
                                            @else
                                            style="color: #30323A;cursor: pointer"
                                            title="Yêu thích"
                                            @endif
                                            onclick="
                                                    /*Biến vitri để lấy vị trí ban đầu trong trang html*/
                                                    var vitri = document.documentElement.scrollTop;
                                                    window.location = '{{url('love/'.$sanpham->sp_id.'/'.$UserLogin->nd_id)}}' + '/' + vitri;">
                                        <i class="fa fa-heart"></i></a>
                                    </div>
                                    </div>
                                    @else

                                        {{--Thông qua middleware thì khi chưa đăng nhập mà nhấn vào các nút này sẽ
                                        bắt người dùng vào trang đăng nhập --}}

                                        {{--Nút mua ngay khi chưa đang nhập--}}
                                        <button class="btn primary-btn add-to-cart" style="width: 40%">
                                            <i class="fa fa-shopping-bag"></i> Mua ngay
                                        </button>
                                        {{--Nút thêm vào giỏ hàng khi chưa đăng nhập--}}
                                        <button class="btn primary-btn add-to-cart"  style="width: 40%">
                                            <i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng
                                        </button>

                                    @endif

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /Product Details -->

                {{-- Phần xem mô tả, chi tiết, bình luận sản phẩm --}}
                <div class="col-md-12">
                    <div class="product-tab">
                        <ul class="tab-nav">
                            <li class="active"><a data-toggle="tab" href="#tab1">Mô tả</a></li>
                            <li><a data-toggle="tab" href="#tab1">Chi tiết</a></li>
                            <li><a data-toggle="tab" href="#tab2">Bình luận</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="tab1" class="tab-pane fade in active">
                                <p>{{$sanpham->sp_mo_ta}}</p>
                            </div>
                            <div id="tab2" class="tab-pane fade in">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="product-reviews">
                                            <div class="single-review">
                                                <div class="review-heading">
                                                    <div><a href="#"><i class="fa fa-user-o"></i> John</a></div>
                                                    <div><a href="#"><i class="fa fa-clock-o"></i> 27 DEC 2017 / 8:0 PM</a></div>
                                                    <div class="review-rating pull-right">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o empty"></i>
                                                    </div>
                                                </div>
                                                <div class="review-body">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute
                                                        irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                                </div>
                                            </div>

                                            <div class="single-review">
                                                <div class="review-heading">
                                                    <div><a href="#"><i class="fa fa-user-o"></i> John</a></div>
                                                    <div><a href="#"><i class="fa fa-clock-o"></i> 27 DEC 2017 / 8:0 PM</a></div>
                                                    <div class="review-rating pull-right">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o empty"></i>
                                                    </div>
                                                </div>
                                                <div class="review-body">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute
                                                        irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                                </div>
                                            </div>

                                            <div class="single-review">
                                                <div class="review-heading">
                                                    <div><a href="#"><i class="fa fa-user-o"></i> John</a></div>
                                                    <div><a href="#"><i class="fa fa-clock-o"></i> 27 DEC 2017 / 8:0 PM</a></div>
                                                    <div class="review-rating pull-right">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o empty"></i>
                                                    </div>
                                                </div>
                                                <div class="review-body">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute
                                                        irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                                </div>
                                            </div>

                                            <ul class="reviews-pages">
                                                <li class="active">1</li>
                                                <li><a href="#">2</a></li>
                                                <li><a href="#">3</a></li>
                                                <li><a href="#"><i class="fa fa-caret-right"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        @if(isset($UserLogin))
                                            <h4 class="text-uppercase">Viết bình luận</h4>
                                            <form class="review-form" method="post" action="{{url('chi-tiet-san-pham')}}">
                                                <div class="form-group">
                                                    <textarea class="input" name="txtBinhLuan" placeholder="Nhập bình luận.."></textarea>
                                                </div>
                                                <input type="submit" class="btn btn-danger" value="Gửi" style="width: 20%">
                                            </form>
                                    </div>
                                    @else
                                        <h4 class="text-uppercase">Vui lòng đăng nhập để viết bình luận</h4>
                                        <button class="btn btn-danger" onclick="window.location = '{{url('user/login')}}';">Đăng nhập</button>
                                </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
    </div>
        <!-- /container -->
    </div>
    <!-- /section -->

    {{--PHẦN DÀNH CHO NHỮNG SẢN PHẨM CÓ LIÊN QUAN--}}
    <?php
    $SPLQ = \App\SanPham::where('sp_danh_muc_id', $sanpham->sp_danh_muc_id)
        ->where('sp_id', '<>', $sanpham->sp_id)->get()->toArray();
    ?>
    @if($SPLQ != null)
    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h2 class="title">Sản phẩm liên quan</h2>
                    </div>
                </div>
                <!-- section title -->

                @foreach($SPLQ as $splq)
                    <!-- Product Single -->
                        <div class="col-md-4 col-sm-6 col-xs-6">
                            <div class="product product-single text-center" title="{{$splq['sp_ten']}}">
                                <div class="product-thumb">
                                    {{--Phần sản phẩm mới / khuyến mãi--}}
                                    <div class="product-label">
                                        <?php

                                        //Lấy hình ảnh đầu tiên trong list hình ảnh của sản phẩm
                                        $image = \App\HinhAnhSanPham::where('hasp_sp_id', $splq['sp_id'])->first();

                                        //Lấy ngày hiện tại
                                        $now = \Carbon\Carbon::now('Asia/Ho_Chi_Minh');

                                        //So sánh ngày hiện tại cách ngày bán sản phẩm là bao nhiêu ngày
                                        $checkDay = $now->diffInDays($splq['created_at']);

                                        //Lấy loại thuế của sản phẩm
                                        $mucthue = \App\MucThue::find($splq['sp_muc_thue_id']);

                                        //Tim xem sản phẩm này có nằm trong loại sản phẩm khuyến mãi hay không
                                        $khuyenmai = \App\LoaiKhuyenMai::find($splq['sp_khuyen_mai_id']);

                                        if($khuyenmai->km_id != 2){
                                            //Ngày bắt đầu và ngày kết thúc khuyến mãi
                                            $end = Carbon\Carbon::parse($khuyenmai['km_ngay_ket_thuc']);
                                            $start = \Carbon\Carbon::parse($khuyenmai['km_ngay_bat_dau']);

                                            $ngay = $now->diffInDays($end);
                                            $gio =  $end->hour - $now->hour;
                                            $phut = $end->minute - $now->minute;
                                            $giay = $end->second - $now->second;

                                            //Biến checkKM để kiểm tra ngày hiện tại có nằm trong ngày bắt đầu và
                                            //ngày kết thúc khuyến mãi hay không
                                            $checkKM = $now->between($start, $end);
                                        }
                                        ?>
                                        {{--Nếu ngày bắt đầu bán sản phẩm < 30 ngày thì được xem là sản phẩm mới--}}
                                        @if($checkDay <= 30)
                                            <span>New</span>
                                        @endif
                                        @if($khuyenmai->km_id != 2 && $checkKM == true)
                                            <span class="sale">-{{$khuyenmai->km_gia}}%</span>
                                    </div>
                                    {{--/Product-lable--}}
                                    <ul class="product-countdown">
                                        @if($ngay > 0)
                                            <li><span id="ngay">Còn {{$ngay}} ngày</span></li>
                                        @elseif($gio > 0)
                                            <li><span id="gio">Còn {{$gio}} tiếng</span></li>
                                        @elseif($phut > 0)
                                            <li><span id="phut">Còn {{$phut}} phút</span></li>
                                        @elseif($giay > 0)
                                            <li><span id="giay">Còn {{$giay}} giây</span></li>
                                        @endif
                                    </ul>
                                    @else
                                    </div>
                                    {{--/Product-lable--}}
                                @endif
                                {{--/Phần sản phẩm mới / khuyến mãi--}}

                                <button class="main-btn quick-view" onclick="window.location = '{{url('chi-tiet-san-pham/'.$splq['sp_id'])}}'">
                                    <i class="fa fa-search-plus"></i> Chi tiết
                                </button>
                                {{-- Hình ảnh sản phẩm --}}
                                <img src="{{asset('img/'.$image->hasp_ten)}}" alt="">
                            </div>
                            {{--Product-thumb--}}
                            <div class="product-body">
                                {{--Giá sản phẩm--}}
                                <h3 class="text-center">
                                    @if($checkKM == true)
                                        {{--Nếu là sản phẩm khuyến mãi sẽ có giá gốc kèm theo--}}
                                        {{number_format($splq['sp_gia_ban'])}} Đ
                                        <del class="product-old-price">
                                            {{-- Nếu sản phẩm thuộc loại không thuế id = 2 --}}
                                            @if($mucthue->mt_id == 2)
                                                {{-- Giá cũ = giá bán hiện tại + (giá niêm yết x (giá khuyến mãi/100))--}}
                                                {{number_format($splq['sp_gia_ban'] + ($splq['sp_gia_niem_yet']*($khuyenmai['km_gia']/100)))}} Đ
                                            @else
                                                {{-- Giá cũ = giá niêm yết + (giá niêm yết x (giá mức thuế/100)) --}}
                                                {{number_format($splq['sp_gia_niem_yet'] + ($splq['sp_gia_niem_yet']*($mucthue->mt_muc_thue/100)))}} Đ
                                            @endif
                                        </del>
                                    @else
                                        {{-- Nếu ko phải là sản phẩm khuyến mãi: lấy giá bán hiện tại(đã tính thuế) --}}
                                        {{number_format($splq['sp_gia_ban'])}} Đ
                                    @endif
                                </h3>
                                <h2 class="product-name"  style="overflow: hidden ;white-space: nowrap;text-overflow: ellipsis;">
                                    <a href="{{url('chi-tiet-san-pham/'.$splq['sp_id'])}}" style="font-family: 'Arial'">
                                        {{$splq['sp_ten']}}
                                    </a>
                                </h2>
                                <div class="product-btns text-center">
                                    {{--Nút yêu thích--}}
                                    @if(isset($UserLogin))  {{--Nếu khách hàng đã đăng nhập--}}
                                    <?php
                                    //Tìm xem sản phẩm này có được khách hàng đó yêu thích hay không
                                    if(isset($Customer)){
                                        $yeuthich = \App\SanPhamYeuThich::where('spyt_sp_id',$splq['sp_id'])
                                            ->where('spyt_kh_id', $Customer['kh_id'])->count();
                                    }
                                    ?>
                                    <button class="main-btn icon-btn" name="btLove"
                                            @if($yeuthich > 0) {{--Nếu sản phẩm đã đc yêu thích--}}
                                            style="color: #D50000;"
                                            title="Bỏ yêu thích"
                                            @else
                                            style="color: #30323A;"
                                            title="Yêu thích"
                                            @endif
                                            onclick="
                                                    /*Biến vitri để lấy vị trí ban đầu trong trang html*/
                                                    var a = document.documentElement.scrollTop;
                                                    window.location = '{{url('love/'.$splq['sp_id'].'/'.$UserLogin->nd_id)}}' + '/' + a;">
                                        <i class="fa fa-heart"></i>
                                    </button>
                                    @endif

                                    {{--Nút thêm vào giỏ hàng--}}
                                    <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</button>
                                </div>
                            </div>
                        </div>
                </div>
                <!-- /Product Single -->
                @endforeach
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->
    @endif
@endsection

@section('script')
    <script type="text/javascript" src="{{asset('/js/dat2.js')}}"></script>

    <script>
        $(document).ready(function () {

            //Lấy dữ liệu màu của sản phẩm
            var colorID = $('#color select').val();
            $('#color select').css('background-color', colorID).css('color', 'white');
            $('#color select').change(function () {
                colorID = $(this).val();
                $(this).css('background-color', colorID);
            });

            //Xử lý lỗi khi chọn số lượng < 0
            $('input[name="soluong"]').change(function () {
                if($(this).val() <= 0){
                    $('#error').html('Vui lòng nhập đúng số lượng cần mua');
                }else {
                    $('#error').html('');
                }
            });
        });
    </script>
    {{--Trả về vị trí ban đầu khi nhấn nút thích--}}
    @if(session('position'))
        <?php echo ' <script>document.documentElement.scrollTop ='.session('position').';</script>;' ?>
    @endif

@endsection

@section('footer')
    @include('layouts.footer')
@endsection