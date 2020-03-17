<?php
    /**
        *PDO 预处理(DELETE)
     */

    //数据库用户名
    $user = 'root';
    //数据库密码
    $pass = 'root';

    //连接数据库
    $dbh = new PDO('mysql:host=localhost;dbname=1906shop', $user, $pass);
    //var_dump($dbh);

    //准备SQL语句
    $sql = "DELETE FROM p_goods WHERE goods_id = ?";

    //PDO预处理 DELETE
    $stmt = $dbh->prepare($sql);                                    //准备SQL模板

    $goods_id = 12;

    //绑定参数
    $stmt->bindValue(1,$goods_id);

    //执行预处理语句
    $stmt->execute();

    //返回结果
    $result = $stmt->rowCount();

    //判读返回结果
    if($result)
    {
        echo "删除成功";
    }else{
        echo "删除失败";
    }