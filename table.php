<?php

  include './start.php';

  use Illuminate\Database\Capsule\Manager as Capsule;

  Capsule::schema()->create('zhuanlan', function($table)
  {
      $table->increments('id');
      $table->string('name')->comment('名称');
      $table->string('z_id')->unique()->comment('知乎专栏ID');
      $table->text('description')->nullable()->comment('描述');
      $table->integer('followersCount')->comment('关注人数');
      $table->integer('postsCount')->nullable()->comment('文章数');
      $table->string('url')->comment('地址');
      $table->timestamps();
  });



Capsule::schema()->create('users', function($table)
{
    $table->increments('id');
    $table->string('user_id')->comment('用户的知乎ID');
    $table->text('bio')->nullable()->comment('签名');
    $table->text('description')->nullable()->comment('描述');
    $table->string('hash')->comment('hash');
    $table->string('isOrg')->nullable()->comment('isOrg');
    $table->string('name')->comment('用户昵称');
    $table->string('profileUrl')->nullable()->comment('用户资料地址');
    $table->string('slug')->comment('用户别名');
    $table->timestamps();
});
