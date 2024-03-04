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
                    <div class="piBx1"><a href="{{ route('carts.index') }}">01 장바구니</a></div>
                    <div class="piBx2">02 주문결제</div>
                    <div class="piBx1">03 주문완료</div>
                </div>
            </div>
        </div>
        <div class="cartContent">
            <form method="POST" action="{{ route('purchase') }}" name="user">
                @csrf
                <div class="cartTitle">주문결제</div>
                <div class="buyContent">
                    배송정보<br><br><hr><br>
                    <p>이름 : {{ Auth::user()->name }}</p>
                    <p>이메일 : {{ Auth::user()->email }}</p>
                    <p>연락처 : {{ substr(Auth::user()->phone,0,3).'-'.substr(Auth::user()->phone,3,4).'-'.substr(Auth::user()->phone,-4,4) }}</p>
                    {{-- 010xxxxzzz를 3자리-4자리-4자리로 끊는 과정 --}}
                    <br><hr><br>
                    <div class="memberBox" style="margin-left: 0; height: 150px;">
                        <div style="display: flex;">
                            <div class="inputBar2" style="width: 80%">
                                <input type="text" id="sample6_postcode" name="postcode" placeholder="우편번호" class="idInput">
                            </div>
                            <div class="inputBar1" style="line-height: 50px">
                                <input type="button" class="blackButton" style="width: 100px;" onclick="sample6_execDaumPostcode()" value="우편번호 찾기"><br>
                            </div>
                        </div>
                        <div class="inputBar">
                            <input type="text" id="sample6_address" name="address" placeholder="주소" class="idInput"><br>
                        </div>
                        <div class="inputBar">
                            <input type="text" id="sample6_detailAddress" name="detail_address"  placeholder="상세주소" class="idInput">
                        </div>
                    </div>
                    {{-- 에러메시지창 --}}
                        <div class = "error">
                            <x-input-error :messages="$errors->get('postcode')" class="mt-2" />
                            <x-input-error :messages="$errors->get('address')" class="mt-2" />
                            <x-input-error :messages="$errors->get('detail_address')" class="mt-2" />
                        </div>
                    {{-- 에러메시지창 --}}
                    <br><br>
                    <select name="delivery_request">
                        <option value="요청사항 없음">배송시 요청사항 선택(기본 요청사항 없음)</option>
                        <option value="직접 수령하겠습니다.">직접 수령하겠습니다.</option>
                        <option value="문 앞에 놓아주세요.">문 앞에 놓아주세요.</option>
                        <option value="경비실에 맡겨주세요.">경비실에 맡겨주세요.</option>
                        <option value="대문 앞에 놓아주세요.">대문 앞에 놓아주세요.</option>
                    </select><br><br><hr>
                    <br>주문상품<br><br><hr>
                    <div class="cartItemSE" style="display:flex;">
                        <div style="width:860px; text-align:center;">상품상세정보</div>
                        <div style="width:170px; text-align:center;">가격</div>
                        <div style="width:170px; text-align:center;">배송비</div>
                    </div>
                    @php($sum = 0) {{-- 합계를 구하는 용도 --}}
                    @isset($carts)  {{-- 장바구니 구매 or 바로구매 여부 --}}
                        @foreach ($carts as $cart)
                            {{-- 장바구니 구매시 장바구니 내의 모든 상품 나열--}}
                            <x-buy-list :product="$cart->product" :count="$cart->count"/>
                            @php($sum += $cart->product->prize * $cart->count)
                        @endforeach
                    @else
                        {{-- 바로구매시 리퀘스트로 받은 상품목록 --}}
                        <input type="hidden" name="type" value="1">
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="hidden" name="count" value="{{ $count }}">
                        <x-buy-list :product="$product" :count="$count"/>
                        @php($sum = $product->prize * $count)
                    @endisset
                    <hr>
                    <br>결제방법<br><br><hr>
                    <button type="button" id="payMath" class="blackButton">카드사선택</button><br><br>
                    <input type="hidden" id="card" name="credit_card" value="">

                    {{-- 버튼 클릭시 등장하는 영역 --}}
                        <div id="payMa">
                            <div class="payMa1">
                                <div id="bankBorder1">
                                    <button type="button" style="border: 0; background-color: #ffffff;" id="bank1">
                                        <img src="https://user-images.githubusercontent.com/126138315/242484260-1075970b-5045-4131-a167-6554be5bc117.png">
                                    </button>
                                </div>
                                <div id="bankBorder2">
                                    <button type="button" style="border: 0; background-color: #ffffff;" id="bank2">
                                        <img src="https://user-images.githubusercontent.com/126138315/242484264-09d1b703-a2e2-4b24-94f7-1e7810ef195c.png">
                                    </button>
                                </div>
                                <div id="bankBorder3">
                                    <button type="button" style="border: 0; background-color: #ffffff;" id="bank3">
                                        <img src="https://user-images.githubusercontent.com/126138315/242484267-62c5d844-24ed-4afd-87f7-bc950724d84d.png">
                                    </button>
                                </div>
                                <div id="bankBorder4">
                                    <button type="button" style="border: 0; background-color: #ffffff;" id="bank4">
                                        <img src="https://user-images.githubusercontent.com/126138315/243270031-fe2f4523-7f3f-4e9e-b10c-aeb94059fdb8.png">
                                    </button>
                                </div>
                                <div id="bankBorder5">
                                    <button type="button" style="border: 0; background-color: #ffffff;" id="bank5">
                                        <img src="https://user-images.githubusercontent.com/126138315/243270011-ff987a5e-d29a-4e14-a40c-f71fff34cf9a.png">
                                    </button>
                                </div>
                            </div>
                            <select name="installment" style="margin: 0 0 10px 10px;">
                                <option value="일시불">일시불</option>
                                <option value="1개월 무이자">1개월 무이자</option>
                                <option value="2개월 무이자">2개월 무이자</option>
                                <option value="4개월">4개월</option>
                                <option value="8개월">8개월</option>
                            </select>
                        </div>
                    {{-- 버튼 클릭시 등장하는 영역 끝 --}}
                    {{-- 카드선택에서 에러발생시 --}}
                        <div class = "error">
                            <x-input-error :messages="$errors->get('credit_card')" class="mt-2" />
                        </div>
                    {{-- 카드선택에서 에러발생시 --}}
                    <div class="lumpSum">
                        <div class="lum1">상품가격 {{ number_format($sum) }}원</div>
                        <div class="lum2">+</div>
                        <div class="lum1">배송비 무료</div>
                        <div class="lum2">=</div>
                        <div class="lum1">총 {{ number_format($sum) }}원</div>
                    </div>
                </div>
                <div class="cbtnArea">
                    <button type="submit" class="payBtn">
                        결제하기
                    </button>
                </div>
            </form>
        </div>
    </div>
    <x-footer/>
</x-petpet-layout>