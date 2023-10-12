<?php

use Unialfa\RedisQueue;

require "vendor/autoload.php";

// Verifica se está caindo item lá dentro, se tiver ele vai disparar e-mail 

$redisQueue = new RedisQueue();
// Variavel que vai representar o nome da fila 
$emailQueue = "email_queue";

// Entra na fila e fica monitorando a fila e fica nesse loop infinitamente 
while(true){
    if($redisQueue->getQueueLength($emailQueue) > 0){
        $orderData = $redisQueue->dequeue($emailQueue);

        // Pega o pedido capturado em json e transforma em array
        $order = json_decode($orderData, true);
        $email= $order["email"];

        file_put_contents('emails.log', print_r($order, true), FILE_APPEND);
        echo "Email enviado: $email <br>";
    } else{
        echo "A fila de emails está vazia. Aguardando dados...";
        sleep(5);
    }

    
} 

