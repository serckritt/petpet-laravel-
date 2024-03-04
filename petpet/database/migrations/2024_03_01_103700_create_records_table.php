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
        //구매기록 테이블
        Schema::create('records', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');      //상품아이디
            $table->integer('user_id');         //유저아이디
            $table->integer('count');           //구매량
            $table->integer('postcode');        //우편번호
            $table->string('address');          //주소
            $table->string('delivery_request'); //요청사항
            $table->string('credit_card');      //카드사
            $table->string('installment');      //할부여부
            $table->timestamps();
            $table->softDeletes();              //소프트삭제 사용
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('records');
    }
};
