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
        //장바구니 테이블 생성
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');  //상품아이디
            $table->integer('user_id');     //유저아이디
            $table->integer('count');       //한번에 장바구니에 넣은 수
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
