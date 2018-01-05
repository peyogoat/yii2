<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

    </body>
</html>
-->


<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.3/socket.io.js"></script>-->

<script>

// 创建Socket.IO实例，建立连接


function wsclient(){

    var socket = new WebSocket("ws://localhost:5000");
// 创建一个Socket实例


    // 打开Socket
    socket.onopen = function(event) {

        // 发送一个初始化消息
        socket.send('I am the client and I\'m listening!');

        // 监听消息
        socket.onmessage = function(event) {
            console.log('Client received a message',event);
        };

        // 监听Socket的关闭
        socket.onclose = function(event) {
            console.log('Client notified socket has closed',event);
        };

        // 关闭Socket....
        //socket.close()
    };
}
// 通过Socket发送一条消息到服务器
function sendMessageToServer(message) { 
  socket.send(message); 
}
</script>

<?php
?>
