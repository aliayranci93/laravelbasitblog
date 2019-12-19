<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Articles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('categoryId');
            $table->String('title');
            $table->String('image');
            $table->LongText('content');
            $table->Integer('hit')->default(0);
            $table->String('slug');
            $table->String('statu')->default("0");
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('categoryId')
                  ->references('id')
                  ->on('categories');
            //İlişki Kurma $table->foreign('TABLODAKİ BAĞLANACAK ALAN')->references('BAĞLANAN TABLO STUNU(id)')->on('BAĞLANAN TABLO ADI') ;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
