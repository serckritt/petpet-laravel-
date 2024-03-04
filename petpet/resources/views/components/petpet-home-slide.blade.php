{{-- 홈페이지에서 사료와 간식 카테고리의 인기상품을 나열하는 부분 --}}
@props(['products', 'text'])
<div>
    <div class="mpfont">최고 인기 <span>{{ $text }}</span></div>
    <div class="bxTwo">
        @foreach ($products as $product)
            <div class="bx2">
                <div class="bx2IntheBx">
                    <div class="imgContainer2">
                        <a href="{{ route('products.show', ['product' => $product->id]) }}">
                            <img src="{{ $product->img }}">
                        </a>
                    </div>
                    <div class="proText2">
                        {{ $product->name }}<br><span>{{ number_format($product->prize) }}</span><b style="color:#87003a;">원</b><br>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
