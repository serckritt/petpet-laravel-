<x-petpet-layout>
    <div class="webWidth">
        <div class="memberTop">
            <div class="memberTop1">
                <span class="logo_font"><a href="{{ route('home') }}">
                <img src="https://user-images.githubusercontent.com/126138315/243158653-97e42336-5dab-4fd5-95ae-884410717add.png">
                </a></span>
            </div>
            <div class="memberTop2">회원가입</div>
        </div>
        <div class="bmemberBox">
            <form method="post" action="{{ route('register') }}" name="user">
                @csrf
                <div class="memberBox">
                    <div class="inputBar">
                        <input type="text" name="email" value="{{ old('email') }}" placeholder="이메일을 입력해주세요" class="idInput" required/>
                    </div>
                    <div class="inputBar">
                        <input type="text" name="name" value="{{ old('name') }}" placeholder="이름" class="idInput" required/>
                    </div>
                    <div class="inputBar">
                        <input type="password" name="password" placeholder="비밀번호" class="passInput" required/>
                    </div>
                    <div class="inputBar">
                        <input type="password" name="password_confirmation" placeholder="비밀번호 확인" class="passInput" required/>
                    </div>
                    <div style="display: flex;">
                        <div class="inputBar1">
                            <div class="aa">010 - </div>
                        </div>
                        <div class="inputBar2">
                            <input type="text" maxlength="4" name="phone1" value="{{ old('phone1') }}" placeholder="휴대폰 앞자리" class="idInput"/>
                        </div>
                        <div class="inputBar2">
                            <input type="text" maxlength="4" name="phone2" value="{{ old('phone2') }}" placeholder="휴대폰 뒷자리" class="idInput"/>
                        </div>
                    </div>
                </div>
                
                <div class="error">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    <x-input-error :messages="$errors->get('phone1')" class="mt-2" />
                    <x-input-error :messages="$errors->get('phone2')" class="mt-2" />
                </div>
                <div style="display: flex; justify-content: center; width: 100%;">
                    <button type="submit" class="joinBtn" onclick="button()">
                        회원가입
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-petpet-layout>

{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
