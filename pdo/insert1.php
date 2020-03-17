<?php

    /**
        *PDO 预处理(INSERT)
     */

    //数据库用户名
    $user = 'root';
    //数据库密码
    $pass = 'root';

    //连接数据库
    $dbh = new PDO('mysql:host=localhost;dbname=1906shop', $user, $pass);
    //var_dump($dbh);

    //准备SQL语句
    $sql = "INSERT INTO p_goods (goods_name,goods_price) VALUES (:goods_name,:goods_price)";

    $goods_name = "vivo NEX";
    $goods_price = "8999";

    //PDO预处理 INSERT
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':goods_name',$goods_name);
    $stmt->bindParam(':goods_price',$goods_price);

    //执行SQL语句
    $stmt->execute();

    //返回自增ID
    $goods_id = $dbh->lastInsertId();
    echo "自增ID：".$goods_id;