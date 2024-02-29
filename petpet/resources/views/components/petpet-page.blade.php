{{-- .php로 된 링크 수정필요 --}}
<div class="nevBg1">      
    <div class="nevBg2"></div> {{-- 네비게이션바 배경 --}}
</div>
<div class="webWidth">
    <div class="main_area">
        <span class="Logo">
            <span class="logo_font"><a href="{{ route('home') }}"><img src="https://user-images.githubusercontent.com/126138315/243158653-97e42336-5dab-4fd5-95ae-884410717add.png" alt=""></a></span>
        </span>
        
        {{-- 검색창 --}}
        <span class="search"> 
            <form action="{{ route('products.index', ['search' => 'search']) }}">
                <input type="text" name="search" placeholder="검색어 입력" class="main_input">
                <button type="submit" class="main_search">
                    <img src="https://user-images.githubusercontent.com/126138315/234766265-6f2b2816-e296-423b-91d4-8b311ce20a07.png">
                </button>
            </form>
        </span>
        <span class="myWord">
            반려동물 <span>1등</span> 쇼핑몰<br>
            <b style="color: #99004c; font-size: 1.2em;">펫펫</b>
        </span>
        <span class="maIcon">
            @auth   {{-- 로그인시 나오는 아이콘 --}}
                <form action="{{ route('logout') }}" method="POST"> {{-- 로그아웃 --}}
                    @csrf
                    <input type="image" src="https://user-images.githubusercontent.com/131941441/234762870-5dad6e3c-dff8-4172-9901-bc7ddccfa771.png">
                </form>
                <a href="{{ route('mypage') }}"><img src="https://user-images.githubusercontent.com/131941441/234762883-154c2852-80b0-4d11-870c-f30c735ef93a.png"></a>
                <a href="cart.php"><img src="https://user-images.githubusercontent.com/131941441/234762860-443c9901-e3e9-4aab-a982-4443371db23c.png"></a>
            @else   {{-- 로그인 아닐시 나오는 아이콘 --}}
                <a href="{{ route('login') }}"><img src="https://user-images.githubusercontent.com/131941441/234762876-da869556-7c8f-47d6-a70d-c5f0b36821c6.png"></a>
                <a href="{{ route('register') }}"><img src="https://user-images.githubusercontent.com/131941441/234762850-db84c97d-bd6f-4c56-bf0c-128c2b481a0b.png"></a>
                <img src="https://user-images.githubusercontent.com/131941441/243267052-dbbdaa22-fa40-4060-87df-bea8c7bf8452.png">
            @endauth
        </span>
    </div>
</div>
<div class="webWidth">
    <x-category/>
    {{ $slot }}
    <x-footer/>
</div>