@props(['product', 'count'])

<div class="cartItem">
    <div class="buyImg">
        <a href="{{ route('products.show', ['product' => $product->id]) }}"><img src={{ $product->img }}></a>
    </div>
    <div>
        <div style="width:730px; padding-left:30px; box-sizing:border-box;">
            {{ $product->name }}<br><br>
            <span>수량 {{ $count }}개 선택</span>
        </div>
    </div>
    <div class="pi">{{ number_format($product->prize * $count) }}원</div>
    <div class="pi">무료</div>
</div><br>