@props(['products', 'count'])

<div class="csiContent">
    <ul class="gallery">
        @foreach ($products as $product)
            @continue($loop->iteration < $count) {{-- count로 받은 열부터 반복시작 --}}
            @break($loop->iteration >= $count+3) {{-- 세번 반복후 break --}}
            <li>
                <div class="bx">
                    <a href="{{ route('products.show', ['product' => $product->id]) }}">
                        <div class="imgContainer"><img src="{{ $product->img }}"></div>
                        <div class="proText">
                            <div class="proText_title">
                                <div class="proText_title_name">
                                    <b>{{ $product->name }}</b>
                                </div>
                                <div>
                                    {{-- 평점은 소수점 2자리에서 반올림 --}}
                                    평점 {{ round($product->reviews_avg_rating, 2) }} 리뷰 {{ $product->reviews_count }}
                                </div>
                            </div>
                            <div class="reviewPreview"> 
                                {{-- 현재 리뷰 프사는 임시--}}
                                <div class="reviewPreview1"><img src="https://user-images.githubusercontent.com/126138315/234766275-37966cb5-fb4c-4924-b487-3f3595c7583a.png"></div>
                                {{-- 가장 최근 리뷰의 내용 가져옴 --}}
                                <div class="reviewPreview2">{{ $product->reviews()->latest()->first()->text }}</div>
                            </div>
                        </div>
                    </a>
                </div>
            </li>
        @endforeach
    </ul>
</div>