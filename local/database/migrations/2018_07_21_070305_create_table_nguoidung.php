<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableNguoidung extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nguoidung', function (Blueprint $table) {
            $table->increments('nd_id');
            $table->integer('nd_lnd__id')->unsigned();
            $table->string("name");
            $table->string("email");
            $table->string("password");
            $table->integer("lnd_sdt");
            $table->timestamps();

            //Khóa ngoại
            $table->foreign('nd_lnd__id')->references('lnd_id')->on('loainguoidung');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nguoidung');
    }
}
