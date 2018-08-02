<?php

namespace App\Http\Controllers;
use App\Tintuc;
use App\DanhMucTinTuc;
use Illuminate\Http\Request;
class tintucController extends Controller
{
  public function getDanhSach(){
    $tintuc=Tintuc::all();
    return view('admin.tintuc.danhsach',['tintuc'=>$tintuc]);
  }
  public function getThem(){
    $loaitintuc=DanhMucTinTuc::all();
    return view('admin.tintuc.them',['loaitintuc'=>$loaitintuc]);
  }
  public function postThem(Request $request){
        $this->validate($request,[
          'tt_ltt_id'=>'required',
          'tt_tieu_de'=>'required|min:10',
          'tt_mo_ta'=>'required|min:10',
          'tt_noi_dung'=>'required|min:10'
        ],
        [
          'tt_ltt_id.required'=>'Bạn không được để trống danh mục tin tức',
          'tt_tieu_de.required'=>'Bạn chưa nhập tiêu đề',
          'tt_tieu_de.min'=>'Nội dung tiêu đề >10 kí tự',
          'tt_mo_ta.required'=>'Bạn chưa nhập mô tả tin tức',
          'tt_mo_ta.min'=>'Mô tả tin tức lớn hơn 10 kí tự',
          'tt_noi_dung.required'=>'Bạn chưa nhập nội dung tin tức',
          'tt_noi_dung.min'=>'Nội dung tin tức lớn hơn 10 kí tự',
        ]);
        $tintuc=new Tintuc;
        $tintuc->tt_ltt_id=$request->tt_ltt_id;
        $tintuc->tt_hinh_anh=$request->tt_hinh_anh;
        $tintuc->tt_tieu_de=$request->tt_tieu_de;
        $tintuc->tt_mo_ta=$request->tt_mo_ta;
        $tintuc->tt_noi_dung=$request->tt_noi_dung;
        $tintuc->trang_thai=$request->trang_thai;
        $tintuc->created_at=$request->created_at;
        $tintuc->save();
        return redirect('admin/tintuc/them')->with('thongbao','Thêm thành công');
    }
    public function getSua($id){
      $loaitintuc=DanhMucTinTuc::all();
      $tintuc=Tintuc::find($id);
      return view('admin.tintuc.sua',['loaitintuc'=>$loaitintuc,'tintuc'=>$tintuc]);
    }
    public function postSua(Request $request,$id){
          $tintuc=Tintuc::find($id);
          $this->validate($request,[
            'tt_ltt_id'=>'required',
            'tt_tieu_de'=>'required|min:10',
            'tt_mo_ta'=>'required|min:10',
            'tt_noi_dung'=>'required|min:10'
          ],
          [
            'tt_ltt_id.required'=>'Bạn không được để trống danh mục tin tức',
            'tt_tieu_de.required'=>'Bạn chưa nhập tiêu đề',
            'tt_tieu_de.min'=>'Nội dung tiêu đề >10 kí tự',
            'tt_mo_ta.required'=>'Bạn chưa nhập mô tả tin tức',
            'tt_mo_ta.min'=>'Mô tả tin tức lớn hơn 10 kí tự',
            'tt_noi_dung.required'=>'Bạn chưa nhập nội dung tin tức',
            'tt_noi_dung.min'=>'Nội dung tin tức lớn hơn 10 kí tự',
          ]);
          $tintuc->tt_ltt_id=$request->tt_ltt_id;
          $tintuc->tt_hinh_anh=$request->tt_hinh_anh;
          $tintuc->tt_tieu_de=$request->tt_tieu_de;
          $tintuc->tt_mo_ta=$request->tt_mo_ta;
          $tintuc->tt_noi_dung=$request->tt_noi_dung;
          $tintuc->trang_thai=$request->trang_thai;
          $tintuc->updated_at=$request->updated_at;
          $tintuc->save();
          return redirect('admin/tintuc/sua/'.$id)->with('thongbao','Sửa thành công');
      }
      public function getXoa($id){
        $tintuc=tintuc::find($id);
        $tintuc->delete();
        return redirect('admin/tintuc/danhsach')->with('thongbao','Xóa thành công');
      }
}
