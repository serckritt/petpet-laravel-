<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            // ---------------------1차------------------------
            ['name' => '사료 및 간식', 'parent_id' => 0],
            ['name' => '의약품 및 의료기기', 'parent_id' => 0],
            ['name' => '장난감 및 각종용품', 'parent_id' => 0],

            // ---------------------2차------------------------
            ['name' => '개/강아지', 'parent_id' => 1],
            ['name' => '고양이', 'parent_id' => 1],
            ['name' => '조류/파충류', 'parent_id' => 1],

            ['name' => '피부/구강 관련', 'parent_id' => 2],
            ['name' => '눈/귀 관련', 'parent_id' => 2],
            ['name' => '건강 식품', 'parent_id' => 2],

            ['name' => '장난감/훈련용품', 'parent_id' => 3],
            ['name' => '미용/샴푸', 'parent_id' => 3],
            ['name' => '의류/액세서리', 'parent_id' => 3],

            // ---------------------3차------------------------
            ['name' => '강아지 사료 전체', 'parent_id' => 4],
            ['name' => '육포/개껌', 'parent_id' => 4],
            ['name' => '동결 건조 간식', 'parent_id' => 4],
            ['name' => '웰빙 간식', 'parent_id' => 4],

            ['name' => '고양이 사료 전체', 'parent_id' => 5],
            ['name' => '캔 사료/간식', 'parent_id' => 5],
            ['name' => '건어물/져키/사시미', 'parent_id' => 5],

            ['name' => '조류 모이 전체', 'parent_id' => 6],
            ['name' => '파충류 먹이 전체', 'parent_id' => 6],

            ['name' => '강아지 피부 의약품', 'parent_id' => 7],
            ['name' => '피부 영양크림', 'parent_id' => 7],
            ['name' => '구강 세척 용품', 'parent_id' => 7],

            ['name' => '안구 세정제', 'parent_id' => 8],
            ['name' => '귀 세척 도구', 'parent_id' => 8],

            ['name' => '개/고양이 유산균', 'parent_id' => 9],
            ['name' => '건강 기능 식품', 'parent_id' => 9],

            ['name' => '장난감', 'parent_id' => 10],
            ['name' => '중.대형견용 목줄', 'parent_id' => 10],
            ['name' => '어깨줄', 'parent_id' => 10],
            ['name' => '원반/훈련용품', 'parent_id' => 10],

            ['name' => '미용가위/자재', 'parent_id' => 11],
            ['name' => '샴푸/린스', 'parent_id' => 11],
            ['name' => '위생 패드', 'parent_id' => 11],
            ['name' => '보습/트리트먼트', 'parent_id' => 11],

            ['name' => '의류/모자', 'parent_id' => 12],
            ['name' => '신발/양말', 'parent_id' => 12],
            ['name' => '일반 목걸이 펜던트', 'parent_id' => 12],
        ]);
    }
}
