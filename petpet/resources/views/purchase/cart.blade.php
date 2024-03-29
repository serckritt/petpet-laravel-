<x-petpet-layout bgColor="eeeeee">
    <div class="webWidth">
        <div style="display:flex;">
            <div style="margin-left: 60px; padding-top: 60px;">
                <span class="logo_font"><a href="{{ route('home') }}">
                    <img src="https://user-images.githubusercontent.com/126138315/243158653-97e42336-5dab-4fd5-95ae-884410717add.png">
                </a></span>
            </div>
            <div style="width:1150px; padding-left:800px; box-sizing:border-box;">
                <div class="processIcon">
                    <div class="piBx2">01 장바구니</div>
                    <div class="piBx1">02 주문결제</div>
                    <div class="piBx1">03 주문완료</div>
                </div>
            </div>
        </div>
        <div class="cartContent">
            <div class="cartTitle">장바구니</div>
            <div class="mypageContent">
                <div class="myConBx">
                    <div class="proBox">
                        <div class="proSub2">상품정보</div>
                        <div class="proSub3">상품금액</div>
                        <div class="proSub4">배송비</div>
                    </div>
                    <div class="bhBox">
                        @php($sum=0) {{--합계 구하는 용도 --}}
                        @forelse ($carts as $cart)
                            <div class="cartItem">
                                <div class="ciBx2">
                                    <a href="{{ route('products.show', ['product' => $cart->product->id]) }}"><img src={{ $cart->product->img }}></a>
                                </div>
                                <div class="ciBx3">
                                    <div style="width: 730px;">
                                        {{ $cart->product->name }}<br><br>
                                        <span>수량 {{ $cart->count }}개 선택</span>
                                    </div>
                                    <div>
                                        {{-- 장바구니에서 삭제 버튼 --}}
                                        <form action="{{ route('carts.destroy', ['cart' => $cart->id ]) }}" method="POST" id="form{{ $loop->count }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" onclick="
                                                if (confirm('장바구니에서 삭제하시겠습니까?')) {
                                                    document.getElementById('form'+{{$loop->count}}).submit();
                                                }">X</button>
                                        </form>
                                        {{-- 삭제 버튼 --}}
                                    </div>
                                </div>
                                <div class="ciBx4">{{ number_format($cart->product->prize * $cart->count)}}</div>
                                <div class="ciBx5">무료</div>
                            </div>
                            @php($sum += $cart->product->prize * $cart->count)
                        @empty
                            {{-- 장바구니가 비면 메시지 출력 --}}
                            <div class="bhBox">
                                <div class="warningIcon">
                                    <img src="https://user-images.githubusercontent.com/126138315/234766281-4bac09fc-2ff6-487a-86ec-d27a592ec212.png">
                                </div>
                                <div class="bhBoxContent">장바구니가 비었습니다</div>
                            </div> 
                        @endforelse
                        @if ($carts) {{-- 장바구니에 내용이 있는 경우에만 출력 --}}
                            <div class="lumpSum">
                                <div class="lum1">상품가격 {{ number_format($sum) }}원</div>
                                <div class="lum2">+</div>
                                <div class="lum1">배송비 무료</div>
                                <div class="lum2">=</div>
                                <div class="lum1">총 {{ number_format($sum) }}원</div>
                            </div>
                        @endif
                    </div>
                </div>
                @if ($carts) {{-- 장바구니에 내용이 있는 경우에만 출력 --}}
                    <div class="cbtnArea">
                        <form action="{{ route('buy') }}" method="GET">
                            <button type="submit" class="payBtn">주문하기</button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <x-footer/>
</x-petpet-layout>