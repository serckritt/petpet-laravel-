<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //리뷰 테이블 생성
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->string('text');         //리뷰내용
            $table->double('rating');       //리뷰의 평점
            $table->integer('user_id');     //유저아이디
            $table->integer('product_id');  //상품아이디
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
