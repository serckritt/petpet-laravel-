{{-- 수정필요 장바구니등록시 링크 --}}
<x-petpet-layout>
    <x-petpet-page>
        <div class="probox">
            <div class="proimg">
                <img src={{ $product->img }}>
            </div>
            <div class="proinfo">
                <div class="pinfo">
                    <b>{{ $product->name }}</b>
                </div>
                <div class="line"></div>
                <div class="pinfo1">
                    <span>{{ number_format($product->prize) }}</span><b style="color:#99004c;">원</b>
                </div>
                <div class="pinfo1">
                    <div class="wrap-star">
                        <b style="color:green; font-size:0.6em;">평점 {{ round($product->reviews_avg_rating,2) }}</b>
                        <div class='star-rating'>
                            <span style ="width:{{ (round($product->reviews_avg_rating,2)*20).'%'}}"></span>
                        </div>
                    </div>
                </div>
                <div class="line"></div>
                <div class="pcount">
                    <div class="pcount1">수량</div>
                    <div class="pcount2">
                        <button type ="button" onclick="proCount('minus')">-</button>
                        <div id="cResult">1</div>
                        <button type="button" onclick="proCount('plus')">+</button>
                    </div>
                </div>
                <div class="line"></div>
                <div class="pcount">
                    <div class="pcount1">구매 가격</div>
                    <div id="prResult">{{ number_format($product->prize) }}</div>원 
                </div>
                <form method="post" name="buy" action="sendcart.php"> {{-- 실제 장바구니 등록 폼 --}}
                    @csrf
                    <div class="pBtn">
                        <input type="hidden" name="id" value="{{ $product->id }}"> {{-- 상품종류 --}}
                        <input type="hidden" name="count" id="hiddencnt" value="1"> {{-- 수량 --}}
                        <input type="hidden" name="type" value="1"> {{-- 바로구매와 장바구니구매를 구분하는 기능--}}
                        <button type="submit" id="shopBasketBtn">장바구니</button>
                        <button type="submit" id="buyNowBtn" formaction="buy.php">바로구매</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="choose">
            <button type="button" id="cBtn1">상품상세</button>
            <button type="button" id="cBtn2">리뷰</button>
        </div>

        {{-- 이하 상품설명 및 리뷰내용, 리뷰작성창 --}}
        <div class="twoMenu">
            <x-product-detail :category="$product->category->parent->parent->id"/>
                {{-- 상품설명 카테고리에 따라 다른 내용 출력 --}}
            <div id="menu2">
                @auth   {{-- 버튼 클릭시 리뷰작성창 등장 내용은 div id="menu3" --}}
                    <button type="button" class="reviewWrite" id="reviewWrite">리뷰쓰기</button>
                @else   {{-- 로그인 하지않으면 버튼 클릭시 로그인창 --}}
                    <a href="{{ route('login') }}"><button type="button" class="reviewWrite">리뷰쓰기</button></a>
                @endauth

                @forelse ($product->reviews as $review)
                    {{-- 리뷰창 --}}
                    <div class="reviewBx1">
                        <img src="https://user-images.githubusercontent.com/126138315/234766275-37966cb5-fb4c-4924-b487-3f3595c7583a.png">
                        <div class="rBxName">
                            {{ $review->user->name }}<br>
                            <div class="wrap-star">
                                <div class='star-rating'>
                                    {{--width값에 rating*20 값 입력--}}
                                    <span style ="width:{{ ($review->rating *20).'%'}}"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="reviewBx2">
                        {{ $review->text }}
                    </div>
                @empty
                    {{-- 없으면 대체메시지 --}}
                    <div class="reviewBx1">
                        <img src="https://user-images.githubusercontent.com/126138315/234766281-4bac09fc-2ff6-487a-86ec-d27a592ec212.png">
                        <div class="rBxName">
                            아직 리뷰가 없습니다.
                            <br>
                        </div>
                    </div>
                @endforelse
            </div>

            <div id="menu3"> {{-- 리뷰작성창 --}}
                <form method="post" action="{{ route('reviews.store') }}">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}"> {{-- 상품아이디 --}}

                    <table class="bigTable">
                        <tr>
                            <td class="table1" style=" height:50px; text-align:center; ">평점</td>
                            <td class="table2">
                                <div class="pcount3">{{-- 평점설정 --}}
                                    <button type ="button" onclick="starCount('minus')"
                                        style="width:40px; height: 40px; font-size: 1.1em;">-</button>
                                    <div id="starBx">
                                        <div class="wrap-star">
                                            <div class='star-rating2'>
                                                <span id="starRate" style ="width:10%"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" onclick="starCount('plus')"
                                        style="width:40px; height: 40px; font-size: 1.1em;">+</button>
                                </div>
                                <input type="hidden" id="starValue" name="rating" value="0.5">  {{-- 평점 실제값 --}}
                            </td>
                        </tr>
                        <tr>
                            <td class="table1" style=" height:300px; text-align:center; ">내용</td>
                            <td class="table2">
                                <textarea name="text" style="width:1270px; height: 270px; margin:10px;"></textarea>
                                {{-- 내용입력 --}}
                            </td>
                        </tr>
                    </table>
                    <div style=" text-align: right; margin-top: 20px; ">
                        <button id="reviewBtn">리뷰 입력</button>
                    </div>
                </form>
            </div>
        </div>
    </x-petpet-page>
</x-petpet-layout>