<?php

use Unialfa\RedisQueue;

require 'vendor/autoload.php';

// Cria objeto que cria conexão do redis
$redisQueue = new RedisQueue();
$queueName = 'email_queue';

// Tamanho da fila
$queueLength = $redisQueue->getQueueLength($queueName);

if ($queueLength > 0 ){
    echo "Itens na fila $queueName <br>";

    // Retorna um array 
    $allItems = $redisQueue->getRedisInstance()->lRange($queueLength, 0, -1);

    foreach($allItems as $i => $item) {
        echo "$i: $item <br>";
    }
} else {
    echo "A fila $queueName tá vazia <br>";
}

