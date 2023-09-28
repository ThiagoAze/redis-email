<?php

namespace Unialfa; 

class OrderProcessor {
    private $queue; 

    public function __construct(RedisQueue $queue) {
        $this->queue = $queue;
    }

    // Função que adiciona pedido na fila, parametro represta o valor, nome etc produto 
    public function Processorder(array $order){
        $this->queue->enqueue('email_queue', json_encode($order));
    }
}