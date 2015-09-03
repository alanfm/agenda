<div class="col-full">
  <h3>Contatos Cadastrados</h3>
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
      <th>
        Opções
      </th>
    </thead>
    <tbody>
      <?php
      // Abri o arquivo transformando as linhas
      // em valores de um vetor
      $a = file('arquivo.txt');

      // Percorre o vetor $a
      foreach($a as $k => $v){
        // Tranforma os valores $v
        // separados pela pipeline em um novo vetor
        $b = explode("|", $v);

        // Imprime as linhas da coluna
        echo "
          <tr>
            <td>",$k,"</td>
            <td>",$b[0],"</td>
            <td>",$b[1],"</td>
            <td>",$b[2],"</td>
            <td><a href=\"?page=editar&id=",$k,"\" class=\"editar\">Editar</a> <a href=\"?page=apagar&id=",$k,"\" class=\"apagar\">Apagar</a></td>
          </tr>";
      }
      ?>
    </tbody>
  </table>
  <?php
  // Se variável $_GET['status'] não estiver vazia  
  if (!empty($_GET['status']))
    // Se $_GET['status'] for igual 'ok'
    if ($_GET['status'] == 'ok')
      // Imprime mensagem de sucesso
      echo "<h4 class=", $_GET['status'],">Operação realizada com sucesso!</h4>";
    // Caso contrário
    else
      // Imprime mensagem de erro
      echo "<h4 class=", $_GET['status'],">Erro ao executar a operação!</h4>";    
  ?>
</div>