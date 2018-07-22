<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NguoiDung extends Model
{
    protected $table = "nguoidung";
    protected $primaryKey = "nd_id";

    //1 người dùng thuộc 1 loại người dùng
    public function loainguoidung(){
        return $this->belongsTo("App/LoaiNguoiDung");
    }
}
