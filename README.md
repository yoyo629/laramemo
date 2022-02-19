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