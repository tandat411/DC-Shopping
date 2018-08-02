<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KhachHang;
class khachhangController extends Controller
{
    public function getDanhSach(){
      $khachhang=KhachHang::all();
      return view('admin.khachhang.danhsach',['khachhang'=>$khachhang]);
    }

    public function getSua($id){
      $khachhang=KhachHang::find($id);
      return view('admin.khachhang.sua',['khachhang'=>$khachhang]);
    }
    public function postSua(Request $request,$id){
      $khachhang=KhachHang::find($id);
      $this->validate($request,[
        'kh_ten'=>'required|min:3|max:100'
      ],
      [
        'kh_ten.required'=>'Bạn chưa nhập tên danh mục sản phẩm',
        'kh_ten.min'=>'tên danh mục sản phẩm chưa đủ 3 kí tự',
        'kh_ten.max'=>'Bạn chỉ nhập ít hơn 100 kí tự',
      ]);
          $khachhang->kh_ten=$request->kh_ten;
          $khachhang->kh_ngay_sinh=$request->kh_ngay_sinh;
          $khachhang->kh_gioi_tinh=$request->kh_gioi_tinh;
          $khachhang->kh_sdt=$request->kh_sdt;
          $khachhang->kh_email=$request->kh_email;
          $khachhang->created_at=$request->created_at;
          $khachhang->updated_at=$request->updated_at;
          $khachhang->save();
          return redirect('admin/khachhang/sua/'.$id)->with('thongbao','Sửa thành công');
      }
      public function getXoa($id){
        $khachhang=KhachHang::find($id);
        $khachhang->delete();
        return redirect('admin/khachhang/danhsach')->with('thongbao','Xoá thành công');
      }
}
