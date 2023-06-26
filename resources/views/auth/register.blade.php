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

    input {
    width: 300px;
    height: 40px;
    padding: 3px;
    margin: 5px 0;
    background-color: #f5f5f5;
    border: 1px solid #aaa;
    border-radius: 4px;
    }
    
    .register{
        width: 300px;
        padding: 10px 0;
        background-color: #0000ff;
        margin: 8px 0;
        color: #fff;
    }

    .form{
        margin-bottom:10px;
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

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <h1 class="title">会員登録</h1>
            <!-- Name -->
            <div class="form">
                <!--<x-label for="name" :value="__('Name')" />-->
                <input  placeholder="名前" id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="form">

                <input placeholder="メールアドレス" id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="form">

                <input placeholder="パスワード" id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="form">

                <input placeholder="確認用パスワード" id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            

                <button class="register">
                    会員登録
                </button>
                <h4>アカウントをお持ちの方はこちらから</h4>
                <a href="http://127.0.0.1:8000/login">ログイン</a>
            </div>
        </form>
</div>
<div class="footer">
    <p>Atte,inc.</p>
    </div>
</layout>
