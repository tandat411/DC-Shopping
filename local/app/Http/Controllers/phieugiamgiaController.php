<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PhieuGiamGia;
class phieugiamgiaController extends Controller
{
  public function getDanhSach(){
    $phieugiamgia=PhieuGiamGia::all();
    return view('admin.phieugiamgia.danhsach',['phieugiamgia'=>$phieugiamgia]);
  }
  public function getThem(){
    return view('admin.phieugiamgia.them');
  }
  public function postThem(Request $request){
        $this->validate($request,[
          'pgg_ten'=>'required|min:3|max:100',
          'pgg_giam_gia_percent'=>'required',
          'pgg_ngay_bat_dau'=>'required',
          'pgg_ngay_ket_thuc'=>'required',
        ],
        [
          'pgg_ten.required'=>'Bạn chưa nhập tên phiếu giảm giá',
          'pgg_ten.min'=>' Tên phiếu giảm giá chưa đủ 3 kì tự',
          'pgg_ten.max'=>'Bạn chi nhập được 100 kí tự',
          'pgg_giam_gia_percent.required'=>'Bạn chưa nhập phẩn trăm phiếu giảm giá',
          'pgg_ngay_bat_dau.required'=>'Bạn chưa nhập ngày bắt đầu của phiếu giảm giá',
          'pgg_ngay_ket_thuc.required'=>'Bạn chưa nhập ngày kết thúc của phiếu giảm giá'
        ]);
        $phieugiamgia=new PhieuGiamGia;
        $phieugiamgia->pgg_ten=$request->pgg_ten;
        $phieugiamgia->pgg_giam_gia_percent=$request->pgg_giam_gia_percent;
        $phieugiamgia->pgg_ngay_bat_dau=$request->pgg_ngay_bat_dau;
        $phieugiamgia->pgg_ngay_ket_thuc=$request->pgg_ngay_ket_thuc;
        $phieugiamgia->trang_thai=$request->trang_thai;
        $phieugiamgia->save();
        return redirect('admin/phieugiamgia/them')->with('thongbao','Thêm thành công');
    }
    public function getSua($id){
      $phieugiamgia=PhieuGiamGia::find($id);
      return view('admin.phieugiamgia.sua',['phieugiamgia'=>$phieugiamgia]);
    }
    public function postSua(Request $request,$id){
          $phieugiamgia=PhieuGiamGia::find($id);
          $this->validate($request,[
            'pgg_ten'=>'required|min:3|max:100',
            'pgg_giam_gia_percent'=>'required',
            'pgg_ngay_bat_dau'=>'required',
            'pgg_ngay_ket_thuc'=>'required',
          ],
          [
            'pgg_ten.required'=>'Bạn chưa nhập tên phiếu giảm giá',
            'pgg_ten.min'=>' Tên phiếu giảm giá chưa đủ 3 kì tự',
            'pgg_ten.max'=>'Bạn chi nhập được 100 kí tự',
            'pgg_giam_gia_percent.required'=>'Bạn chưa nhập phẩn trăm phiếu giảm giá',
            'pgg_ngay_bat_dau.required'=>'Bạn chưa nhập ngày bắt đầu của phiếu giảm giá',
            'pgg_ngay_ket_thuc.required'=>'Bạn chưa nhập ngày kết thúc của phiếu giảm giá'
          ]);
          $phieugiamgia->pgg_ten=$request->pgg_ten;
          $phieugiamgia->pgg_giam_gia_percent=$request->pgg_giam_gia_percent;
          $phieugiamgia->pgg_ngay_bat_dau=$request->pgg_ngay_bat_dau;
          $phieugiamgia->pgg_ngay_ket_thuc=$request->pgg_ngay_ket_thuc;
          $phieugiamgia->trang_thai=$request->trang_thai;
          $phieugiamgia->save();
          return redirect('admin/phieugiamgia/them')->with('thongbao','Thêm thành công');
      }
    public function getXoa($id){
      $phieugiamgia=PhieuGiamGia::find($id);
      $phieugiamgia->delete();
      return redirect('admin/phieugiamgia/danhsach')->with('thongbao','Xóa thành công');
  }
}
