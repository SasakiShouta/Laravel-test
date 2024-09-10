<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    <title></title>
  </head>
  <body>
    <h1>@yield('title')</h1>
    <div class="container">
        <h1><div class="row">
        <div class="col-lg-12">
            <div>
                <a class="btn btn-success" href="{{ route('task.index') }}">タスク一覧</a>
                <a class="btn btn-success" href="{{ route('task.create')}}">タスク新規登録</a>
                <a class="btn btn-success" href="#">ユーザー情報変更</a>
                <a class="btn btn-success" href="#">ログアウト</a>
            </div>
        </div>
    </div></h1>
    </div>
    <div class="db">
        <h2>@yield('content')</h2>
    </div>
  </body>
</html>