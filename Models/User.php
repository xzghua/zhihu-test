<?php
/**
 * Created by PhpStorm.
 * User: ylsc
 * Date: 16-8-31
 * Time: 上午11:10
 */

use Illuminate\Database\Eloquent\Model;

class User extends Model
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

