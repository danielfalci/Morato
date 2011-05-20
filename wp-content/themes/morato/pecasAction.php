<?php
session_start();

if (isset($_POST['Submit'])) {
          // Configura os dados do email
          $reply = $_POST['mail'];
          $subject = '[Peças] Pedido de peças pelo site';

          // Recebe os dados do formulário
          $name = $_POST['nome'];
          $telefone = $_POST['telefone'];
          $email = 'contato@intensiva.com.br';
          $observacoes = $_POST['observacoes'];
          $marcamoto = $_POST['marcamoto'];
          $modelomoto = $_POST['modelomoto'];
          $anofabricacao = $_POST['anofabricacao'];
          $nomepeca = $_POST['nomepeca'];

          // Aqui vc pode colocar seu html
          $html =
'Nome:  ' . $name . '
Telefone: '.$telefone.'
E-mail: ' . $reply . '
Marca da Moto: ' . $marcamoto . '
Modelo da Moto: ' . $modelomoto . '
Ano de Fabricação: ' . $anofabricacao . '
Nome da peça: ' . $nomepeca . '
Observações: ' . $observacoes . '
	 	';
          // Configura o cabecalho do email
          $head .= "Reply-To: $reply \n\n";

          // Envia o email
          $retorno = mail($email, $subject, $html, $head);

          // Checa se email foi enviado ou nao
          if ($retorno) {
                    echo 'Email enviado com sucesso!';
          } else {
                    echo 'Erro ao mandar email, tente novamente.';
          }
} else {
          echo 'Erro ao receber os dados do formulário, tente novamente.';
}
?>