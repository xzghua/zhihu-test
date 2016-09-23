<?php

require_once(dirname(dirname(__FILE__)) . "/start.php");
    $redis = new Redis();
    $redis->connect('127.0.0.1', 6379);

$i = 0;

while (true) {
    $url = 'https://zhuanlan.zhihu.com/api/recommendations/columns?limit=16&offset=0&seed=80';

    $html = file_get_contents($url);

    $a = json_decode($html,true);

    foreach ($a as $key => $value) {
        $insert = [
            'name'  => $value['name'],
            'z_id'  => $value['avatar']['id'],
            'description' => $value['description'],
            'followersCount' => $value['followersCount'],
            'postsCount' => $value['postsCount'],
            'url' => $value['url']
        ];

        $return = $redis->sAdd('zhuanlan',json_encode($insert));
        if ($return) {
            echo $i."\n";
            $i++;
        } else {
            echo "已存在\n";
        }

    }

//    if (($i%100) == 0) sleep(20);
  }
