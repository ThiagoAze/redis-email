<?php 

//consegue ter várias classes com o namespace
//carega o autoload dentro desse arquivo 

use Unialfa\OrderProcessor;
use Unialfa\RedisQueue;

require 'vendor/autoload.php';

//instancia do redis
$queue = new RedisQueue();
//instancia da classe pedido
$orderProcessor = new OrderProcessor($queue);

$order = [
    'order_id' => 123,
    'costumer' => 'João Gabriel',
    'email' => 'qualquercoisa@gmail.com',
    'total_amount' => 100.00
];

//grava o item na fila, utilizando a classe redis
$orderProcessor->Processorder($order);
