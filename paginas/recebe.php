<?php
// Inicia uma variável vazia
$str = "";
// Inicia status como false
$status = FALSE;

// Verificar se $_POST['status'] não está vazia
if (!empty($_POST['status'])){
  // Percorre o vetor $_POST
  foreach ($_POST as $k => $v) {
    // Se a chave for diferente de 'status'
    if ($k != 'status'){
      // Atribui (concatena) a $str junto com uma pipeline "|" no final
      $str .= $v . '|';
    }
  }

  // Abre o arquivo.txt
  $a = fopen('arquivo.txt', 'a+');
  
  // Se for escrito em arquivo.txt
  if (fwrite($a, $str . "\n")){
    // Atribui true a $status
    $status = TRUE;
  }
  // Fecha o arquivo
  fclose($a);
}

// Página que vai ser redirecionado
$pagina = "?page=cadastro";
// concatena a variável status de acordo com
// o resultado da operação
$pagina .= $status? '&status=ok': '&status=fail';

// redireciona para a página cadastro
header("location: " . $pagina);