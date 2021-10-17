<?php
// UDP异步客户端
$client = new Swoole\Client(SWOOLE_SOCK_UDP, SWOOLE_SOCK_SYNC);

$client->sendto('127.0.0.1', 9502, "我是客户端...".PHP_EOL);

$client->on('receive', function($client, $data){
    echo "receive data from server: " . $data . PHP_EOL;
});

$client->on('error', function($client){
    echo "client error: " . $client->errCode . PHP_EOL;
});