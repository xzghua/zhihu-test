<?php
/**
 * Created by PhpStorm.
 * User: ylsc
 * Date: 16-8-31
 * Time: 下午5:04
 */

require_once(dirname(dirname(__FILE__)) . "/start.php");

$redis = new Redis();
$redis->connect('127.0.0.1', 6379);

$i = 0;

    while (true) {
        $url = "https://zhuanlan.zhihu.com/api/columns".$redis->sPop('url')."/followers";

        $html = file_get_contents($url);

        $a = json_decode($html,true);

        foreach ($a as $key => $value) {
            $insert = [
                'name'  => $value['name'],
                'user_id'  => $value['avatar']['id'],
                'description' => $value['description'],
                'bio' => $value['bio'],
                'hash' => $value['hash'],
                'isOrg' => $value['isOrg'],
                'profileUrl' => $value['profileUrl'],
                'slug' => $value['slug']
            ];

            $return = $redis->sAdd('userData',json_encode($insert));
            if ($return) {
                echo $i."\n";
                $i++;
            } else {
                echo "已存在\n";
            }

        }

        if (($i%50) == 0) sleep(10);
    }