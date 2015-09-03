<?php
// Verifica se há alguns valor id na URL
if (!empty($_GET['id']) || $_GET['id'] == '0'){
  // Cria um array com as linhas do arquivo.txt
  $a = file("arquivo.txt");

  // Percorre o vetor $a
  foreach ($a as $k => $v) {
    // Se encontrar o valor do id
    if ($_GET['id'] == $k) {
      // Criar um vetor com os campos
      $b = explode("|", $a[$k]);
      // Para o enalce
      break;
    }
  }
}
?>
<div>
  <h3>Cadastro de Contatos</h3>
  <!-- FORMULÁRIO DE EDIÇÃO DE CONTATO -->
  <form action="?page=editado" method="POST">
    <label>
      <span>Nome:</span>
      <input type="text" name="nome" value="<?php echo $b[0];?>" required placeholder="Digite o nome completo">
    </label>
    <label>
      <span>E-mail:</span>
      <input type="email" name="email" value="<?php echo $b[1];?>" required placeholder="fulano@servidor.com">
    </label>
    <label>
      <span>Telefone:</span>
      <input type="text" name="telefone" value="<?php echo $b[2];?>"  required placeholder="(99) 99999-9999">
    </label>
    <input type="hidden" name="status" value="<?php echo $k;?>">    
    <label class="button">
      <button type="submit">Salvar</button>
    </label>
  </form>
  <?php
  // Se variável $_GET['status'] não estiver vazia
  if (!empty($_GET['status']))
    // Se $_GET['status'] for igual 'ok'
    if ($_GET['status'] == 'ok')
      // Imprime mensagem de sucesso
      echo "<h4 class=", $_GET['status'],">Registro cadastrado com sucesso!</h4>";
    // Caso contrário
    else
      // Imprime mensagem de erro
      echo "<h4 class=", $_GET['status'],">Erro ao cadastrar!</h4>";    
  ?>
</div>