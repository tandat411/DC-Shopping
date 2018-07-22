<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiNguoiDung extends Model
{
    protected $table = "loainguoidung";
    protected $primaryKey = "lnd_id";

    //1 loại người dùng sẽ có nhiều người dùng
    public function nguoidung(){
        return $this->hasMany("App/NguoiDung");
    }
}
