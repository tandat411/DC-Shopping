<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CuocPhiVanCHuyen extends Model
{
    protected $table = "cuocphivanchuyen";
    protected $primaryKey = "cpvc_id";

    //1 loại cước phí sẽ áp dụng nhiều đơn hàng
    public function donhang(){
        return $this->hasMany("App/DonHang");
    }
}
