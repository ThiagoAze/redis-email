<?php 

namespace Unialfa;

class EmailService {
    //propriedade
    public function sendEmail($to, $subject, $message) {
        echo "Enviando mensagem para: $to, Titulo: $subject, Mensagem: $message";
    }
}