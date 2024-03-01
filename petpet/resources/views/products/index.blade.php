{{-- 리뷰기능 보완필요? --}}
{{-- 카트기능 링크수정필요 --}}
<x-petpet-layout>
    <x-petpet-page>
        <div class="listBx">
            @if(isset($search)) {{-- 검색창 검색시 텍스트 출력--}}
                <div class="listText"><i>{{ $search }}</i> 키워드로 검색하신 결과입니다.</div>
            @endif
            @if(isset($category)) {{-- 카테고리 검색시 텍스트 출력--}}
                <div class="listText"><i>{{ $category->name }}</i> 카테고리로 검색하신 결과입니다.</div>
            @endif
            @foreach ($products as $product)
                <div class="proBx">
                    <div class="proBxImg">
                        <div>
                            <a href={{ route('products.show', ['product' => $product->id]) }}>
                                <img src={{ $product->img }}>
                            </a>
                        </div>
                    </div>
                    <div class="proBxContent">
                        <div class="pbcTitle">
                            {{ $product->name }}<br>
                            <span>{{ number_format($product->prize) }}</span><b style="color:#87003a">원</b><br>
                            <div class="wrap-star">
                                <b style="color:green; font-size:0.6em;">평점 {{ round($product->reviews_avg_rating,2) }}</b>
                                <div class='star-rating'>
                                    <span style ="width:{{ (round($product->reviews_avg_rating,2)*20).'%'}}"></span>
                                </div>
                            </div>
                        </div>
                        @if ( $product->reviews->first() != null )
                            <div class="pbcReview">
                                <div class="pbcIcon">
                                    <img src="https://user-images.githubusercontent.com/126138315/234766275-37966cb5-fb4c-4924-b487-3f3595c7583a.png">
                                    {{-- 임시 리뷰프사 --}}
                                </div>
                                <div class="pbcrContent">{{ $product->reviews()->latest()->first()->text }}</div>
                            </div>
                        @else
                            <div class="pbcReview">
                                <div class="pbcIcon">
                                    <img src="https://user-images.githubusercontent.com/126138315/234766281-4bac09fc-2ff6-487a-86ec-d27a592ec212.png">
                                    {{-- 리뷰가 없으면 오류이미지 --}}
                                </div>
                                <div class="pbcrContent">아직 리뷰가 없습니다</div>
                            </div>
                        @endif
                        
                    </div>
                    <div class="proBxContent2">
                        <form action="sendcart.php" method="post">
                                <input type="hidden" value="{{ $product->id }}" name="id">
                                <input type="hidden" value="1" name="count" id="productCount{{ $loop->iteration }}">
                            <div>
                                <div class="pbCount">
                                    <button type ="button" id="pbNumMinus{{ $loop->iteration }}">-</button>
                                    <div class="pbNumber" id="pbNum{{ $loop->iteration }}">1</div>
                                    <button type="button" id="pbNumPlus{{ $loop->iteration }}">+</button>
                                </div>
                            </div>
                            <br><br>
                            <div><button type="submit" class="basket">장바구니</button></div>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </x-petpet-page>
</x-petpet-layout>