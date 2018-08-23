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

    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                {{--Danh sách giỏ hàng--}}
                <div class="col-md-12">
                    <div class="order-summary clearfix text-center">
                        <div>
                            <h1 style="color: #D50000;"><i class="fa fa-check-circle"></i> SUCCESS</h1>
                        </div>
                        <div class="section-title">
                            <h3 class="title"><i class="fa fa-shopping-cart"></i> Bạn vừa mua hàng thành công với danh sách sản phẩm</h3>
                        </div>
                        @if($data != null)
                            <table class="shopping-cart-table table">
                                <thead>
                                <tr>
                                    <th>Sản phẩm</th>
                                    <th></th>
                                    <th class="text-center">Đơn giá</th>
                                    <th class="text-center">Số lượng</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $row)
                                    <tr>
                                        <td class="thumb"><img src="uploads/sanpham/{{$row['options']['img']}}" alt=""></td>
                                        <td class="details text-left">
                                            <a href="{{url('chi-tiet-san-pham/'.$row['id'])}}">{{$row['name']}}</a>
                                            <ul>
                                                <li><span>Size: {{$row['options']['size']}}</span></li>
                                                <li><span>Màu: {{$row['options']['color']}}</span></li>
                                            </ul>
                                        </td>
                                        <td class="price text-center"><strong>{{$row['price']}}</strong></td>
                                        <td class="qty text-center">
                                            <input name="soluong" class="input spin-off btn" type="number" value="{{$row['qty']}}" min="1" readonly>
                                        </td>
                                    </tr>
                                    <?php Cart::remove($row['rowId']); ?>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th colspan="4" class="text-center">
                                        <h2>Với tổng số tiền là {{number_format($total)}} <u>đ</u><br></h2>
                                        <h5> Đã bao gồm phí vận chuyển và VAT (Nếu có)</h5>
                                    </th>
                                </tr>
                                </tfoot>
                            </table>
                            <div>
                                <button class="primary-btn" onclick="window.location = '{{url('/')}}'">
                                    Tiếp tục mua hàng <i class="fa fa-arrow-right"></i>
                                </button>
                            </div>
                        @else
                            <div class="text-center" style="height: 500px">
                                <h1><i class="fa fa-shopping-cart"></i></h1>
                                <h1>Chưa có sản phẩm nào được thêm vào giỏ hàng.</h1>
                                <button class="btn" onclick="window.location = '{{url('/')}}' " style="background: #D50000; color: white;">
                                    <i class="fa fa-arrow-left"></i> TIẾP TỤC MUA SẮM
                                </button>
                            </div>
                        @endif
                    </div>
                </div>
                {{--/Danh sách giỏ hàng--}}
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->
@endsection
@section('script')
    <script type="text/javascript" src="{{asset('/js/dat2.js')}}"></script>
@endsection

@section('footer')
    @include('layouts.footer')
@endsection