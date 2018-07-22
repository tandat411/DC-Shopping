<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCuocphivanchuyen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuocphivanchuyen', function (Blueprint $table) {
            $table->increments('cpvc_id');
            $table->string('cpvc_thanh_pho');
            $table->double("cpvc_gia_cuoc");
            $table->string('trang_thai');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cuocphivanchuyen');
    }
}
