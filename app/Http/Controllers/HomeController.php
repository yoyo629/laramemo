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
        // ここでメモ一覧を取得(select文)
        // user_idがログインユーザーのidと一致する条件 
        $memos = Memo::select('memos.*')
            ->where('user_id', '=', \Auth::id())
            ->whereNull('deleted_at')
            ->orderBy('updated_at', 'DESC')
            ->get();
            // dd($memos);

        // compactでview側に変数を渡す
        return view('create', compact('memos'));
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

    /**
     * メモ編集
     *
     * @return void
     */
    public function edit($id)
    {
        // ここでメモ一覧を取得(select文)
        // user_idがログインユーザーのidと一致する条件 
        $memos = Memo::select('memos.*')
            ->where('user_id', '=', \Auth::id())
            ->whereNull('deleted_at')
            ->orderBy('updated_at', 'DESC')
            ->get();
            // dd($memos);

        // 引数で渡された$idでテーブルからデータを取得する
        $edit_memo = Memo::find($id);

        // compactでview側に変数を渡す
        return view('create', compact('memos','edit_memo'));
    }
}
