<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DonViTinh;
use App\DanhMucSanPham;
use App\NhaSanXuat;
use App\KhoHang;
use App\Mucthue;
use App\LoaiKhuyenMai;
use App\SanPham;
class sanphamController extends Controller
{
  public function getDanhSach(){
    $sanpham=SanPham::all();
    return view('admin.sanpham.danhsach',['sanpham'=>$sanpham]);
  }
  public function getThem(){
    $donvitinh=DonViTinh::all();
    $danhmucsanpham=DanhMucSanPham::all();
    $nhasanxuat=NhaSanXuat::all();
    $khohang=KhoHang::all();
    $mucthue=Mucthue::all();
    $khuyenmai=LoaiKhuyenMai::all();
    return view('admin.sanpham.them',['donvitinh'=>$donvitinh,'danhmucsanpham'=>$danhmucsanpham,'nhasanxuat'=>$nhasanxuat,'khohang'=>$khohang,'mucthue'=>$mucthue,'khuyenmai'=>$khuyenmai]);
  }
  public function postThem(Request $request){
    $this->validate($request,[
      'sp_ten'=>'required|min:3|max:100',
      'sp_so_luong_ton_kho'=>'required|max:10',
      'sp_gia_niem_yet'=>'required|min:3|max:10',
      'sp_mo_ta'=>'required|min:3|max:100',
      'sp_don_vi_tinh_id'=>'required',
      'sp_danh_muc_id'=>'required',
      'sp_nsx_id'=>'required',
      'sp_kho_hang_id'=>'required',
      'sp_muc_thue_id'=>'required',
      'sp_khuyen_mai_id'=>'required',
    ],
    [
      'sp_don_vi_tinh_id.required'=>'Bạn chưa nhập tên danh mục sản phẩm',
      'sp_danh_muc_id.required'=>'Bạn chưa nhập tên danh mục sản phẩm',
      'sp_nsx_id.required'=>'Bạn chưa nhập tên danh mục sản phẩm',
      'sp_kho_hang_id.required'=>'Bạn chưa nhập tên danh mục sản phẩm',
      'sp_muc_thue_id.required'=>'Bạn chưa nhập tên danh mục sản phẩm',
      'sp_khuyen_mai_id.required'=>'Bạn chưa nhập tên danh mục sản phẩm',
      'sp_ten.required'=>'Bạn chưa nhập tên sản phẩm',
      'sp_ten.min'=>'Tên sản phẩm chưa đủ 3 kí tự',
      'sp_ten.max'=>'Bạn chỉ nhập ít hơn 100 kí tự',
      'sp_so_luong_ton_kho.required'=>'Bạn chưa nhập tên số lượng tồn kho',
      'sp_so_luong_ton_kho.max'=>'Bạn chỉ nhập ít hơn 10 kí tự',
      'sp_gia_niem_yet.required'=>'Bạn chưa nhập giá niêm yết sản phẩm',
      'sp_gia_niem_yet.min'=>'Giá niêm yết sản phẩm chưa đủ > 1000 đồng',
      'sp_gia_niem_yet.max'=>'Bạn chỉ nhập ít hơn 10 số',
      'sp_mo_ta.required'=>'Bạn chưa nhập tên mô tả',
      'sp_mo_ta.min'=>'Mô tả sản phẩm chưa đủ 3 kí tự',
      'sp_mo_ta.max'=>'Bạn chỉ nhập ít hơn 100 kí tự',
    ]);
        $sanpham=new SanPham;
        $sanpham->sp_ten=$request->sp_ten;
        $sanpham->sp_so_luong_ton_kho=$request->sp_so_luong_ton_kho;
        $sanpham->sp_gia_niem_yet=$request->sp_gia_niem_yet;
        $sanpham->sp_gia_ban=$request->sp_gia_ban;
        $sanpham->sp_mo_ta=$request->sp_mo_ta;
        $sanpham->sp_hinh_anh=$request->sp_hinh_anh;
        $sanpham->sp_don_vi_tinh_id=$request->sp_don_vi_tinh_id;
        $sanpham->sp_danh_muc_id=$request->sp_danh_muc_id;
        $sanpham->sp_nsx_id=$request->sp_nsx_id;
        $sanpham->sp_kho_hang_id=$request->sp_kho_hang_id;
        $sanpham->sp_muc_thue_id=$request->sp_muc_thue_id;
        $sanpham->sp_khuyen_mai_id=$request->sp_khuyen_mai_id;
        $sanpham->trang_thai=$request->trang_thai;
        $sanpham->created_at=$request->created_at;
        $sanpham->save();
        return redirect('admin/sanpham/them')->with('thongbao','Thêm thành công');
    }
  public function getSua($id){
    $sanpham=SanPham::find($id);
    $donvitinh=DonViTinh::all();
    $danhmucsanpham=DanhMucSanPham::all();
    $nhasanxuat=NhaSanXuat::all();
    $khohang=KhoHang::all();
    $mucthue=Mucthue::all();
    $khuyenmai=LoaiKhuyenMai::all();
    return view('admin.sanpham.sua',['donvitinh'=>$donvitinh,'danhmucsanpham'=>$danhmucsanpham,'nhasanxuat'=>$nhasanxuat,'khohang'=>$khohang,'mucthue'=>$mucthue,'khuyenmai'=>$khuyenmai,'sanpham'=>$sanpham]);
  }
  public function postSua(Request $request,$id){
    $sanpham=SanPham::find($id);
    $this->validate($request,[
      'sp_ten'=>'required|min:3|max:100',
      'sp_so_luong_ton_kho'=>'required|max:10',
      'sp_gia_niem_yet'=>'required|min:3|max:10',
      'sp_mo_ta'=>'required|min:3|max:100',
      'sp_don_vi_tinh_id'=>'required',
      'sp_danh_muc_id'=>'required',
      'sp_nsx_id'=>'required',
      'sp_kho_hang_id'=>'required',
      'sp_muc_thue_id'=>'required',
      'sp_khuyen_mai_id'=>'required',
    ],
    [
      'sp_don_vi_tinh_id.required'=>'Bạn chưa nhập tên danh mục sản phẩm',
      'sp_danh_muc_id.required'=>'Bạn chưa nhập tên danh mục sản phẩm',
      'sp_nsx_id.required'=>'Bạn chưa nhập tên danh mục sản phẩm',
      'sp_kho_hang_id.required'=>'Bạn chưa nhập tên danh mục sản phẩm',
      'sp_muc_thue_id.required'=>'Bạn chưa nhập tên danh mục sản phẩm',
      'sp_khuyen_mai_id.required'=>'Bạn chưa nhập tên danh mục sản phẩm',
      'sp_ten.required'=>'Bạn chưa nhập tên sản phẩm',
      'sp_ten.min'=>'Tên sản phẩm chưa đủ 3 kí tự',
      'sp_ten.max'=>'Bạn chỉ nhập ít hơn 100 kí tự',
      'sp_so_luong_ton_kho.required'=>'Bạn chưa nhập tên số lượng tồn kho',
      'sp_so_luong_ton_kho.max'=>'Bạn chỉ nhập ít hơn 10 kí tự',
      'sp_gia_niem_yet.required'=>'Bạn chưa nhập giá niêm yết sản phẩm',
      'sp_gia_niem_yet.min'=>'Giá niêm yết sản phẩm chưa đủ > 1000 đồng',
      'sp_gia_niem_yet.max'=>'Bạn chỉ nhập ít hơn 10 số',
      'sp_mo_ta.required'=>'Bạn chưa nhập tên mô tả',
      'sp_mo_ta.min'=>'Mô tả sản phẩm chưa đủ 3 kí tự',
      'sp_mo_ta.max'=>'Bạn chỉ nhập ít hơn 100 kí tự',
    ]);
        $sanpham->sp_ten=$request->sp_ten;
        $sanpham->sp_so_luong_ton_kho=$request->sp_so_luong_ton_kho;
        $sanpham->sp_gia_niem_yet=$request->sp_gia_niem_yet;
        $sanpham->sp_gia_ban=$request->sp_gia_ban;
        $sanpham->sp_mo_ta=$request->sp_mo_ta;
        $sanpham->sp_hinh_anh=$request->sp_hinh_anh;
        $sanpham->sp_don_vi_tinh_id=$request->sp_don_vi_tinh_id;
        $sanpham->sp_danh_muc_id=$request->sp_danh_muc_id;
        $sanpham->sp_nsx_id=$request->sp_nsx_id;
        $sanpham->sp_kho_hang_id=$request->sp_kho_hang_id;
        $sanpham->sp_muc_thue_id=$request->sp_muc_thue_id;
        $sanpham->sp_khuyen_mai_id=$request->sp_khuyen_mai_id;
        $sanpham->trang_thai=$request->trang_thai;
        $sanpham->created_at=$request->created_at;
        $sanpham->save();
        return redirect('admin/sanpham/sua/'.$id)->with('thongbao','Sửa thành công');
    }

    public function getXoa($id){
      $sanpham=SanPham::find($id);
      $sanpham->delete();
      return redirect('admin/sanpham/danhsach')->with('thongbao','Xóa thành công');
    }
}
