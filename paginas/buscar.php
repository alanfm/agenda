<div class="col-full">
  <!-- FORMULÁRIO DE BUSCA -->
  <form action="?page=buscar" method="POST">
    <label>
      <span>Nome:</span>
      <input type="text" name="nome">
      <input type="hidden" name="status" value="ok">
    </label>
    <label class="button">
      <button type="submit">Buscar</button>
    </label>
  </form>
  <!-- TABELA COM OS RESULTADOS DA BUSCA -->
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
      // Verifica se enviado alguma coisa pelo formulário
      if (!empty($_POST['status']) && !empty($_POST['nome'])){
        // Cria um array com as linhas do arquivo.txt
        $a = file('arquivo.txt');

        // Percorre o vetor $a
        foreach ($a as $k => $v){
          // Separa os dados das linhas do arquivo
          $b = explode("|", $v);

          // Verifica se existe o valor digitado no campo nome do arquivo.txt
          if (strpos($b[0], $_POST['nome']) !== false){
            // Imprime as linhas que contenham o valor buscado
            echo "
              <tr>
                <td>",$k,"</td>
                <td>",$b[0],"</td>
                <td>",$b[1],"</td>
                <td>",$b[2],"</td>            
              </tr>";
          }
        }
      }
      ?>
    </tbody>
  </table>
</div>