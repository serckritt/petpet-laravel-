<x-petpet-layout>
    <x-header>
        <div class="listBx">
            @if(isset($search))
                <div class="listText"><i>{{ $search }}</i> 키워드로 검색하신 결과입니다.</div>
            @endif
            @if(isset($category))
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
                            <b style="color:green; font-size:0.6em;">배송비 무료</b>
                        </div>
                        <div class="pbcReview">
                            <div class="pbcIcon">
                                <img src="">리뷰프사
                            </div>
                            <div class="pbcrContent">리뷰내용</div>
                        </div>
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
    </x-header>
</x-petpet-layout>