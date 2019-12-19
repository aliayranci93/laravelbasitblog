<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Settings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    Schema::create('settings', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->String('logo')->nullable();
      $table->String('favicon')->nullable();
      $table->String('baslik')->nullable();
      $table->String('aktif')->default("1");
      $table->String('aciklama')->nullable();
      $table->String('anahtarKelimeler')->nullable();
      $table->String('ekKodlar')->nullable();
      $table->String('footerYazisi')->nullable();
      $table->String('facebook')->nullable();
      $table->String('instagram')->nullable();
      $table->String('whatsapp')->nullable();
      $table->String('youtube')->nullable();
      $table->String('googleplus')->nullable();
      $table->timestamps();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
