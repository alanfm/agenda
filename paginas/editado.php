<?php
// Verifica se foi enviado alguns dados pelo formulário
if (!empty($_POST['status']) || $_POST['status'] == '0'){
  // Cria um array com as linhas do arquivo.txt
  $a = file("arquivo.txt");

  // Concatena os valores passados pelo formulário colocando uma "|" pipeline
  // entre cada campo e atribui ao vetor na posição $_POST['status']
  $a[$_POST['status']] = $_POST['nome'] . '|' . $_POST['email'] . '|' .$_POST['telefone'] . "|\n";

  // Concatena todos os valores do vetor
  $b = implode("", $a);

  // Abre arquivo.txt em mode de leitura com sobreposição
  $c = fopen("arquivo.txt", "w");
  // Escreve o valor no arquivo
  fwrite($c, $b);
  // Fecha o arquivo
  fclose($c);

  // Redireciona para página listar com status ok
  header("location: ?page=listar&status=ok");
} else {
  // Redireciona para página listar com status fail
  header("location: ?page=listar&status=fail");
}