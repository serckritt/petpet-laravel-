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
        // 카테고리 테이블 생성, 시더 실행 필요
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name'); //이름
            $table->integer('parent_id'); //부모 카테고리
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
