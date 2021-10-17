<?php
// UDP同步客户端
$client = new Swoole\Client(SWOOLE_SOCK_UDP, SWOOLE_SOCK_SYNC);

$client->sendto('127.0.0.1', 9502, "我是客户端...".PHP_EOL);

echo $client->recv();

echo PHP_EOL;

// 脚本执行完就结束进程了，不像tcp客户端那样还保持着连接。