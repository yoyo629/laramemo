<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Memo; // Memoモデルをインポート

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('create');
    }

    // POSTの場合は引数にRequestをインスタンス化することで、HTTPリクエストかかわる様々なメソッドを使用できる
    public function store(Request $request)
    {
        // リクエストで投げられたものをすべて取得する。
        $posts =$request->all();

        // dump dieの略 => メソッドの引数の取った値を展開して止める => データ確認をするデバッグ関数
        // dd($posts);

        // DBに入れるためinsertメソッドを使用
        // 'key' => 'value'形式で入れるとDBにデータが入る。キーはカラム名と一致させる。
        // \Auth::id()でログインユーザーのIDを取得できる。
        Memo::insert(['content' => $posts['content'], 'user_id' => \Auth::id()]);

        // リダイレクト処理
        return redirect( route('home'));
    }
}
