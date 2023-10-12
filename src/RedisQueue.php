<?php 

namespace Unialfa;

use Predis\Client;

class RedisQueue {
    // Representa a conexão do redis
    private $redis;

    // Automatizar a conexão com o redis 
    public function __construct() {
        $this->redis = new Client(
            [
                'scheme' => 'tcp',
                'host' => 'redis',
                'port' => 6379
            ]
        );
    }

    // Adiciona um item na fila
    public function enqueue($queueName, $item) {
        $this->redis->rpush($queueName, $item);
    }

    // Pega o que está dentro da fila, ou seja, vê o tamanho da fila
    public function getQueueLength($queueName){
        return $this->redis->llen($queueName);
    }

    // Retorna instancia realizada 
    public function getRedisInstance(){
        return $this->redis; 
    }

    // Entra na fila, pega o item e remove do item o que ele pegou 
    public function dequeue($queueName){
        return $this->redis->lpop($queueName);
    }
    
}