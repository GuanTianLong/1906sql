<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>在线选座</title>
</head>

<body>

<?php

    //REDIS
    $redis = new Redis();

    //连接Redis
    $redis->connect('127.0.0.1','6379');

    //Redis密码
    $redis->auth('dargon123');

    //取值
    $value = $redis->get('test001');
    echo "获取到的值：".$value;echo "<hr>";

    $seat = 100;

    for ($i=1;$i<=100;$i++){
        echo "<button class='btn'>{$i}</button>";
        if($i%10 == 0){
            echo "<br>";
        }
    }

?>


<script>
    var btns = document.getElementsByClassName("btn");
    //console.log(seat);

    for(var i=0;i<btns.length;i++){
        btns[i].style.backgroundColor = '';                 //默认为白色 backgroundColor设置背景色
        btns[i].addEventListener('click',function(e){        //addEventListener为button元素添加点击事件
            var result = confirm("你确定要选择此座位吗？" + this.innerHTML);           //innerHTML返回表格行的开始和结束标签之间的值
            console.log(result);

            if(result){
                //发送AJAX请求后端选中此座位
                this.style.backgroundColor = 'red';
                var xhr = new XMLHttpRequest();             //XMLHttpRequest 可以同步或异步地返回 Web 服务器的响应，并且能够以文本或者一个 DOM 文档的形式返回内容。

                var btn_id = this.innerHTML;

                xhr.open('GET','/redis/redis1.php?id='+btn_id,true);         //初始化 HTTP 请求参数
                xhr.send();                     //发送一个 HTTP 请求
                /**
                    *
                        onreadystatechange 事件
                        当请求被发送到服务器时，我们需要执行一些基于响应的任务。

                        每当 readyState 改变时，就会触发 onreadystatechange 事件。

                        readyState 属性存有 XMLHttpRequest 的状态信息。
                    *
                 */
                xhr.onreadystatechange = function(){
                    if(xhr.readyState === XMLHttpRequest.DONE){
                        if(xhr.status === 200){

                            alert(xhr.responseText);

                        }else{

                        }

                    }else{

                    }

                }

            }

        })


    }

</script>

</body>
</html>

