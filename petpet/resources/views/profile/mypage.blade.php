
<x-petpet-layout>
    <x-petpet-page>
        <div class="userinfo">
            <div class="mypageSubtitle">회원정보 수정</div>
            <form method="post" action="{{ route('register') }}" name="user">
                @csrf
                <div class="memberBox" style="margin-left: 40px; height: 150px">
                    <div class="inputBar">
                        <input type="text" name="email" value="{{ old('email') }}" placeholder="이메일" class="idInput" required/>
                    </div>
                    <div class="inputBar">
                        <input type="text" name="name" value="{{ old('name') }}" placeholder="이름" class="idInput" required/>
                    </div>
                    <div style="display: flex;">
                        <div class="inputBar1">
                            <div class="aa">010 - </div>
                        </div>
                        <div class="inputBar2">
                            <input type="text" maxlength="4" name="phone1" placeholder="휴대폰 앞자리" class="idInput"/>
                        </div>
                        <div class="inputBar2">
                            <input type="text" maxlength="4" name="phone2" placeholder="휴대폰 뒷자리" class="idInput"/>
                        </div>
                    </div>
                </div>
                
                <div class="error">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    <x-input-error :messages="$errors->get('phone1')" class="mt-2" />
                    <x-input-error :messages="$errors->get('phone2')" class="mt-2" />
                </div>
                <div style="display: flex; margin-left: 40px; width: 100%;">
                    <button type="submit" class="payBtn">
                        수정하기
                    </button>
                </div>
            </form>
        </div>
        <div class="mypageContent">
            <div class="mypageSubtitle">최근 주문내역</div>
            <div class="buyHistory">
                <div class="proBox">
                    <div class="proSub1">날짜</div>
                    <div class="proSub2">상품정보</div>
                    <div class="proSub3">상태</div>
                    <div class="proSub4">재고</div>
                </div>
                {{-- record 테이블 필요 --}}
                {{-- @forelse ($collection as $item)
                    <div class="cartItem">
                        <div class="ciBx2" style="text-align:center; padding: 50px 0;">
                            <?=//$date?>
                        </div>
                        <div class="ciBx2">
                            <a href="productpage.php?num=<?=//$pro_num?>"><img src=<?=//$img?>></a>
                        </div>
                        <div class="ciBx3">
                            <div style="width: 760px;">
                                <?=//$name?><br><br>
                                <span>수량 <?=//$count?>개 선택</span>
                            </div>
                            <div>
                                <button type="button" onclick="del(<?=//$record_num?>)">X</button>
                            </div>
                        </div>
                        <div class="ciBx4" style="text-align:center;">준비중</div>
                        <div class="ciBx5" style="text-align:center;">없음</div>
                    </div>  
                @empty
                    <div class="bhBox">
                        <div class="warningIcon">
                            <img src="https://user-images.githubusercontent.com/126138315/234766281-4bac09fc-2ff6-487a-86ec-d27a592ec212.png">
                        </div>
                        <div class="bhBoxContent">구매 내역이 없습니다</div>
                    </div>  
                @endforelse --}}
            </div>
        </div>
    </x-petpet-page>
</x-petpet-layout>