<?php
session_start();

if (isset($_POST['Submit'])) {
          // Configura os dados do email
          $reply = $_POST['mail'];
          $subject = '['.$_POST['assunto'].'] Contato do Site';

          // Recebe os dados do formul√°rio
          $name = $_POST['nome'];
          $telefone = $_POST['telefone'];
          $email = 'contato@intensiva.com.br';
          $message = $_POST['mensagem'];

          // Aqui vc pode colocar seu html
          $html =
'Nome:  ' . $name . '
Telefone: '.$telefone.'
E-mail: ' . $reply . '
Mensagem: ' . $message . '
	 	';
          // Configura o cabecalho do email
          $head .= "Reply-To: $reply \n\n";

          // Envia o email
          $retorno = mail($email, $subject, $html, $head);

          // Checa se email foi enviado ou nao
          header("location: ".$_POST['urlretorno']."&enviado=ok");
}
?>