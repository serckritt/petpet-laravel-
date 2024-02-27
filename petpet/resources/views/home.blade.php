<x-petpet-layout>
    <x-petpet-page>
        <div class="ad">
            <div class="slide">
                <img src="https://user-images.githubusercontent.com/126138315/234767967-05962889-ba90-4fc4-b280-ada091233c62.png" alt="슬라이드 이미지 1">
            </div>
            <div class="slide">
                <img src="https://user-images.githubusercontent.com/126138315/234767977-a8e64e5c-a16d-4a9f-bd5c-2d8bea8c3bdb.png" alt="슬라이드 이미지 2">
            </div>
            <div class="slide">
                <img src="https://user-images.githubusercontent.com/126138315/234767998-b5efd3d8-2ea4-4437-bd2a-ae9b2cf89c00.png" alt="슬라이드 이미지 3">
            </div>
        </div>
        <x-petpet-home-container :products=$contents/>
        <x-petpet-home-slide :products=$feed text="사료"/>
        <x-petpet-home-slide :products=$snack text="간식"/>
    </x-petpet-page>
</x-petpet-layout>