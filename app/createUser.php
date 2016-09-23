<?php
/**
 * Created by PhpStorm.
 * User: ylsc
 * Date: 16-8-31
 * Time: 下午5:14
 */

require_once(dirname(dirname(__FILE__)) . "/start.php");

$redis = new Redis();
$redis->connect('127.0.0.1', 6379);

$i = 0;
while (true) {
    $insert = $redis->sPop('userData');

    $data = json_decode($insert,true);

    if (empty($redis->sMembers('userData'))) {
        echo '全部结束';
        sleep(10);
    }


    if ($redis->sContains('user_id',$data['user_id'])) {
        echo "该用户数据库里已存在,".$data['user_id']."\n";
    } else {
        try {
            $redis->sAdd('user_id',$data['user_id']);

            $num = Users::create($data);

            echo $i."\n";
            $i++;
        } catch (Exception $e) {
            continue;
        }

    }


}