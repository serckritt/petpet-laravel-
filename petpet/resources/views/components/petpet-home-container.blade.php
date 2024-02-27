@props(['products'])

<div class="mpfont">카테고리 별 <span>상품 추천 목록!</span></div> 
<div>| 오늘의 추천</div>
<div class="container">
    <div class="conTitle">이주전체<span>인기상품</span></div>
    <div class="conMainImg">
        @foreach ($products as $product)
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
        {{-- 상품 세개를 나열하는 컴포넌트를 두번 호출시키기 --}}
        <x-petpet-home-gallery :products=$products :count=4/>
        <x-petpet-home-gallery :products=$products :count=7/>
    </div>
</div>