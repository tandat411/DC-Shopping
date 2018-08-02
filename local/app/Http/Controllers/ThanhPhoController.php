<?php

namespace App\Http\Controllers;
use App\ThanhPho;
use Illuminate\Http\Request;

class ThanhPhoController extends Controller
{
  public function getDanhSach(){
    $thanhpho=ThanhPho::all();
    return view('admin.thanhpho.danhsach',['thanhpho'=>$thanhpho]);
  }
  public function getThem(){
    return view('admin.thanhpho.them');
  }

  public function postThem(Request $request){
        $this->validate($request,[
          'tp_name'=>'required|min:3|max:100'
        ],
        [
          'tp_name.required'=>'Bạn chưa nhập tên thành phố',
          'tp_name.min'=>'Tên thành phố chưa đủ 3 kì tự',
          'tp_name.max'=>'Bạn chi nhập được 100 kí tự',
        ]);
        $thanhpho=new ThanhPho;
        $thanhpho->tp_name=$request->tp_name;
        $thanhpho->save();
        return redirect('admin/thanhpho/them')->with('thongbao','Thêm thành công');
    }

    public function getSua($id){
      $thanhpho=ThanhPho::find($id);
      return view('admin.thanhpho.sua',['thanhpho'=>$thanhpho]);
    }
    public function postSua(Request $request,$id){
      $thanhpho=ThanhPho::find($id);
      $this->validate($request,[
        'tp_name'=>'required|min:3|max:100'
      ],
      [
        'tp_name.required'=>'Bạn chưa nhập tên thành phố',
        'tp_name.min'=>'Tên thành phố chưa đủ 3 kí tự',
        'tp_name.max'=>'Bạn chi nhập được 100 kí tự',
      ]);
      $thanhpho->tp_name=$request->tp_name;
      $thanhpho->save();
      return redirect('admin/thanhpho/sua/'.$id)->with('thongbao','Sửa thành công');
      }

    public function getXoa($id){
      $thanhpho=ThanhPho::find($id);
      $thanhpho->delete();
      return redirect('admin/thanhpho/danhsach')->with('thongbao','Xóa thành công');
    }
}
