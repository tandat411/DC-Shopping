<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiThue extends Model
{
    protected $table = "loaithue";
    protected $primaryKey = "lt_id";

    //1 loại thuế có nhiều mức thuế
    public function mucthue(){
        return $this->hasMany("App/LoaiThue");
    }
}
