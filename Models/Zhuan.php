<?php
/**
 * Created by PhpStorm.
 * User: ylsc
 * Date: 16-8-31
 * Time: 上午11:05
 */
namespace Models;

use Illuminate\Database\Eloquent\Model;

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
