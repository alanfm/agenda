<div class="col-1">
  <!-- FORMULÁRIO DE CADASTRO DE CONTATOS -->
  <h3>Cadastro de Contatos</h3>
  <form action="recebe.php" method="POST">
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
</div>
<div class="col-2">
  <!-- TABELA COM OS ULTIMOS 10 CONTATOS CADASTRADOS -->
  <h3>Contatos Cadastrados</h3>
  <small>Ultimos 10</small>
  <table>
    <thead>
      <th>
        #id
      </th>
      <th>
        Nome
      </th>
      <th>
        E-mail
      </th>
      <th>
        Telefone
      </th>
    </thead>
    <tbody>
      <?php
      // Cria um array com as linhas do arquivo.txt
      $a = file('arquivo.txt');

      // Conta quantas linhas existe no arquivo pelo
      // número de posições no array
      $i = count($a);

      // Verifica se exite mais de 10 posições no array
      if ($i - 10 > 0){
        $j = $i - 10;
      } else {
        // Caso não haja 10 posições no arquivo
        // seta $j como a primeira posição
        $j = 0;
      }

      // Percorre o vetor $a da ultima posição
      // até a posição $j
      for (; $i > $j; $i--){
        // Separa os dados da linha pelo caractere "|"
        $b = explode("|", $a[$i - 1]);
        // Imprime a linha ta tabela com os dados cadastrados
        echo "
          <tr>
            <td>",$i - 1,"</td>
            <td>",$b[0],"</td>
            <td>",$b[1],"</td>
            <td>",$b[2],"</td>            
          </tr>";
      }
      ?>
    </tbody>
  </table>
  <a href="?page=listar">Ver todos</a>
</div>