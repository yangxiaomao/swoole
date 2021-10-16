<?php

$server = new \Swoole\Server('0.0.0.0', 1215, SWOOLE_PROCESS, SWOOLE_SOCK_TCP);

$server->set(array(
    'reactor_num'   => 2,     // 反应器线程数
    'worker_num'    => 2,     // 工作进程数
));
// 接收客户端连接
$server->on('connect', function ($server, $fd){
    echo "客户端：连接.\n";
});

// 接收消息
$server->on('receive', function ($server, $fd, $reactor_id, $data) {
    $server->send($fd, 'Swoole客户端TCP连接消息: '.$data);
    $server->close($fd);
});

$server->on('close', function ($server, $fd) {
    echo "客户端: 关闭.\n";
});
$server->start();

?>