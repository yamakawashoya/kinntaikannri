<style>
    
    .header{
        padding: 0px 4% 0px;
        background-color: #fff;
        display: flex;
        align-items: center;
        max-width: 100%;
        
    }

    .main{
        max-width: 100%;
        text-align: center;
        padding: 50px ;
        background-color: #f5f5f5;
    }

    .title{
        font-size: 19px;
    }

    .mail{
        margin: 25px;
    }

    .pass{
        margin-bottom: 25px;
    }

    input {
    width: 300px;
    height: 40px;
    padding: 3px;
    margin: 5px 0;
    border: 1px solid #aaa;
    border-radius: 4px;
    }

    .login {
    width: 300px;
    padding: 10px 0;
    background-color: #0000ff;
    margin: 10px 0;
    color: #fff;
}

a {
    text-decoration:none;
    color:#0000ff;
}

.footer{
    margin-top: auto;
    text-align: center;
}

h4{
    color:#7f7f7f;
}

    
</style>

<layout>
    <div class="header">
            <h1>Atte</h1>
    </div>
    <div class="main">
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        
        <!-- Session Status -->
        

        <!-- Validation Errors -->
        

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <h1 class="title">ログイン</h1>

                <input class="mail" placeholder="メールアドレス" id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                

                <input class="pass" placeholder="パスワード" id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <!--<div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>-->

            <div class="flex items-center justify-end mt-4">
                <!--@if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif-->

                <button class="login">
                    {{ __('ログイン') }}
                </button>
                
            </div>
            <h4>アカウントをお持ちでない方はこちらから</h4>
            <a href="http://127.0.0.1:8000/register">会員登録</a>
        </form>
        
</div>
    <div class="footer">
    <p>Atte,inc.</p>
    </div>
</layout>

