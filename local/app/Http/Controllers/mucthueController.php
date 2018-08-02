<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MucThue;
use App\LoaiThue;
class mucthueController extends Controller
{
  public function getDanhSach(){
    $mucthue=MucThue::all();
    return view('admin.mucthue.danhsach',['mucthue'=>$mucthue]);
  }
  public function getThem(){
    $loaithue=LoaiThue::all();
    return view('admin.mucthue.them',['loaithue'=>$loaithue]);
  }
  public function postThem(Request $request){
        $this->validate($request,[
          'mt_ten'=>'required|min:10|max:100',
          'mt_muc_thue_percent'=>'required|min:0|max:3',
          'mt_loai_thue'=>'required',
        ],
        [
          'mt_loai_thue.required'=>'Bạn không được để trống mã loại thuế',
          'mt_muc_thue_percent.required'=>'Bạn chưa nhập phần trăm mục thuế',
          'mt_muc_thue_percent.min'=>'Phần trăm mục thuế phải > 0 kí tự',
          'mt_muc_thue_percent.max'=>'Phần trăm mục thuế phải < 3 kí tự',
          'mt_ten.required'=>'Bạn chưa nhập tên mục thuế',
          'mt_ten.min'=>'Tên mục thuế lớn hơn 10 kí tự',
          'mt_ten.max'=>'Tên mục thuế phải < 100 kí tự',
        ]);
        $mucthue=new MucThue;
        $mucthue->mt_ten=$request->mt_ten;
        $mucthue->mt_muc_thue_percent=$request->mt_muc_thue_percent;
        $mucthue->mt_loai_thue=$request->mt_loai_thue;
        $mucthue->created_at=$request->created_at;
        $mucthue->save();
        return redirect('admin/mucthue/them')->with('thongbao','Thêm thành công');
    }
    public function getSua($id){
      $loaithue=LoaiThue::all();
      $mucthue=MucThue::find($id);
      return view('admin.mucthue.sua',['loaithue'=>$loaithue,'mucthue'=>$mucthue]);
    }
    public function postSua(Request $request,$id){
          $mucthue=MucThue::find($id);
          $this->validate($request,[
            'mt_ten'=>'required|min:10|max:100',
            'mt_muc_thue_percent'=>'required|min:0|max:3',
            'mt_loai_thue'=>'required',
          ],
          [
            'mt_loai_thue.required'=>'Bạn không được để trống mã loại thuế',
            'mt_muc_thue_percent.required'=>'Bạn chưa nhập phần trăm mục thuế',
            'mt_muc_thue_percent.min'=>'Phần trăm mục thuế phải > 0 kí tự',
            'mt_muc_thue_percent.max'=>'Phần trăm mục thuế phải < 3 kí tự',
            'mt_ten.required'=>'Bạn chưa nhập tên mục thuế',
            'mt_ten.min'=>'Tên mục thuế lớn hơn 10 kí tự',
            'mt_ten.max'=>'Tên mục thuế phải < 100 kí tự',
          ]);
          $mucthue->mt_ten=$request->mt_ten;
          $mucthue->mt_muc_thue_percent=$request->mt_muc_thue_percent;
          $mucthue->mt_loai_thue=$request->mt_loai_thue;
          $mucthue->updated_at=$request->updated_at;
          $mucthue->save();
          return redirect('admin/mucthue/sua/'.$id)->with('thongbao','Sửa thành công');
      }
      public function getXoa($id){
        $mucthue=MucThue::find($id);
        $mucthue->delete();
        return redirect('admin/mucthue/danhsach')->with('thongbao','Xóa thành công');
      }
}
