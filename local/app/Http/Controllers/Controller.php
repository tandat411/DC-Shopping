<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    //Trang chủ
    public function getHome(){
        return view('index');
    }

    //Trang tin tức
    public function getNew($id){

    }

    //Trang giới thiệu
    public function getGioiThieu(){
        return view('gioi-thieu');
    }

    //Trang Chính sách vận chuyển
    public function getChinhSachVanChuyen(){
        return view('chinh-sach-van-chuyen');
    }

    //Trang Quy định về Chính sách
    public function getQuyDinhVaChinhSach(){
        return view('quy-dinh-ve-chinh-sach');
    }

    //Trang Chính sách đổi trả
    public function getChinhSachDoiTra(){
        return view('chinh-sach-doi-tra');
    }

    //Trang Chính sách bảo mật
    public function getChinhSachBaoMat(){
        return view('chinh-sach-bao-mat');
    }

    //Trang Chính sách bảo hành
    public function getChinhSachBaoHanh(){
        return view('chinh-sach-bao-hanh');
    }

    //Trang quên mật khẩu của khách hàng
    public function getForgotPasswordUser(){
        return view('forgot-password');
    }


}
