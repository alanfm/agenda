<div>
  <!-- FORMULÁRIO DE CADASTRO DE CONTATOS -->
  <h3>Cadastro de Contatos</h3>
  <form action="?page=recebe" method="POST">
    <label>
      <span>Nome:</span>
      <input type="text" name="nome" required placeholder="Digite o nome completo">
    </label>
    <label>
      <span>E-mail:</span>
      <input type="email" name="email" required placeholder="fulano@servidor.com">
    </label>
    <label>
      <span>Telefone:</span>
      <input type="text" name="telefone" required placeholder="(99) 99999-9999">
    </label>
    <input type="hidden" name="status" value="ok">    
    <label class="button">
      <button type="submit">Cadastrar</button>
    </label>
  </form>
  <?php
  // Verifica se há algum valor 'status' na URL
  if (!empty($_GET['status'])):
    // Verifica se o valor passado foi 'ok'
    if ($_GET['status'] == 'ok'):
      // Impremi a mensagem que tudo ocorreu com sucesso
      echo "<h4 class=", $_GET['status'],">Registro cadastrado com sucesso!</h4>";
    elseif($_GET['status'] == 'fail'):
      // Verifica se foi passado o valor passado foi 'fail'
      echo "<h4 class=", $_GET['status'],">Erro ao cadastrar!</h4>";
    endif;
  endif;
  ?>
</div>