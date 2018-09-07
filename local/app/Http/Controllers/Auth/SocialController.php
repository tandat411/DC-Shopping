<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\KhachHang;
use App\LoaiNguoiDung;
use App\NguoiDung;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function redirect($social){
        return Socialite::driver($social)->redirect();
    }

    public function callback($social){
        if(!isset($_GET['error'])) {
            $user                      = Socialite::driver($social)->stateless()->user();

            $nguoidung                 = NguoiDung::where('email', $user->email)->first();
            $loainguoidung             = LoaiNguoiDung::where('lnd_ten', $social)->first();

            if(!$nguoidung){
                $nguoidung             = new NguoiDung();
                $nguoidung->nd_lnd_id  = $loainguoidung->lnd_id;
                $nguoidung->name       = $user->name;
                $nguoidung->email      = $user->email;
                $nguoidung->password   = bcrypt("");
                $nguoidung->created_at = Carbon::now();
                $nguoidung->updated_at = Carbon::now();
                $nguoidung->save();

                $item                  = new KhachHang();
                $item->kh_ten          = $user->name;
                $item->kh_email        = $user->email;
                $item->kh_ngay_sinh    = "";
                $item->kh_gioi_tinh    = "";
                $item->kh_sdt          = "";
                $item->created_at      = Carbon::now();
                $item->updated_at      = Carbon::now();
                $item->save();

                Auth::login($nguoidung);
            }else{
                Auth::login($nguoidung);
            }

            return redirect('/');
        }
        return redirect('user/login');
    }
}
