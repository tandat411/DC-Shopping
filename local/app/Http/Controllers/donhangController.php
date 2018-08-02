<?php

namespace App\Http\Controllers;
use App\KhachHang;
use App\LoaiThanhToan;
use App\CuocPhiVanChuyen;
use App\NhanVien;
use App\PhieuGiamGia;
use App\TinhTrangDonHang;
use App\DonHang;
use Illuminate\Http\Request;

class donhangController extends Controller
{
  public function getDanhSach(){
    $donhang=DonHang::all();
    return view('admin.donhang.danhsach',['donhang'=>$donhang]);
  }
  public function getThem(){
    $khachhang=KhachHang::all();
    $loaithanhtoan=LoaiThanhToan::all();
    $cuocphivanchuyen=CuocPhiVanChuyen::all();
    $nhanvien=NhanVien::all();
    $phieugiamgia=PhieuGiamGia::all();
    $tinhtrangdonhang=TinhTrangDonHang::all();
    return view('admin.donhang.them',['khachhang'=>$khachhang,'loaithanhtoan'=>$loaithanhtoan,'cuocphivanchuyen'=>$cuocphivanchuyen,'nhanvien'=>$nhanvien,'phieugiamgia'=>$phieugiamgia,'tinhtrangdonhang'=>$tinhtrangdonhang,]);
  }
  public function postThem(Request $request){
        $this->validate($request,[
          'dh_kh_id'=>'required',
          'dh_pgg_id'=>'required',
          'dh_ltt_id'=>'required',
          'dh_nv_id'=>'required',
          'dh_tinh_trang_id'=>'required',
          'dh_cpvc_id'=>'required',
          'dh_ngay_dat_hang'=>'required',
          'dh_ngay_giao_hang'=>'required',
          'dh_tong_tien'=>'required|min:4|max:9'

        ],
        [
          'dh_pgg_id.required'=>'Bạn không được để trống mã phiếu giảm giá',
          'dh_ltt_id.required'=>'Bạn không được để trống mã loại thanh toán',
          'dh_tinh_trang_id.required'=>'Bạn không được để trống mã tình trạng đơn hàng',
          'dh_nv_id.required'=>'Bạn không được để trống mã nhân viên',
          'dh_cpvc_id.required'=>'Bạn không được để trống mã cước phí vận chuyển',
          'dh_kh_id.required'=>'Bạn không được để trống mã khách hàng',
          'dh_ngay_dat_hang.required'=>'Bạn chưa nhập ngày đặt hàng',
          'dh_ngay_giao_hang.required'=>'Bạn chưa nhập ngày giao hàng',
          'dh_tong_tien.required'=>'Bạn chưa nhập tổng tiền',
          'dh_tong_tien.min'=>'Tổng tiền phải lớn hơn 1000 đồng ',
          'dh_tong_tien.max'=>'Bạn không được nhập hơn  1.000.000.000 '
        ]);
        $donhang=new DonHang;
        $donhang->dh_kh_id=$request->dh_kh_id;
        $donhang->dh_pgg_id=$request->dh_pgg_id;
        $donhang->dh_ltt_id=$request->dh_ltt_id;
        $donhang->dh_nv_id=$request->dh_nv_id;
        $donhang->dh_tinh_trang_id=$request->dh_tinh_trang_id;
        $donhang->dh_cpvc_id=$request->dh_cpvc_id;
        $donhang->dh_tong_tien=$request->dh_tong_tien;
        $donhang->dh_ngay_dat_hang=$request->dh_ngay_dat_hang;
        $donhang->dh_ngay_giao_hang=$request->dh_ngay_giao_hang;
        $donhang->created_at=$request->created_at;
        $donhang->save();
        return redirect('admin/donhang/them')->with('thongbao','Thêm thành công');
    }
    public function getSua($id){
      $khachhang=KhachHang::all();
      $loaithanhtoan=LoaiThanhToan::all();
      $cuocphivanchuyen=CuocPhiVanChuyen::all();
      $nhanvien=NhanVien::all();
      $phieugiamgia=PhieuGiamGia::all();
      $tinhtrangdonhang=TinhTrangDonHang::all();
      $donhang=DonHang::find($id);
      return view('admin.donhang.sua',['khachhang'=>$khachhang,'loaithanhtoan'=>$loaithanhtoan,'cuocphivanchuyen'=>$cuocphivanchuyen,'nhanvien'=>$nhanvien,'phieugiamgia'=>$phieugiamgia,'tinhtrangdonhang'=>$tinhtrangdonhang,'donhang'=>$donhang]);
    }
    public function postSua(Request $request,$id){
          $donhang=DonHang::find($id);
          $this->validate($request,[
            'dh_kh_id'=>'required',
            'dh_pgg_id'=>'required',
            'dh_ltt_id'=>'required',
            'dh_nv_id'=>'required',
            'dh_tinh_trang_id'=>'required',
            'dh_cpvc_id'=>'required',
            'dh_ngay_dat_hang'=>'required',
            'dh_ngay_giao_hang'=>'required',
            'dh_tong_tien'=>'required|min:4|max:9'

          ],
          [
            'dh_pgg_id.required'=>'Bạn không được để trống mã phiếu giảm giá',
            'dh_ltt_id.required'=>'Bạn không được để trống mã loại thanh toán',
            'dh_tinh_trang_id.required'=>'Bạn không được để trống mã tình trạng đơn hàng',
            'dh_nv_id.required'=>'Bạn không được để trống mã nhân viên',
            'dh_cpvc_id.required'=>'Bạn không được để trống mã cước phí vận chuyển',
            'dh_kh_id.required'=>'Bạn không được để trống mã khách hàng',
            'dh_ngay_dat_hang.required'=>'Bạn chưa nhập ngày đặt hàng',
            'dh_ngay_giao_hang.required'=>'Bạn chưa nhập ngày giao hàng',
            'dh_tong_tien.required'=>'Bạn chưa nhập tổng tiền',
            'dh_tong_tien.min'=>'Tổng tiền phải lớn hơn 1000 đồng ',
            'dh_tong_tien.max'=>'Bạn không được nhập hơn  1.000.000.000 '
          ]);
          $donhang->dh_kh_id=$request->dh_kh_id;
          $donhang->dh_pgg_id=$request->dh_pgg_id;
          $donhang->dh_ltt_id=$request->dh_ltt_id;
          $donhang->dh_nv_id=$request->dh_nv_id;
          $donhang->dh_tinh_trang_id=$request->dh_tinh_trang_id;
          $donhang->dh_cpvc_id=$request->dh_cpvc_id;
          $donhang->dh_tong_tien=$request->dh_tong_tien;
          $donhang->dh_ngay_dat_hang=$request->dh_ngay_dat_hang;
          $donhang->dh_ngay_giao_hang=$request->dh_ngay_giao_hang;
          $donhang->updated_at=$request->updated_at;
          $donhang->save();
          return redirect('admin/donhang/sua/'.$id)->with('thongbao','Sửa thành công');
      }
      public function getXoa($id){
        $donhang=DonHang::find($id);
        $donhang->delete();
        return redirect('admin/donhang/danhsach')->with('thongbao','Xóa thành công');
      }
}
