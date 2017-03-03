<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('avatar')->default('')->comment('头像地址');
            $table->string('confirmation_token');
            $table->smallInteger('is_active')->default(0)->comment('邮箱是否验证');
            $table->integer('questions_count',false,true)->default(0)->comment('提问数量');
            $table->integer('answers_count',false,true)->default(0)->comment('回答数量');
            $table->integer('comments_count',false,true)->default(0)->comment('评论数量');
            $table->integer('favorites_count',false,true)->default(0)->comment('收藏数量');
            $table->integer('likes_count',false,true)->default(0)->comment('点赞');
            $table->integer('followers_count',false,true)->default(0)->comment('关注者');
            $table->integer('followings_count',false,true)->default(0)->comment('关注了');
            $table->string('settings')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes('deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
