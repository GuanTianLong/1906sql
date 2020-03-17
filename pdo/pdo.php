<?php

    //数据库用户名
    $user = 'root';
    //数据库密码
    $pass = 'root';

    //连接数据库
    $dbh = new PDO('mysql:host=localhost;dbname=1906shop', $user, $pass);
    //var_dump($dbh);

    //准备SQL语句
    $sql = "SELECT * FROM p_goods";
    echo "准备的SQL语句：".$sql;echo "<br>";

    //执行SQL查询
    $res = $dbh->query($sql);

    //遍历数据
    while($row = $res->fetch(PDO::FETCH_ASSOC)){
        echo "<pre>";print_r($row);echo "</pre>";
        echo "<hr>";
    }



?>