<x-petpet-layout>
    <div class="webWidth">
        <div class="loginLogo">
            <span class="logo_font"><a href="{{ route('home') }}">
                <img src="https://user-images.githubusercontent.com/126138315/243158653-97e42336-5dab-4fd5-95ae-884410717add.png">
            </a></span>
        </div>
        <div class="loginBox">
            <form method="post" action="{{ route('login') }}">
                @csrf
                <p class="loginText">로그인 하시면 <b style="color:#ff7e7e;">펫<span style="color:#87003a;">펫</span></b>의<br>
                서비스를 이용하실 수 있습니다</p>
                <div class="inputField">
                    <div class="inputBar">
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="이메일" class="idInput" required/>
                    </div>
                    
                    <div class="inputBar">
                        <input type="password" name="password" placeholder="비밀번호" class="passInput" required/>
                    </div>
                </div>
                <div class = "error">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                <br><br>
                <button type="submit" class="loginBtn" onclick="button()">
                    로그인
                </button>
                <br><br>
            </form>
        </div>
        <div class="loginSupport">
            <a href="{{ route('register') }}">회원가입</a> | 아이디찾기 | 비밀번호찾기
            {{-- 찾기 기능은 지원 안되는 상태 --}}
        </div>
    </div>
</x-petpet-layout>

{{-- 원본
<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
 --}}