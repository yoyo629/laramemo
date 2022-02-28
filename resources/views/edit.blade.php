@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">メモ編集</div>
    <!-- route('store')と書くと=> /store -->
    <form class="card-body" action="{{ route('store') }}" method="POST">
        <!-- なりすまし防止のためにcsrfトークンを発行 -->
        @csrf
        <div class="form-group">
            <!-- name属性に指定した値でデータが取れる「"content" => "テキストエリアに入力した文字"」 -->
            <textarea class="form-control" name="content" placeholder="ここにメモを入力" rows="3">{{ $edit_memo['content']}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">更新</button>
    </form>
</div>
@endsection
