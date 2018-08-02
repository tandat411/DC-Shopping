<?php

namespace App\Http\Controllers;
use App\LoaiNguoiDung;
use App\NguoiDung;
use Illuminate\Http\Request;

class nguoidungController extends Controller
{
  public function getDanhSach(){
    $nguoidung=NguoiDung::all();
    return view('admin.nguoidung.danhsach',['nguoidung'=>$nguoidung]);
  }
  public function getThem(){
    $loainguoidung=Loainguoidung::all();
    return view('admin.nguoidung.them',['loainguoidung'=>$loainguoidung]);
  }
  public function postThem(Request $request){
        $this->validate($request,[
          'nd_lnd__id'=>'required',
          'name'=>'required|min:10|max:100',
          'email'=>'required|min:9|max:100',
          'password'=>'required|min:3|max:50',
          'lnd_sdt'=>'required|min:9|max:11',
        ],
        [
          'nd_lnd__id.required'=>'Bạn không được để trống mã loại người dùng',
          'name.required'=>'Bạn chưa nhập tên người dùng',
          'name.min'=>'Tên người dùng phải >10 kí tự',
          'name.max'=>'Tên người dùng phải < 100 kí tự',
          'email.required'=>'Bạn chưa nhập email người dùng',
          'email.min'=>'Email người dùng lớn hơn 9 kí tự(có đuôi @gmail.com)',
          'email.max'=>'Email người dùng phải < 100 kí tự',
          'password.required'=>'Bạn chưa nhập password',
          'password.min'=>'Password lớn hơn 3 kí tự',
          'password.max'=>'Password nhỏ hơn 50 kí tự',
          'lnd_sdt.required'=>'Bạn chưa nhập số điện thoại',
          'lnd_sdt.min'=>'Số điện thoại lớn hơn 9 kí tự',
          'lnd_sdt.min'=>'Số điện thoại nhỏ hơn 11 kí tự',
        ]);
        $nguoidung=new NguoiDung;
        $nguoidung->nd_lnd__id=$request->nd_lnd__id;
        $nguoidung->name=$request->name;
        $nguoidung->email=$request->email;
        $nguoidung->password=$request->password;
        $nguoidung->lnd_sdt=$request->lnd_sdt;
        $nguoidung->created_at=$request->created_at;
        $nguoidung->save();
        return redirect('admin/nguoidung/them')->with('thongbao','Thêm thành công');
    }
    public function getSua($id){
      $loainguoidung=Loainguoidung::all();
      $nguoidung=nguoidung::find($id);
      return view('admin.nguoidung.sua',['loainguoidung'=>$loainguoidung,'nguoidung'=>$nguoidung]);
    }
    public function postSua(Request $request,$id){
          $nguoidung=nguoidung::find($id);
          $this->validate($request,[
            'nd_lnd__id'=>'required',
            'name'=>'required|min:10|max:100',
            'email'=>'required|min:9|max:100',
            'password'=>'required|min:3|max:50',
            'lnd_sdt'=>'required|min:9|max:11',
          ],
          [
            'nd_lnd__id.required'=>'Bạn không được để trống mã loại người dùng',
            'name.required'=>'Bạn chưa nhập tên người dùng',
            'name.min'=>'Tên người dùng phải >10 kí tự',
            'name.max'=>'Tên người dùng phải < 100 kí tự',
            'email.required'=>'Bạn chưa nhập email người dùng',
            'email.min'=>'Email người dùng lớn hơn 9 kí tự(có đuôi @gmail.com)',
            'email.max'=>'Email người dùng phải < 100 kí tự',
            'password.required'=>'Bạn chưa nhập password',
            'password.min'=>'Password lớn hơn 3 kí tự',
            'password.max'=>'Password nhỏ hơn 50 kí tự',
            'lnd_sdt.required'=>'Bạn chưa nhập số điện thoại',
            'lnd_sdt.min'=>'Số điện thoại lớn hơn 9 kí tự',
            'lnd_sdt.min'=>'Số điện thoại nhỏ hơn 11 kí tự',
          ]);
          $nguoidung->nd_lnd__id=$request->nd_lnd__id;
          $nguoidung->name=$request->name;
          $nguoidung->email=$request->email;
          $nguoidung->password=$request->password;
          $nguoidung->lnd_sdt=$request->lnd_sdt;
          $nguoidung->created_at=$request->created_at;
          $nguoidung->save();
          return redirect('admin/nguoidung/sua/'.$id)->with('thongbao','Sửa thành công');
      }
      public function getXoa($id){
        $nguoidung=NguoiDung::find($id);
        $nguoidung->delete();
        return redirect('admin/nguoidung/danhsach')->with('thongbao','Xóa thành công');
      }
}
