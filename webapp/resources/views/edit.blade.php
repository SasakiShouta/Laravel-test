@extends('header')

@section('title')
    <h1>タスク編集</h1>
@endsection

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<a href="{{ url('/index') }}">戻る</a>

<form action="{{ route('task.update',$task->id) }}" method="POST">
    @method('put')
    @csrf
    <div class="form-group">
        <h3 for="title">タスク名</h3>
        <input type="text" name="title" value="{{ $task->title }}" class="form-control" required>
        @error('title')
        <span style="color:red">タスク名を入力してください</span>
        @enderror
    </div>

    <div class="form-group">
        <h3 for="user_id">担当者</h3>
        <select name="user_id" value="{{ $task->user_id }}" class="form-controll" required>
            <option value="">選択してください</option>
            @foreach ($users as $user)
                /*user_idを参照して対応するnameを入れる */
                <option value="{{ $user->id }}"{{ $task->user_id == $user->id ? 'selected' : '' }}>{{ $user->name}}</option>
            @endforeach
            @error('user_id')
            <span style="color:red">担当者を選択してください</span>
            @enderror
        </select>
    </div>

    <div class="form-group">
        <h3 for="status">ステータス</h3>
        <select name="status" value="{{ $task->status }}" class="form-controll" required>
            <option value="0" {{ $task->status == 0 ? 'selected' : '' }}>未着手</option>
            <option value="1" {{ $task->status == 1 ? 'selected' : '' }}>着手中</option>
            <option value="2" {{ $task->status == 2 ? 'selected' : '' }}>保留</option>
            <option value="3" {{ $task->status == 3 ? 'selected' : '' }}>完了</option>
        </select>
        @error('status')
        <span style="color:red">ステータスを選択してください</span>
        @enderror
    </div>

    <div class="form-group">
        <h3 for="comment">備考</h3>
        <textarea name="comment" class="form-controll">{{ old('comment', $task->comment) }}</textarea>
        @error('comment')
        <span style="color:red">備考を入力してください</span>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">登録</button>

</form>
@endsection