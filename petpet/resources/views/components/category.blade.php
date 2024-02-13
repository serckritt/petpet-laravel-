<div class="nev1">
    <div class="nev2">
        <div class="subCategory">
            <div class="scMenu"><a href="ProductList.php">인기상품 보러가기</a></div>
            <div class="scMenu"><a href="ProductList.php?cate1=1">사료 및 간식 보러가기</a></div>
            <div class="scMenu"><a href="ProductList.php?cate1=2">의약품 보러가기</a></div>
            <div class="scMenu"><a href="ProductList.php?cate1=3">장난감/기타용품 보러가기</a></div>
        </div>
    </div>        

    <div class="category">
        <button id="cateBtn" type="button">
            <div class="ctbi"><img src="https://user-images.githubusercontent.com/126138315/234766244-5d475cab-3f3b-44e2-84e5-1e29193f5501.png"></div>
        </button>
        <div class="allTheWay">
            <div id="allCate">
                {{-- 1차분류 --}}
                @foreach ($categories as $category1st)
                    <div class="acMenu">
                        <div id="acBtn{{ $loop->iteration }}">{{ $category1st->name }}</div>
                    </div>
                @endforeach
            </div>
            <div id="acSub">
                <div class="acSubBx">
                    @foreach ($categories as $category1st)
                    {{-- 1차분류 --}}
                        <div id="subMes{{ $loop->iteration }}">
                            @foreach ($category1st->child as $category2nd)
                            {{-- 2차분류 --}}
                                <div class="subMesContent">
                                    <ul>
                                        <b>{{ $category2nd->name }}</b><br><br>
                                        @foreach ($category2nd->child as $category3rd)
                                        {{-- 3차분류 --}}
                                            <li>
                                                <a href="productList.php?cate3={{ $category3rd->id }}">{{ $category3rd->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endforeach              
                            <div class="subMesContentImg">
                                @switch($loop->iteration)
                                    @case(1)
                                        <img src="https://user-images.githubusercontent.com/126138315/243312151-9254c37a-c621-4ea4-aaeb-4111ce87edb1.png">
                                        @break
                                    @case(2)
                                        <img src="https://user-images.githubusercontent.com/126138315/243317002-a50a11df-9fd5-43b4-b4ef-5a7d72bcfa5c.png">
                                        @break
                                    @case(3)
                                        <img src="https://user-images.githubusercontent.com/126138315/243320419-a616ad7c-e968-4e93-830a-216c495f8159.png">
                                        @break
                                @endswitch
                            </div>
                        </div>        
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
