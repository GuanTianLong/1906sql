<?php


    //数据库用户名
    $user = 'root';
    //数据库密码
    $pass = 'root';

    //连接数据库
    $dbh = new PDO('mysql:host=localhost;dbname=1906shop', $user, $pass);
    //var_dump($dbh);

    //准备SQL语句
    $sql = "INSERT INTO p_goods (`goods_name`,`goods_price`) VALUES ('华为P30','9999')";
    echo "准备的SQL语句：".$sql;echo "<hr>";

    //执行SQL语句
    $res = $dbh->exec($sql);

    //返回自增ID
    $goods_id = $dbh->lastInsertId();
    echo "自增ID：".$goods_id;