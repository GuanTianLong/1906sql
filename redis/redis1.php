<?php

    //REDIS
    $redis = new Redis();

    //连接Redis
    $redis->connect('127.0.0.1','6379');

    //Redis密码
    $redis->auth('dargon123');

    $key = 'ss:btns';
    ////初始化座位数据
    //for($i=1;$i<=100;$i++)
    //{
    //    $redis->zAdd($key,0,$i);
    //}
    //die;

    $btn_id = intval($_GET['id']);

    $redis->zAdd($key,time(),$btn_id);      // 选中座位

    $response = [
        'errno' => 0,
        'msg'   => 'ok'
    ];

    echo json_encode($response);