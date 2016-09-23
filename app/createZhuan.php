<?php
/**
 * Created by PhpStorm.
 * User: ylsc
 * Date: 16-8-31
 * Time: 上午10:43
 */
require_once(dirname(dirname(__FILE__)) . "/start.php");

$redis = new Redis();
$redis->connect('127.0.0.1', 6379);

$i = 0;
    while (true) {
        $insert = $redis->sPop('zhuanlan');

        $data = json_decode($insert,true);

        if (empty($redis->sMembers('zhuanlan'))) sleep(20);

        if ($redis->sContains('z_id',$data['z_id'])) {
            echo "该专栏数据库里已存在,".$data['z_id']."\n";
        } else {

            $redis->sAdd('url',$data['url']);
            $redis->sAdd('z_id',$data['z_id']);
            try {
                $num = Zhuan::create($data);

                echo $i."\n";
                $i++;
            } catch (Exception $e) {
                continue;
            }

        }


    }