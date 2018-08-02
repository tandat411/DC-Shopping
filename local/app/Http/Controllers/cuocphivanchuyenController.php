<?php

namespace App\Http\Controllers;
use App\CuocPhiVanChuyen;
use App\ThanhPho;
use Illuminate\Http\Request;

class cuocphivanchuyenController extends Controller
{
  public function getDanhSach(){
    $cuocphivanchuyen=CuocPhiVanChuyen::all();
    return view('admin.cuocphivanchuyen.danhsach',['cuocphivanchuyen'=>$cuocphivanchuyen]);
  }
  public function getThem(){
    $thanhpho=ThanhPho::all();
    return view('admin.cuocphivanchuyen.them',['thanhpho'=>$thanhpho]);
  }
  public function postThem(Request $request){
        $this->validate($request,[
          'tp_id'=>'required',
          'cpvc_gia_cuoc'=>'required|min:0|max:2',
          'cpvc_thanh_pho'=>'required|min:0|max:100'
        ],
        [
          'tp_id.required'=>'Bạn không được để trống mã thành phố',
          'cpvc_gia_cuoc.required'=>'Bạn chưa nhập giá cước vận chuyển',
          'cpvc_thanh_pho.required'=>'Bạn chưa nhập cước thành phố',
          'cpvc_gia_cuoc.min'=>'Giá cước vận chuyển lớn hơn 0 %',
          'cpvc_gia_cuoc.max'=>'Giá cước vận chuyển nhỏ hơn 99%'
        ]);
        $cuocphivanchuyen=new CuocPhiVanChuyen;
        $cuocphivanchuyen->cpvc_thanh_pho=$request->cpvc_thanh_pho;
        $cuocphivanchuyen->cpvc_gia_cuoc=$request->cpvc_gia_cuoc;
        $cuocphivanchuyen->tp_id=$request->tp_id;
        $cuocphivanchuyen->save();
        return redirect('admin/cuocphivanchuyen/them')->with('thongbao','Thêm thành công');
    }
    public function getSua($id){
      $thanhpho=ThanhPho::all();
      $cuocphivanchuyen=CuocPhiVanChuyen::find($id);
      return view('admin.cuocphivanchuyen.them',['thanhpho'=>$thanhpho,'cuocphivanchuyen'=>$cuocphivanchuyen]);
    }
    public function postSua(Request $request,$id){
      $cuocphivanchuyen=CuocPhiVanChuyen::find($id);
      $this->validate($request,[
        'tp_id'=>'required',
        'ctdh_gia_cuoc'=>'required|min:0|max:2',
        'cpvc_thanh_pho'=>'required|min:0|max:2'
      ],
      [
        'tp_id.required'=>'Bạn không được để trống mục sản phẩm',
        'ctdh_gia_cuoc.required'=>'Bạn chưa nhập giá cước vận chuyển',
        'cpvc_thanh_pho.required'=>'Bạn chưa nhập cước thành phố',
        'ctdh_gia_cuoc.min'=>'Giá cước vận chuyển lớn hơn 0 %',
        'ctdh_gia_cuoc.max'=>'Giá cước vận chuyển nhỏ hơn 99%'
      ]);
      $cuocphivanchuyen->cpvc_thanh_pho=$request->cpvc_thanh_pho;
      $cuocphivanchuyen->cpvc_gia_cuoc=$request->cpvc_gia_cuoc;
      $cuocphivanchuyen->tp_id=$request->tp_id;
      $cuocphivanchuyen->save();
      return redirect('admin/cuocphivanchuyen/sua/'.$id)->with('thongbao','Sửa thành công');
      }
      public function getXoa($id){
        $cuocphivanchuyen=CuocPhiVanChuyen::find($id);
        $cuocphivanchuyen->delete();
        return redirect('admin/cuocphivanchuyen/danhsach')->with('thongbao','Xóa thành công');
      }
}
