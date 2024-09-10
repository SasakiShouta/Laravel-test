@extends('header')

@section('title')
    <h1>タスク一覧</h1>
@endsection

@section('content')
<table class="table table-bordered">
    <thead>
        <tr>
            <th><a href="{{ route('task.index', ['sort' => 'id', 'order' => $sortField === 'id' && $sortOrder === 'asc' ? 'desc' : 'asc']) }}">
                    id
                    @if ($sortField === 'id')
                        @if ($sortOrder === 'asc')
                            <i class="fa fa-arrow-up"></i>
                        @else
                            <i class="fa fa-arrow-down"></i>
                        @endif
                    @endif
                </a></</th>
            <th><a href="{{ route('task.index', ['sort' => 'title', 'order' => $sortField === 'title' && $sortOrder === 'asc' ? 'desc' : 'asc']) }}">
                    タスク名
                    @if ($sortField === 'title')
                        @if ($sortOrder === 'asc')
                            <i class="fa fa-arrow-up"></i>
                        @else
                            <i class="fa fa-arrow-down"></i>
                        @endif
                    @endif
                </a></th>
            <th><a href="{{ route('task.index', ['sort' => 'user_id', 'order' => $sortField === 'user_id' && $sortOrder === 'asc' ? 'desc' : 'asc']) }}">
                    担当者
                    @if ($sortField === 'user_id')
                        @if ($sortOrder === 'asc')
                            <i class="fa fa-arrow-up"></i>
                        @else
                            <i class="fa fa-arrow-down"></i>
                        @endif
                    @endif
                </a></th>
            <th><a href="{{ route('task.index', ['sort' => 'status', 'order' => $sortField === 'status' && $sortOrder === 'asc' ? 'desc' : 'asc']) }}">
                    ステータス
                    @if ($sortField === 'status')
                        @if ($sortOrder === 'asc')
                            <i class="fa fa-arrow-up"></i>
                        @else
                            <i class="fa fa-arrow-down"></i>
                        @endif
                    @endif
                </a></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tasks as $task)
        <tr>
            <td>{{ $task->id }}</td>
            <td>{{ $task->title }}</td>
            <td style="text-align:right">{{ $task->user->name ?? '未設定' }}</td> <!-- ユーザー名を表示 -->
            <td style="text-align:right">
            @switch($task->status)
                @case(0)
                    未着手
                    @break
                @case(1)
                    着手中
                    @break
                @case(2)
                    保留
                    @break
                @case(3)
                    完了
                    @break
                @default
                    不明
            @endswitch
            </td>
            <td style="text-align:center">
            <a class="btn btn-primary" href="{{ route('task.edit',$task->id) }}">変更</a>
            </td>
            <td style="text-align:center">
                <form action="{{ route('task.destroy',$task->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-sm btn-danger">削除</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection