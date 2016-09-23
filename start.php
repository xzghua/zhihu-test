<?php
require_once(dirname(__FILE__) . '/vendor/autoload.php');

  $database = [
      'driver'    => 'mysql',
      'host'      => 'localhost',
      'database'  => 'zhihu',
      'username'  => 'root',
      'password'  => '123456',
      'charset'   => 'utf8',
      'collation' => 'utf8_unicode_ci',
      'prefix'    => '',
  ];

  use Illuminate\Container\Container;
  use Illuminate\Database\Capsule\Manager as Capsule;
  use Illuminate\Database\Eloquent\Model as Model;

  $capsule = new Capsule;

  // 创建链接
  $capsule->addConnection($database);

  // 设置全局静态可访问
  $capsule->setAsGlobal();

  // 启动Eloquent
  $capsule->bootEloquent();

class Zhuan extends Model
{
    protected $table = 'zhuanlan';

    protected $fillable = [
        'name',
        'z_id',
        'description',
        'followersCount',
        'postsCount',
        'url'
    ];
}

class Users extends Model
{
    protected $table = 'users';

    protected $fillable = [
        'user_id',
        'bio',
        'description',
        'hash',
        'isOrg',
        'name',
        'profileUrl',
        'slug',
    ];
}