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
        // 상품 테이블 생성, 시더 실행 필요
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name'); //이름
            $table->string('img');  //이미지 url
            $table->integer('prize'); //가격
            $table->integer('category_id'); //카테고리 아이디
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
