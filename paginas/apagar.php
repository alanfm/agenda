<?php
// Verifica se foi enviado algum ID pelo URL
if (!empty($_GET['id']) || $_GET['id'] === '0') {

  // Cria um array com as linhas do arquivo.txt
  $a = file('arquivo.txt');

  // Atribui FALSE a $status
  // Variável que mostra se operação deu certo ou não
  $status = FALSE;

  // Percorre o vetor $a
  foreach ($a as $k => $v) {
    // Verifica se existe alguma chave no vetor $a
    // igual ao ID passado na URL
    if ($_GET['id'] == $k) {
      // Caso sim
      // Apaga o valor do vetor na posição $k
      unset($a[$k]);
      // Atribui TRUE a $status
      // Setando que a operação foi realizada com sucesso
      $status = TRUE;
      // Encerra o enlace
      break;
    }
  }

  // Contatena os valores de todas as posições do vetor $a
  $str = implode("", $a);

  // Abre o arquivo.txt em modo de escrita em sobreposição dos dados existentes no arquivo
  $b = fopen("arquivo.txt", "w");
  // Escreve os dados sem o registro apagado
  fwrite($b, $str);
  // Fecha o arquivo
  fclose($b);

  // Página que será redirecionado depois de fazer a operação
  $pagina = "?page=listar";
  // Caso tenha dado certo coloca "status" como "ok"
  // Caso contrario coloca "status" como "fail"
  $pagina .= $status? "&status=ok": "&status=fail";

  // Redireciona para a página listar
  header("location: " . $pagina);
} else {
  // Caso não tenha sido mandado nenhum valor para ID
  // Redireiona para página listar
  header("location: " . $pagina);
}