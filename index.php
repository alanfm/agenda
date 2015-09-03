<?php
// Inclui os arquivo do cabeçalho e menu
include 'html/head.html';
include 'html/menu.html';

// Pega a página passada por URL
// ou atribui home como padrão
$page = empty($_GET['page'])? 'home': $_GET['page'];

// Verifica se o arquivo da página existe
if (file_exists('paginas/'.$page . '.php')) {
  // Inclui a pagina passada por url
  include_once 'paginas/' . $page . ".php";
// Caso contrário
} else {
  // Avisa que a página não existe
  echo "A página \"$page\" foi não encontrada!";
}

// Inclue o arquivo do rodapé
include 'html/footer.html';