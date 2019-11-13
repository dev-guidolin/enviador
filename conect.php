<?php

header('Content-Type: text/html; charset=utf-8');
require 'apoio.php';
require 'PHPMailerAutoload.php';



require 'vendor/autoload.php';

$smtp = new SMTP;

if ( !$smtp->connect( 'host', 'porta' ) ) {
    // erro ao conectar
}

if ( !$smtp->startTLS() ) {
    // erro ao iniciar TLS
}

// Necessário enviar o comando EHLO após iniciar o TLS,
// caso contrário não será possível autenticar.
if ( !$smtp->hello(gethostname()) ) {
    // erro ao enviar o comando EHLO
}

if ( !$smtp->authenticate( 'usuario', 'senha' ) ) {
    // erro ao autenticar o usuário
}