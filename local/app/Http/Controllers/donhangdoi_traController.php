<?php

namespace App\Http\Controllers;
use App\KhachHang;
use App\DonHang;
use App\TinhTrangDonHang;
use App\DonHangDoi_Tra;
use Illuminate\Http\Request;

class donhangdoi_traController extends Controller
{
  public function getDanhSach(){
    $donhangdoi_tra=DonHangDoi_Tra::all();
    return view('admin.donhangdoi_tra.danhsach',['donhangdoi_tra'=>$donhangdoi_tra]);
  }
  public function getThem(){
    $khachhang=KhachHang::all();
    $donhang=DonHang::all();
    $tinhtrangdonhang=TinhTrangDonHang::all();
    return view('admin.donhangdoi_tra.them',['khachhang'=>$khachhang,'tinhtrangdonhang'=>$tinhtrangdonhang,'donhang'=>$donhang]);
  }
  public function postThem(Request $request){
        $this->validate($request,[
          'dcgh_kh_id'=>'required',
          'dhdt_dh_id'=>'required',
          'dhdt_tinh_trang_id'=>'required',
          'dhdt_ngay_doi_tra'=>'required',
          'dhdt_thao_tac'=>'required|min:10|max:100',
          'dhdt_ly_do'=>'required|min:10|max:100'
        ],
        [
          'dcgh_kh_id.required'=>'Bạn không được để trống mã khách hàng',
          'dcgh_dh_id.required'=>'Bạn không được để trống mã đơn hàng',
          'dcgh_tinh_trang_id.required'=>'Bạn không được để trống mã tình trạng',
          'dhdt_ngay_doi_tra.required'=>'Bạn chưa nhập ngày đổi trả',
          'dhdt_thao_tac.required'=>'Bạn chưa nhập thao tác trong đơn hàng đổi trả',
          'dhdt_thao_tac.min'=>'Thao tác phải lớn hơn 10 kí tự ',
          'dhdt_thao_tac.max'=>'Bạn không được nhập nhiều hơn 100 kí tự ',
          'dhdt_ly_do.required'=>'Bạn chưa nhập lý do',
          'dhdt_ly_do.min'=>'Lý do phải lớn hơn 10 kí tự ',
          'dhdt_ly_do.max'=>'Bạn không được nhập nhiều hơn 100 kí tự '
        ]);
        $donhangdoi_tra=new DonHangDoi_Tra;
        $donhangdoi_tra->dhdt_kh_id=$request->dhdt_kh_id;
        $donhangdoi_tra->dhdt_dh_id=$request->dhdt_dh_id;
        $donhangdoi_tra->dhdt_ngay_doi_tra=$request->dhdt_ngay_doi_tra;
        $donhangdoi_tra->dhdt_thao_tac=$request->dhdt_thao_tac;
        $donhangdoi_tra->dhdt_ly_do=$request->dhdt_ly_do;
        $donhangdoi_tra->dhdt_tinh_trang_id=$request->dhdt_tinh_trang_id;
        $donhangdoi_tra->created_at=$request->created_at;
        $donhangdoi_tra->save();
        return redirect('admin/donhangdoi_tra/them')->with('thongbao','Thêm thành công');
    }
    public function getSua($id){
      $khachhang=KhachHang::all();
      $donhang=DonHang::all();
      $tinhtrangdonhang=TinhTrangDonHang::all();
      $donhangdoi_tra=DonHangDoi_Tra::find($id);
      return view('admin.donhangdoi_tra.them',['khachhang'=>$khachhang,'tinhtrangdonhang'=>$tinhtrangdonhang,'donhang'=>$donhang,'donhangdoi_tra'=>$donhangdoi_tra]);
    }
    public function postSua(Request $request,$id){
          $donhangdoi_tra=DonHangDoi_Tra::find($id);
          $this->validate($request,[
            'dcgh_kh_id'=>'required',
            'dhdt_dh_id'=>'required',
            'dhdt_tinh_trang_id'=>'required',
            'dhdt_ngay_doi_tra'=>'required',
            'dhdt_thao_tac'=>'required|min:10|max:100',
            'dhdt_ly_do'=>'required|min:10|max:100'
          ],
          [
            'dcgh_kh_id.required'=>'Bạn không được để trống mã khách hàng',
            'dcgh_dh_id.required'=>'Bạn không được để trống mã đơn hàng',
            'dcgh_tinh_trang_id.required'=>'Bạn không được để trống mã tình trạng',
            'dhdt_ngay_doi_tra.required'=>'Bạn chưa nhập ngày đổi trả',
            'dhdt_thao_tac.required'=>'Bạn chưa nhập thao tác trong đơn hàng đổi trả',
            'dhdt_thao_tac.min'=>'Thao tác phải lớn hơn 10 kí tự ',
            'dhdt_thao_tac.max'=>'Bạn không được nhập nhiều hơn 100 kí tự ',
            'dhdt_ly_do.required'=>'Bạn chưa nhập lý do',
            'dhdt_ly_do.min'=>'Lý do phải lớn hơn 10 kí tự ',
            'dhdt_ly_do.max'=>'Bạn không được nhập nhiều hơn 100 kí tự '
          ]);
          $donhangdoi_tra=new DonHangDoi_Tra;
          $donhangdoi_tra->dhdt_kh_id=$request->dhdt_kh_id;
          $donhangdoi_tra->dhdt_dh_id=$request->dhdt_dh_id;
          $donhangdoi_tra->dhdt_ngay_doi_tra=$request->dhdt_ngay_doi_tra;
          $donhangdoi_tra->dhdt_thao_tac=$request->dhdt_thao_tac;
          $donhangdoi_tra->dhdt_ly_do=$request->dhdt_ly_do;
          $donhangdoi_tra->dhdt_tinh_trang_id=$request->dhdt_tinh_trang_id;
          $donhangdoi_tra->created_at=$request->created_at;
          $donhangdoi_tra->save();
          return redirect('admin/donhangdoi_tra/sua/'.$id)->with('thongbao','Sửa thành công');
      }
      public function getXoa($id){
        $donhangdoi_tra=DonHangDoi_Tra::find($id);
        $donhangdoi_tra->delete();
        return redirect('admin/donhangdoi_tra/danhsach')->with('thongbao','Xóa thành công');
      }
}
