<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token()}}">
    <title>MyTasks</title>
    <link href="{{ asset('css/reset.css')}}" rel="stylesheet">
    <link href="{{ asset('css/task-style.css') }}" rel="stylesheet">
</head>
<body>
    <div class="wrap" class="wrap">

        <div class="task">
            <div class="task__new">
                <h2>新しいタスクを作成</h2>
                @include('layouts.regists')
            </div>

            <div class="task__area">
                <h2>私のタスク一覧</h2>
                <ul class="task__area.list">
                    @include('layouts.myTasks')
                </ul>
            </div>
        </div>
    </div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script>
<script src="{{ asset('js/task.js')}}"></script>
</body>
</html>
