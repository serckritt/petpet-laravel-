마이그레이션 후 시더의 실행 필요
php artisan db:seed
sail artisan db:seed

직접 작성한 파일
    app\Http\Controllers\HomeController.php     페이지 홈
    app\Http\Controllers\ProductController.php  상품 관련기능
    app\Http\Controllers\ReviewController.php   리뷰 작성 기능
    app\Http\Controllers\CartController.php     장바구니 기능
    app\Http\Controllers\PurchaseController.php 결제 기능
    app\Http\Controllers\RecordController.php   구매기록 삭제
    app\Http\Controllers\MyPageController.php   마이페이지

    app\Http\Requests\StoreReviewRequest.php    리뷰 작성시 유효성 검사
    app\Http\Requests\StoreCartRequest.php      장바구니 등록시 유효성 검사
    app\Http\Requests\PurchaseRequest.php       결제시 유효성 검사

    app\Models\Category.php 카테고리
    app\Models\Product.php  상품
    app\Models\Review.php   리뷰
    app\Models\Cart.php     장바구니
    app\Models\Record.php   구매기록

    app\View\Components\Category.php    카테고리 컴포넌트

    로그인, 회원가입, 회원정보 수정 기능은 블레이드의 기본 컨트롤러를 사용했음

    database\migrations
    database\seeders

    resources\home.blade.php    페이지 홈
        resources\components\petpet-home-container.blade.php
        resources\components\petpet-home-gallery.blade.php
        resources\components\petpet-home-slide.blade.php

    resources\mypage.blade.php  마이페이지

    resources\auth\login.blade.php      로그인
    resources\auth\register.blade.php   회원가입

    resources\product\index.blade.php   상품 목록 보기
    resources\product\show.blade.php    상품 상세 보기
        resources\components\product-detail.blade.php
    
    resources\purchase\cart.blade.php   장바구니
    resources\purchase\buy.blade.php    결제 폼

    resources\components\petpet-layout.blade.php    기본 레이아웃
    resources\components\petpet-page.blade.php      헤더와 카테고리
        resources\components\category.blade.php
    resources\components\footer.blade.php           푸터