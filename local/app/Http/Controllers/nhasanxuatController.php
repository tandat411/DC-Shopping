<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NhaSanXuat;
class nhasanxuatController extends Controller
{
  public function getDanhSach(){
    $nhasanxuat=NhaSanXuat::all();
    return view('admin.nhasanxuat.danhsach',['nhasanxuat'=>$nhasanxuat]);
  }
  public function getThem(){
    return view('admin.nhasanxuat.them');
  }
  public function postThem(Request $request){
        $this->validate($request,[
          'nsx_ten'=>'required|min:3|max:100',
          'nsx_dia_chi'=>'required|min:3|max:100',
          'nsx_sdt'=>'required|min:3|max:100'
        ],
        [
          'nsx_ten.required'=>'Bạn chưa nhập tên nhà sản xuất',
          'nsx_ten.min'=>' tên nhà sản xuất chưa đủ 3 kì tự',
          'nsx_ten.max'=>'Bạn chi nhập được 100 kí tự',
          'nsx_dia_chi.required'=>'Bạn chưa nhập địa chỉ',
          'nsx_dia_chi.min'=>'Địa chỉ chưa đủ 3 kì tự',
          'nsx_dia_chi.max'=>'Bạn chi nhập được 100 kí tự',
          'nsx_sdt.required'=>'Bạn chưa nhập số điện thoại',
          'nsx_sdt.min'=>'Số điện thoại chưa đủ 9 số',
          'nsx_sdt.max'=>'Bạn chi nhập được 11 số',
        ]);
        $nhasanxuat=new NhaSanXuat;
        $nhasanxuat->nsx_ten=$request->nsx_ten;
        $nhasanxuat->nsx_dia_chi=$request->nsx_dia_chi;
        $nhasanxuat->nsx_sdt=$request->nsx_sdt;
        $nhasanxuat->nsx_hinh_anh=$request->nsx_hinh_anh;
        $nhasanxuat->trang_thai=$request->trang_thai;
        $nhasanxuat->save();
        return redirect('admin/nhasanxuat/them')->with('thongbao','Thêm thành công');
    }
    public function getSua($id){
      $nhasanxuat=NhaSanXuat::find($id);
      return view('admin.nhasanxuat.sua',['nhasanxuat'=>$nhasanxuat]);
    }
    public function postSua(Request $request,$id){
          $nhasanxuat=NhaSanXuat::find($id);
          $this->validate($request,[
            'nsx_ten'=>'required|min:3|max:100',
            'nsx_dia_chi'=>'required|min:3|max:100',
            'nsx_sdt'=>'required|min:9|max:11'
          ],
          [
            'nsx_ten.required'=>'Bạn chưa nhập tên nhà sản xuất',
            'nsx_ten.min'=>' tên nhà sản xuất chưa đủ 3 kì tự',
            'nsx_ten.max'=>'Bạn chi nhập được 100 kí tự',
            'nsx_dia_chi.required'=>'Bạn chưa nhập địa chỉ',
            'nsx_dia_chi.min'=>'Địa chỉ chưa đủ 3 kì tự',
            'nsx_dia_chi.max'=>'Bạn chi nhập được 100 kí tự',
            'nsx_sdt.required'=>'Bạn chưa nhập số điện thoại',
            'nsx_sdt.min'=>'Số điện thoại chưa đủ 9 số',
            'nsx_sdt.max'=>'Bạn chi nhập được 11 số',
          ]);
          $nhasanxuat->nsx_ten=$request->nsx_ten;
          $nhasanxuat->nsx_dia_chi=$request->nsx_dia_chi;
          $nhasanxuat->nsx_sdt=$request->nsx_sdt;
          $nhasanxuat->nsx_hinh_anh=$request->nsx_hinh_anh;
          $nhasanxuat->trang_thai=$request->trang_thai;
          $nhasanxuat->save();
          return redirect('admin/nhasanxuat/sua/'.$id)->with('thongbao','Sửa thành công');
      }
    public function getXoa($id){
      $nhasanxuat=NhaSanXuat::find($id);
      $nhasanxuat->delete();
      return redirect('admin/nhasanxuat/danhsach')->with('thongbao','Xóa thành công');
  }
}
