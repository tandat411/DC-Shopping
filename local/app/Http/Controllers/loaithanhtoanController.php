<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiThanhToan;
class loaithanhtoanController extends Controller
{
  public function getDanhSach(){
    $loaithanhtoan=LoaiThanhToan::all();
    return view('admin.loaithanhtoan.danhsach',['loaithanhtoan'=>$loaithanhtoan]);
  }
  public function getThem(){
    return view('admin.loaithanhtoan.them');
  }
  public function postThem(Request $request){
    $this->validate($request,[
      'ltt_ten'=>'required|min:3|max:100'
    ],
    [
      'ltt_ten.required'=>'Bạn chưa nhập tên loại thanh toán',
      'ltt_ten.min'=>'Tên loại thanh toán chưa đủ 3 kí tự',
      'ltt_ten.max'=>'Bạn chỉ nhập ít hơn 100 kí tự',
    ]);
        $loaithanhtoan=new LoaiThanhToan;
        $loaithanhtoan->ltt_ten=$request->ltt_ten;
        $loaithanhtoan->ltt_hinh_anh=$request->ltt_hinh_anh;
        $loaithanhtoan->trang_thai=$request->trang_thai;
        $loaithanhtoan->save();
        return redirect('admin/loaithanhtoan/them')->with('thongbao','Thêm thành công');
    }

  public function getSua($id){
    $loaithanhtoan=LoaiThanhToan::find($id);
    return view('admin.loaithanhtoan.sua',['loaithanhtoan'=>$loaithanhtoan]);
  }
  public function postSua(Request $request,$id){
    $loaithanhtoan=LoaiThanhToan::find($id);
    $this->validate($request,[
      'ltt_ten'=>'required|min:3|max:100'
    ],
    [
      'ltt_ten.required'=>'Bạn chưa nhập tên loại thanh toán',
      'ltt_ten.min'=>'Tên loại thanh toán chưa đủ 3 kí tự',
      'ltt_ten.max'=>'Bạn chỉ nhập ít hơn 100 kí tự',
    ]);
        $loaithanhtoan->ltt_ten=$request->ltt_ten;
        $loaithanhtoan->ltt_hinh_anh=$request->ltt_hinh_anh;
        $loaithanhtoan->trang_thai=$request->trang_thai;
        $loaithanhtoan->save();
        return redirect('admin/loaithanhtoan/sua/'.$id)->with('thongbao','Sửa thành công');
    }
    public function getXoa($id){
      $loaithanhtoan=LoaiThanhToan::find($id);
      $loaithanhtoan->delete();
      return redirect('admin/loaithanhtoan/danhsach')->with('thongbao','Xóa thành công');
    }
}
