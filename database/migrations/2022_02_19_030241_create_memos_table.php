<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemosTable extends Migration
{
    /**
     * // マイグレーション時に実行されるメソッドでテーブルのカラムを定義
     *
     * @return void
     */
    public function up()
    {
        Schema::create('memos', function (Blueprint $table) {
            $table->unsignedBigInteger('id', true); // 外部キー制約をするためunsignedで符号（±など）をつけない。第二引数は自動採番設定。
            $table->longText('content');
            $table->unsignedBigInteger('user_id');

            // 論理削除を定義=>deleted_atを自動生成する。
            $table->softDeletes();
            // timestampと記載するとレコード挿入時、更新時に値が入らないので、DB::rawで直接記載している
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP')); // 更新時間をデフォルト値で入れる。
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP')); // 作成時間も同様
            $table->foreign('user_id')->references('id')->on('users'); // usersテーブルとの外部キー制約
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('memos');
    }
}
