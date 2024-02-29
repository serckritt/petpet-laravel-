
<x-petpet-layout>
    <x-petpet-page>
        <div class="userinfo">
            <div class="mypageSubtitle">회원정보 수정</div>
            <form action="{{ route('profile.update') }}" method="post">
            <div class="infoContent" >
                이름 : <input type="text" placeholder="주문자명" name="name" {{--value={{-- 주문자명 --}} style="width:315px;height:40px;"/><br><br>
                연락처 : 010 - <input type="text" placeholder="휴대폰 앞자리" name="phone1"{{-- value={{-- 폰앞자리 --}} style="width:120px;height:40px;"/> - 
                <input type="text" placeholder="휴대폰 뒷자리" name="phone2" {{--value={{-- 폰뒷자리 --}} style="width:120px;height:40px;"/><br><br>
                이메일 : <input type="text" placeholder="이메일 아이디" name="email" {{--value={{-- 이메일 --}} style="width:300px;height:40px;"/>
                <hr>
            </div>
            <button type="submit" class="payBtn">
                수정하기
            </button>
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