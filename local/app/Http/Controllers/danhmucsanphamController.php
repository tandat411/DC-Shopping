<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DanhMucSanPham;
class danhmucsanphamController extends Controller
{
  public function getDanhSach(){
    $danhmucsanpham=DanhMucSanPham::all();
    return view('admin.danhmucsanpham.danhsach',['danhmucsanpham'=>$danhmucsanpham]);
  }
  public function getThem(){
    return view('admin.danhmucsanpham.them');
  }
  public function postThem(Request $request){
      $this->validate($request,[
        'dmsp_ten'=>'required|min:3|max:100',
        'parent'=>'required'
      ],
      [
        'parent.required'=>'Bạn chưa nhập parent cho ten danh mục sản phẩm',
        'dmsp_ten.required'=>'Bạn chưa nhập tên danh mục sản phẩm',
        'dmsp_ten.min'=>'tên danh mục sản phẩm chưa đủ 3 kí tự',
        'dmsp_ten.max'=>'Bạn chỉ nhập ít hơn 100 kí tự',
      ]);
      $danhmucsanpham=new DanhMucSanPham;
      $danhmucsanpham->dmsp_ten=$request->dmsp_ten;
      $danhmucsanpham->parent=$request->parent;
      $danhmucsanpham->trang_thai=$request->trang_thai;
      $danhmucsanpham->save();
      return redirect('admin/danhmucsanpham/them')->with('thongbao','Thêm thành công');
  }
  public function getSua($id){
    $danhmucsanpham=DanhMucSanPham::find($id);
    return view('admin.danhmucsanpham.sua',['danhmucsanpham'=>$danhmucsanpham]);
  }
  public function postSua(Request $request,$id){
    $danhmucsanpham=DanhMucSanPham::find($id);
      $this->validate($request,[
        'dmsp_ten'=>'required|min:3|max:100',
        'parent'=>'required'
      ],
      [
        'parent.required'=>'Bạn chưa nhập parent cho tên danh mục sản phẩm',
        'dmsp_ten.required'=>'Bạn chưa nhập tên danh mục sản phẩm',
        'dmsp_ten.min'=>'tên danh mục sản phẩm chưa đủ 3 kí tự',
        'dmsp_ten.max'=>'Bạn chỉ nhập ít hơn 100 kí tự',
      ]);
      $danhmucsanpham->dmsp_ten=$request->dmsp_ten;
      $danhmucsanpham->parent=$request->parent;
      $danhmucsanpham->trang_thai=$request->trang_thai;
      $danhmucsanpham->save();
      return redirect('admin/danhmucsanpham/sua/'.$id)->with('thongbao','Sửa thành công');
  }

  public function getXoa($id){
    $danhmucsanpham=DanhMucSanPham::find($id);
    $danhmucsanpham->delete();
    return redirect('admin/danhmucsanpham/danhsach')->with('thongbao','Xóa thành công');
  }
}
