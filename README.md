・マイグレーション
	ほかの環境に移行すること
	自分が定義したDBを他人がすぐ扱える
	PHPファイルでDBを管理できる
	機能追加とともにDB整合性も取ることができる。

・マイグレーションでできること
	テーブル作成、削除
	カラムの追加、削除
	テーブル・カラムの変更
	
・Lravelにおけるモデルを作成する際の注意点
	1テーブル：1モデル
	命名はテーブル名の単数形
	モデル名の複数形テーブルに自動的に紐づく。
	
	php artisan make:model モデル名
	
・gitbashでテーブルの単数形（複数形）を調査する方法（Ver6以降）
	php artisan tinker
	// gitbashでPHPを実行

	echo:Str::plural('単語');
	// 単数形 => 複数形

	echo Str::singular('単語');
	// 複数形 => 単数形

・モデルの役割(DBとアクセス)
	コントローラーを肥大化させないため
	・データの整形
	・複雑なSQL
	・配列の組み換え
	・複雑な条件分岐
	これらをモデルで行い、結果だけをコントローラーに返す！

・マイグレーションファイルとモデルの作成
    memosテーブル
        php artisan make:model Memo -m               
        // テーブル名の頭文字を大文字、「-m」のオプションをつけることでModelも自動作成する。
    
    memo_tagsテーブル　※（アンダーバーで区切られている場合）
        php artisan make:model MemoTag -m
        // _で区切らず先頭の単語と二つ目の単語の頭文字を大文字にする。

    上記を実行すると
        \source\laramemo\database\migrations直下にマイグレーションファイル
        \source\laramemo\app\Models直下にモデルファイル
    が作成される。
    

