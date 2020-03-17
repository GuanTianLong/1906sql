<?php

    /**
        *PDO 预处理(SELECT)
     */

    //数据库用户名
    $user = 'root';
    //数据库密码
    $pass = 'root';

    //连接数据库
    $dbh = new PDO('mysql:host=localhost;dbname=1906shop', $user, $pass);
    //var_dump($dbh);

    //传递的参数
    $goods_name = $_GET['goods_name'];
    echo "未处理的参数：".$goods_name;echo "<br>";

    //准备SQL语句(PDO预处理 SELECT)
    $sql = "SELECT * FROM p_goods WHERE goods_name = ?";

    $stmt = $dbh->prepare($sql);
    //绑定参数
    $stmt->bindParam(1,$goods_name);
    //执行SQL查询
    $stmt->execute();

    //遍历数据
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        echo "<pre>";print_r($row);echo "</pre>";
        echo "<hr>";
    }



?>