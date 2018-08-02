<?php

namespace App\Http\Controllers;
use App\LoaiKhuyenMai;
use Illuminate\Http\Request;
use Carbon\Carbon;
class loaikhuyenmaiController extends Controller
{
  public function getDanhSach(){
    $loaikhuyenmai=LoaiKhuyenMai::all();
    return view('admin.loaikhuyenmai.danhsach',['loaikhuyenmai'=>$loaikhuyenmai]);
  }
  public function getThem(){
    return view('admin.loaikhuyenmai.them');
  }
  public function postThem(Request $request){
      $this->validate($request,[
        'km_ten'=>'required|min:3|max:100',
        'km_gia'=>'required|min:6|max:10',
        'km_ngay_bat_dau'=>'required',
        'km_ngay_ket_thuc'=>'required'
      ],
      [
        'km_gia.required'=>'Bạn chưa nhập giá khuyến mãi',
        'km_gia.min'=>'Giá khuyến mãi chưa đủ 6 số',
        'km_gia.max'=>'Bạn chỉ nhập ít hơn 10 kí tự',
        'km_ngay_ket_thuc.required'=>'Bạn chưa nhập ngày khuyến mãi kết thúc',
        'km_ngay_bat_dau.required'=>'Bạn chưa nhập ngày khuyến mãi bắt đầu',
        'km_ten.required'=>'Bạn chưa nhập tên danh mục khuyến mãi',
        'km_ten.min'=>'Tên danh mục sản phẩm chưa đủ 3 kí tự',
        'km_ten.max'=>'Bạn chỉ nhập ít hơn 100 kí tự',
      ]);
      $loaikhuyenmai=new LoaiKhuyenMai;
      $loaikhuyenmai->km_ten=$request->km_ten;
      $loaikhuyenmai->km_gia=$request->km_gia;
      $loaikhuyenmai->km_ngay_bat_dau=$request->km_ngay_bat_dau;
      $loaikhuyenmai->km_ngay_ket_thuc=$request->km_ngay_ket_thuc;
      $loaikhuyenmai->trang_thai=$request->trang_thai;
      $loaikhuyenmai->save();
      return redirect('admin/loaikhuyenmai/them')->with('thongbao','Thêm thành công');
  }

  public function getSua($id){
      $loaikhuyenmai=LoaiKhuyenMai::find($id);
    return view('admin.loaikhuyenmai.sua',['loaikhuyenmai'=>$loaikhuyenmai]);
  }
  public function postSua(Request $request,$id){
    $current = Carbon::now();
    $ngay_ket_thuc=$dt->addMonth();
    $loaikhuyenmai=LoaiKhuyenMai::find($id);
    $this->validate($request,[
      'km_ten'=>'required|min:3|max:100',
      'km_gia'=>'required|min:6|max:10',
      'km_ngay_bat_dau'=>'required',
      'km_ngay_ket_thuc'=>'required'
    ],
    [
      'km_gia.required'=>'Bạn chưa nhập giá khuyến mãi',
      'km_gia.min'=>'Giá khuyến mãi chưa đủ 6 số',
      'km_gia.max'=>'Bạn chỉ nhập ít hơn 10 kí tự',
      'km_ngay_ket_thuc.required'=>'Bạn chưa nhập ngày khuyến mãi kết thúc',
      'km_ngay_bat_dau.required'=>'Bạn chưa nhập ngày khuyến mãi bắt đầu',
      'km_ten.required'=>'Bạn chưa nhập tên danh mục khuyến mãi',
      'km_ten.min'=>'Tên danh mục sản phẩm chưa đủ 3 kí tự',
      'km_ten.max'=>'Bạn chỉ nhập ít hơn 100 kí tự',
    ]);
      $loaikhuyenmai->km_ten=$request->km_ten;
      $loaikhuyenmai->km_gia=$request->km_gia;
      $loaikhuyenmai->km_ngay_bat_dau=$current;
      $loaikhuyenmai->km_ngay_ket_thuc=$ngay_ket_thuc;
      $loaikhuyenmai->trang_thai=$request->trang_thai;
      $loaikhuyenmai->save();
      return redirect('admin/loaikhuyenmai/sua/'.$id)->with('thongbao','Sửa thành công');
  }
  public function getXoa($id){
      $loaikhuyenmai=LoaiKhuyenMai::find($id);
      $loaikhuyenmai->delete();
    return redirect('admin/loaikhuyenmai/danhsach')->with('thongbao','Xóa thành công');
  }
}
