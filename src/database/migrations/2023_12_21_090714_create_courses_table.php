<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255)->comment('タイトル');
            $table->text('description')->comment('軽い説明');
            $table->text('outline')->comment('詳しい説明(概要)');
            $table->foreignId('teacher_id')->constrained()->cascadeOnDelete();
            $table->integer('progress')->comment('進捗率');
            $table->text('target')->nullable()->comment('対象者');
            $table->text('need')->comment('必要条件');
            $table->text('thumbnail')->nullable()->comment('サムネイル画像');
            $table->string('course_url', 255)->comment('コースのURL');
            $table->integer('publish_flg')->comment('0: 下書き, 1: 公開中');
            $table->string('created_by', 255)->comment('作成者');
            $table->string('updated_by', 255)->comment('更新者');
            $table->timestamps();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
};
