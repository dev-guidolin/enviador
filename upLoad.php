<?php

header('Content-Type: text/html; charset=utf-8');
require 'apoio.php';
$dados = $_POST;
$arquivos = $_FILES;
$nomePasta = getToken(6);
mkdir('uploads/'.$nomePasta,0777,true);

foreach ($arquivos['images']['error'] as $key=> $error){
    if ($error == UPLOAD_ERR_OK){
        move_uploaded_file($arquivos['images']['tmp_name'][$key],"uploads/".$nomePasta.'/'.$arquivos['images']['name'][$key]);
    }
}
$dir = str_replace('\\','/',realpath('uploads/'.$nomePasta)).'/';
$dirWeb = str_replace('\\','/','uploads/'.$nomePasta).'/';
$docs = array();
foreach ($arquivos['images']['name'] as $anexos)
{
    $docs[] = $dirWeb.$anexos;
}

$dados['anexos']=$docs;
$remetente =  strtolower($dados['remetente']) ;
$smtpEnvio = strtolower($dados['smtp']);
$senha = $dados['senha'];
$fakeName = $dados['nomeFake'];
$destinatario = $dados['destinatario'];
$assunto = $dados['assunto'];
$texto = $dados['texto'];
$enviarAnexos = $dados['anexos'];
$reponderPara = $dados['resposta'];


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = false;
    $mail->isSMTP();
    $mail->Host       = $smtpEnvio;
    $mail->SMTPAuth   = true;
    $mail->Username   = $remetente;
    $mail->Password   = $senha;
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    //Recipients
    $mail->setFrom($dados['remetente'], $fakeName);
    $mail->addAddress($destinatario);
    $mail->addReplyTo($reponderPara, $fakeName);


    if (is_file(end($enviarAnexos))){
        foreach ($enviarAnexos as $anexar)
        {
            $x = explode('/',$anexar);
            $way = $x[count($x) - 2];
            $atach = $x[count($x) - 1];

            $bosta = realpath('uploads/'.$way.'/'.$atach);
            $mail->addAttachment(str_replace('\\','/',$bosta));

        }
    }

    $mail->isHTML(true);
    $mail->Subject = utf8_decode($assunto);
    $mail->Body    = $texto;
    $mail->AltBody = strip_tags($texto);

    $mail->send();
    $deletar = 'uploads/'.$way;

    if ($deletar){
        removeDirectory($deletar);

    }

    if (!is_dir('uploads')){
        mkdir("uploads", 0777,true);
    }

} catch (Exception $e) {
    echo "Mensagem não enviada. Mailer Error: {$mail->ErrorInfo}";
}
?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Enviador Master</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</head>
<body>
<div class="container mt-5">
    <div class="jumbotron">
        <h1 class="display-4">Email enviado com sucesso!</h1>
        <p class="lead">Caso tenha alguma sugestão nos envie um feedback.</p>
        <hr class="my-4">
        <p>“O verdadeiro heroísmo consiste em persistir por mais um momento, quando tudo parece perdido”</p>
        <a class="btn btn-primary btn-lg" href="#" role="button" id="voltar">Novo Envio</a>
    </div>
</div>

<script>
   $(function () {
       $("#voltar").click(function () {
           window.history.back();
       })
   })

</script>

</body>
</html>

