<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    protected $table = "sanpham";
    protected $primaryKey = "sp_id";

    //1 sản phẩm có thể có nhiều chi tiết đơn hàng
    public function chitietdonhang(){
        return $this->hasMany("App/ChiTietDonHang");
    }
    //1 sản phẩm thuộc 1 danh mục sản phẩm
    public function danhmucsanpham(){
        return $this->belongsTo("App/DanhMucSanPham");
    }

    //1 sản phẩm có 1 mức thuế
    public function mucthue(){
        return $this->belongsTo("App/MucThue");
    }

    //1 sản phẩm có 1 đơn vị tính
    public function donvitinh(){
        return $this->belongsTo("App/DonViTinh");
    }

    //1 sản phẩm của 1 kho hàng
    public function khohang(){
        return $this->belongsTo("App/KhoHang");
    }

    //1 sản phẩm của 1 nhà sản xuất
    public function nhasanxuat(){
        return $this->belongsTo("App/NhaSanXuat");
    }

    //1 sản phẩm có 1 loại khuyến mãi
    public function loaikhuyenmai(){
        return $this->belongsTo("App/LoaiKhuyenMai");
    }


}
