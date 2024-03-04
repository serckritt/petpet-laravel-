{{-- 홈페이지에서 최상위 인기상품 9개를 출력하는 부분 --}}
@props(['products'])

<div class="mpfont">카테고리 별 <span>상품 추천 목록!</span></div> 
<div>| 오늘의 추천</div>
<div class="container">
    <div class="conTitle">이주전체<span>인기상품</span></div>
    <div class="conMainImg">
        @foreach ($products as $product)
            {{-- 인기상품 9개중 최상위 3개는 슬라이드에서 출력 --}}
            <div class="CMIP">
                <a href="{{ route('products.show', ['product' => $product->id]) }}">
                    <img src="{{ $product->img }}">
                </a>
                <div class="cmiTxt">
                    <div class="cmiTxt1">{{ $product->name }}</div>
                    <div class="cmiTxt2"><span>{{ number_format($product->prize) }}원</span></div>
                </div>
            </div>
            @break($loop->iteration >= 3) {{-- 3번 반복시 반복끝 --}}
        @endforeach
    </div>
    <div class="conSubImg">
        {{-- 인기상품 9개중 4~9위는 우측공간에 출력 --}}
        <x-petpet-home-gallery :products=$products :count=4/>
        <x-petpet-home-gallery :products=$products :count=7/>
    </div>
</div>