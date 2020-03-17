<?php
//使用mysqli 连接MySQL连接数据库
$mysqli = new mysqli("localhost","root","root","1906shop");

if($mysqli->connect_errno){
    die('Connect Error: ' . $mysqli->connect_errno);
}

echo "数据库连接成功！";echo "<hr>";

//传递的参数
$goods_name = $_GET['goods_name'];
echo "未处理的参数：".$goods_name;echo "<br>";

//SQL注入的防御(字符的处理)
$goods_name1 = addslashes($goods_name);
echo "处理后的参数：".$goods_name1;echo "<br>";

//准备SQL语句
$sql = "SELECT * FROM p_goods WHERE goods_name='{$goods_name1}'";
//$sql = 'SELECT * FROM p_goods WHERE goods_name="'.$goods_name1.'"';
echo "准备的SQL语句：".$sql;echo "<br>";

//执行SQL查询
$res = $mysqli->query($sql);
echo "<hr>";

//遍历数据
while($row = $res->fetch_assoc()){
    echo "<pre>";print_r($row);echo "</pre>";
}













?>