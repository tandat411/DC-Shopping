<?php

namespace App\Http\Controllers;

use App\ChiTietDonHang;
use App\DanhMucSanPham;
use App\DonHang;
use App\HinhAnhSanPham;
use App\KhachHang;
use App\KichThuoc;
use App\LoaiKhuyenMai;
use App\MauSac;
use App\NguoiDung;
use App\NhaSanXuat;
use App\SanPham;
use App\SanPhamYeuThich;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    //Trang danh mục sản phẩm
    public function getPage($id){
        switch ($id){
            case 'danh-sach-yeu-thich':

                //Lấy danh sách sản phẩm đã được yêu thích
                $SPYT = SanPhamYeuThich::all()->toArray();

                $DSSP = array();
                foreach ($SPYT as $item){
                    $DSSP[] = SanPham::where('sp_id', $item['spyt_sp_id'])->where('trang_thai', 'ON')->first();
                }

                return view('san-pham', ['listSP' => $DSSP, 'danhmuc' => 'Sản phẩm yêu thích']);
                break;
            case 'san-pham-khuyen-mai':

                $DSSP = SanPham::where('sp_khuyen_mai_id', '<>', 2)->where('trang_thai', 'ON')->get()->toArray();
                $LKM = LoaiKhuyenMai::where('km_id', '<>', 2)->where('trang_thai', 'ON')->get()->toArray();
                return view('san-pham-khuyen-mai', ['listSP' => $DSSP, 'danhmuc' => 'Sản phẩm khuyến mãi',
                                                        'listKM' => $LKM]);
                break;
            case $id:
                $danhmuc = DanhMucSanPham::find($id);
                $DSSP = SanPham::where('sp_danh_muc_id', $danhmuc->dmsp_id)->where('trang_thai', 'ON')->get()->toArray();
                return view('san-pham', ['listSP' => $DSSP, 'danhmuc' => $danhmuc['dmsp_ten']]);
                break;
        }
    }

    // Thêm/ xóa sản phẩm yêu thích
    public function getLove($product_id, $customer_id, $position){

        //Lấy thông tin tài khoản người dùng và sản phẩm
        $taikhoan = NguoiDung::find($customer_id);
        $sanpham  = SanPham::find($product_id);

        //Dùng email của tài khoản để lấy thông tin khách hàng
        $khachhang = KhachHang::where('kh_email', $taikhoan['email'])->first();

        //Biến check để kiểm tra sản phẩm này đã được khách hàng đó thích hay chưa
        $check = SanPhamYeuThich::where('spyt_sp_id', $product_id)->where('spyt_kh_id', $khachhang['kh_id'])->first();

        //Chưa thích thì thêm
        if(!$check){
            $add = new SanPhamYeuThich();
            $add->spyt_sp_id = $sanpham['sp_id'];
            $add->spyt_kh_id = $khachhang['kh_id'];
            $add->save();
        }else{
            //Đã thích thì xóa
            $check->delete();
        }
        //Trở lại trang vừa vào*/
        return redirect()->back()->with('position', $position);
    }

    //Chi tiết sản phẩm
    public function getDetail($id){
        //Lấy sản phẩm
        $SP = SanPham::find($id);

        //Lấy tất hình ảnh của sản phẩm
        $HA = HinhAnhSanPham::where('hasp_sp_id', $id)->get()->toArray();

        //Lấy kích thước của sản phẩm
        $KT = KichThuoc::where('size_sp_id', $id)->get();

        //Lấy màu của sản phẩm trong hình ảnh
        $MAU = array();
        foreach($HA as $item) {
            $a = MauSac::where('mau_ha_id' ,$item['id'])->get()->toArray();
            if(empty($MAU)){
                $MAU[] = $a;
            }else{
                $x = false;
                foreach ($MAU as $check){
                    if($a[0]['mau_code'] == $check[0]['mau_code']){
                        $x = true;
                    }
                }
                if(!$x){
                    $MAU[] = $a;
                }
            }
        }

        //Tìm nhà sản xuất của sản phẩm
        $NSX = NhaSanXuat::find($SP->sp_nsx_id);

        //Sản phẩm thuộc mục sản phẩm gì
        $LSP = DanhMucSanPham::find($SP->sp_danh_muc_id);

        //Sản phẩm thuộc loại mặt hàng gì
        $LMH = DanhMucSanPham::find($LSP->parent);

        return view('chi-tiet-san-pham',['sanpham' => $SP, 'nhasanxuat' => $NSX,
            'loaisanpham' => $LSP, 'loaimathang' => $LMH, 'hinhanh' => $HA, 'color' => $MAU, 'kichthuoc' => $KT]);
    }
}
