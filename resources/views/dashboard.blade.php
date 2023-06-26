<!DOCTYPE html>
<html>
<head>
    <title>Atte</title>
</head>
<style>
    header {
            max-width: 100%;
            padding: 0px 4% 0px;
            background-color: #fff;
            display: flex;
            align-items: center;
        }

        a {	
            text-decoration: none;
            color: #4b4b4b;
        }

        ul {
            list-style: none;
            display: flex;
            padding-left:740px;
        }

        li {
            margin: 0 0 0 15px;
            font-size: 14px;
            padding-right: 30px;
        }

        body{
            max-width: 100%;
            background-color: #f5f5f5;
            
        }

        .name{
            text-align: center;
            font-size: 20px;
            margin-bottom: 30px;
            margin-top: 30px;
        }


        .square-button {
            text-decoration: none;
            font-weight: bold;
            padding: 75px 170px;
            font-size: 20px;
            background-color: #fff;
            border:none;
        }

        .button-container{
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 35px;
            
            
        }

        .button-container2{
            display: flex;
            align-items: center;
            justify-content: center;
        }

        footer{
            background-color: #fff;
            margin-top: 20px;
            text-align: center;
        }

        .container {
            display: flex;
            flex-direction: column;
            min-height: 90vh;
            
            
        }

        .bt1{
            margin:0 8px;
            
        }

        .bt2{
            margin:0 8px;
        }

        .bt3{
            margin:0 8px;
        }

        .bt4{
            margin:0 8px;
        }
</style>
<body>
    <div class="container">
    <!-- ヘッダー -->
    <header>
        <h1>Atte</h1>
        <nav>
            <ul>
                <li><a href="/dashboard">ホーム</a></li>
                <li><a href="/attendance/{{ $now_format }}">日付一覧</a></li>
                <li><form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('ログアウト') }}
                    </x-responsive-nav-link>
                </form>
                </li>
            </ul>
        </nav>
    </header>

    <!-- メインコンテンツ -->
    <main>
        @if (Auth::check())
            <h1 class="name">{{ Auth::user()->name }} さんお疲れ様です！</h1>
        @endif
        <div class="button-container">
            <div class="bt1">
            <!-- 勤務開始ボタン -->
            <form action="/start" method="GET">
                @csrf
                <button class="square-button" type="submit">勤務開始</button>
            </form>
            </div>
            <div class="bt2">
            <!-- 勤務終了ボタン -->
            <form action="/end" method="GET">
                @csrf
                <button class="square-button" type="submit" >勤務終了</button>
            </form>
            </div>
            
        </div>
        <div class="button-container2">
            <!-- 休憩開始ボタン -->
            <div class="bt3">
            <form action="/break/start" method="GET">
                @csrf
                <button class="square-button" type="submit">休憩開始</button>
            </form>
            </div>
            <div class="bt4">
            <!-- 休憩終了ボタン -->
            <form action="/break/end" method="GET">
                @csrf
                <button class="square-button" type="submit" >休憩終了</button>
            </form>
            </div>
        </div>
    </main>
    <footer>
        <p>Atte,inc.</p>
    </footer>
    </div>
</body>
</html>