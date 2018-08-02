<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NhanVien extends Model
{
    protected $table = "nhanvien";
    protected $primaryKey = "nv_id";

    //1 nhân viên thuộc 1 loại nhân viên
    public function loainhanvien(){
        return $this->belongsTo("App/LoaiNhanVien");
    }
}
