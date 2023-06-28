<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>日付別勤怠ページ</title>
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
            margin: 0 ;
            display: flex;
            margin-left:740px;
        }

        li {
            margin: 0 0 0 15px;
            font-size: 14px;
            margin-right: 30px;
        }

        body{
            max-width: 100%;
            background-color: #f5f5f5;
        }

        .main{
            height: 450px;
        }

        .change{
            font-size: 30px;
            display: flex;
            margin-top:30px;
            float: left;
            margin-right: 30px;
            margin-left: 38%;
        }

        .title{
            display: flex;
            margin-top:40px;
            font-size: 140%;
        }

        .change2{
            font-size: 30px;
            display: flex;
            margin-top:30px;
            float: right;
            margin-right: 43%;
        }

        .table{
            font-size: 16px;
            text-align: center;
            margin-top: 30px;
            width :80%;
            margin-left: 10%;
            padding: 15px 0;
            border-spacing: 0;
        }

        .table th,.table td{
            border-bottom: 1px solid #000;
            padding: 10px;
        }

        footer{
            background-color: #fff;
            margin-top: auto;
            text-align: center;
        }

        .container {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        svg.w-5.h-5 {/*paginateメソッドの矢印の大きさ調整のために追加*/width: 30px;
            height: 30px;
            
        }

        .page{
            margin: 10px;

        }

    </style>
</head>
<body>
    <div class="container">
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
    <div class="main">
    <a class="change" href="{{ route('attendance.show', ['date' => $previousDate]) }}"><</a>
    
    <a class="change2" href="{{ route('attendance.show', ['date' => $nextDate]) }}">></a>
    <h1 class="title">{{ $now_format }}</h1>
    <table class="table">
        <thead>
            <tr>
                <th class="th1">名前</th>
                <th class="th">勤務開始時間</th>
                <th class="th">勤務終了時間</th>
                <th class="th">休憩時間</th>
                <th class="th">勤務時間</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr>
                <td>{{ $item['attendance']->user->name }}</td>
                <td>{{ $item['attendance']->start_time }}</td>
                <td>{{ $item['attendance']->end_time }}</td>

                <td>@foreach ($item['breakHours'] as $breakHour)
                        {{ $breakHour }}
                    @endforeach</td>

                <td>{{ $item['workHours']}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
        <div class="page">
            {{ $attendances->links('vendor.pagination.bootstrap-4') }}
        </div>
    </div>
    
    <footer>
        <p>Atte,inc.</p>
    </footer>
    
    </div>
</body>
</html>