<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Private Email Send</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="shortcut icon" type="image/png" href="https://previews.123rf.com/images/telmanbagirov/telmanbagirov1611/telmanbagirov161100327/67912992-envelope-icon-flat-transparent-open-email-icon-on-white-background.jpg
"/>

    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="script.js"></script>
    <script src="https://cdn.tiny.cloud/1/lfeccouuran150wrdwjpmvjpgupfo5cqmt60z3jnvkiecc6v/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>tinymce.init({selector:'textarea'});</script>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Courgette&display=swap');
    </style>

</head>
<body>
<div class="container mt-5">
    <h3 class="text-center mb-5" >Private Email Send -  <span style="font-family: 'Courgette', cursive; color: darkgreen">By Gorilla Coder</span></h3>
    <div class="row">
        <div class="col-sm-4">
            <form id="envio"  enctype="multipart/form-data" method="post" action="upLoad.php">
                <div class="form-group">
                    <label for="remetente">Remetente</label>
                    <input type="email" class="form-control" id="remetente" placeholder="Remetente" name="remetente">
                </div>
                <div class="form-group">
                    <label for="smpt">Endereço SMTP</label>
                    <input type="text" class="form-control" id="smtp" placeholder="Endereço SMTP" name="smtp" value="smtp.">
                </div>
                <div class="form-group">
                    <label for="senhaRemente">Senha SMTP</label>
                    <input type="text" class="form-control" id="senhaRemente" placeholder="Senha Remetente" name="senha">
                </div>
                <div class="form-group">
                    <label for="resposta" >Cliente irá responder para:</label>
                    <input type="email" class="form-control" id="reposta" placeholder="Resposta para..." name="resposta" style="background: #f7f288">
                </div>
                <div class="form-group">
                    <label for="nomeFake" >Nome Fake</label>
                    <input type="text" class="form-control clean" id="nameFake" placeholder="Nome Fake" name="nomeFake" style="background: #b2f7da">
                </div>
                <div class="form-group">
                    <label for="destinatario" >Destinatário</label>
                    <input type="email" class="form-control clean" id="destinatario" placeholder="Destinatário" name="destinatario" style="background: #b2f7da">
                </div>
                <div class="form-group">
                    <label for="assunto" ">Assunto</label>
                    <input type="text" class="form-control clean" id="assunto" placeholder="Assunto" name="assunto" style="background: #b2f7da">
                </div>

                <div class="form-group" id="anexos">
                    <input type="file"  id="images" name="images[]" multiple>
                </div>

        </div>
        <div class="col-sm-8">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="texto"><b>Mensagem</b></label>
                        <textarea class="form-control" id="textArea" rows="20" name="texto"></textarea>
                        <button type="submit" class="btn btn-lg btn-block btn-success mt-5" id="send">Enviar</button>

                    </div>

                </div>
            </div>
            </form>
        </div>

    </div>
</div>



<script>
$(function () {
    $('.clean').val('');
})

</script>
</body>
</html>