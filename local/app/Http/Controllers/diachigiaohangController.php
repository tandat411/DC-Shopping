<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KhachHang;
use App\DiaChiGiaoHang;
class diachigiaohangController extends Controller
{
  public function getDanhSach(){
    $diachigiaohang=DiaChiGiaoHang::all();
    return view('admin.diachigiaohang.danhsach',['diachigiaohang'=>$diachigiaohang]);
  }
  public function getThem(){
    $khachhang=KhachHang::all();
    return view('admin.diachigiaohang.them',['khachhang'=>$khachhang]);
  }
  public function postThem(Request $request){
        $this->validate($request,[
          'dcgh_kh_id'=>'required',
          'dcgh_dia_chi'=>'required|min:10|max:100'
        ],
        [
          'dcgh_kh_id.required'=>'Bạn không được để trống mã khách hàng',
          'dcgh_dia_chi.required'=>'Bạn chưa nhập địa chỉ giao hàng',
          'dcgh_dia_chi.min'=>'Địa chỉ giao hàng phải lớn hơn 10 kí tự vui lòng nhập chính xác địa chỉ cụ thể',
          'dcgh_dia_chi.max'=>'Bạn không được nhập nhiều hơn 100 kí tự '
        ]);
        $diachigiaohang=new DiaChiGiaoHang;
        $diachigiaohang->dcgh_kh_id=$request->dcgh_kh_id;
        $diachigiaohang->dcgh_dia_chi=$request->dcgh_dia_chi;
        $diachigiaohang->save();
        return redirect('admin/diachigiaohang/them')->with('thongbao','Thêm thành công');
    }
    public function getSua(){
      return view('admin.diachigiaohang.sua');
    }
    public function getSua($id){
      $khachhang=KhachHang::all();
      $diachigiaohang=DiaChiGiaoHang::find($id);
      return view('admin.diachigiaohang.them',['khachhang'=>$khachhang,'diachigiaohang'=>$diachigiaohang]);
    }
    public function postSua(Request $request,$id){
          $diachigiaohang=DiaChiGiaoHang::find($id);
          $this->validate($request,[
            'dcgh_kh_id'=>'required',
            'dcgh_dia_chi'=>'required|min:10|max:100'
          ],
          [
            'dcgh_kh_id.required'=>'Bạn không được để trống mã khách hàng',
            'dcgh_dia_chi.required'=>'Bạn chưa nhập địa chỉ giao hàng',
            'dcgh_dia_chi.min'=>'Địa chỉ giao hàng phải lớn hơn 10 kí tự vui lòng nhập chính xác địa chỉ cụ thể',
            'dcgh_dia_chi.max'=>'Bạn không được nhập nhiều hơn 100 kí tự '
          ]);
          $diachigiaohang=new DiaChiGiaoHang;
          $diachigiaohang->dcgh_kh_id=$request->dcgh_kh_id;
          $diachigiaohang->dcgh_dia_chi=$request->dcgh_dia_chi;
          $diachigiaohang->save();
          return redirect('admin/diachigiaohang/sua/'.$id)->with('thongbao','Sửa thành công');
      }
      public function getXoa($id){
        $diachigiaohang=DiaChiGiaoHang::find($id);
        $diachigiaohang->delete();
        return redirect('admin/diachigiaohang/danhsach')->with('thongbao','Xóa thành công');
      }
}
