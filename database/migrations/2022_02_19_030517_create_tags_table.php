<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->unsignedBigInteger('id', true);
            $table->string('name');
            $table->unsignedBigInteger('user_id');
            $table->softDeletes();
            // timestampと記載するとレコード挿入時、更新時に値が入らないので、DB::rawで直接記載している
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP')); // 更新時間
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP')); // 作成時間
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
        // tagsテーブルが存在した場合は削除
        Schema::dropIfExists('tags');
    }
}
