<?php 

require_once "validador_acesso.php" //puxa de um arquivo a começo da sessao e a condição, para economizar codigos

 ?>

 <?php

 $chamados = array();

 //abrir o arquivo.hd
 $arquivo = fopen('arquivo.hd', 'r'); //fopen é nativo do php, e cada letra(mode) tem uma função, 'r' é apenas para ler

 //percorrer o arquivo hd enquanto houver registros(linhas) a serem recuperados
 while(!feof($arquivo)){ //testa cada final de linha pra ver se é o fim do arquivo. usei ! pra se der false, trocar pro true, pra entrar no laço de repetição

  //recupera a linha. criando a variavel
  $registro = fgets($arquivo);
  //entao vai dando true até encontrar o false para sair do laço de repetição

  //colocar os registros em um array
  $chamados[] = $registro;
 }

 //fechar o arquivo q foi aberto
 fclose($arquivo);

?>

<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="logoff.php">SAIR</a>
        </li>
      </ul>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>
            
            <div class="card-body">


              <?php 
              //percorre o array e cria uma variavel que vai receber cada um desses elementos do array
              foreach ($chamados as $chamado) {
              ?>

              <?php

              $chamado_dados = explode('#', $chamado); //explode separa as informações que no caso foram separadas anteriormente por #, e coloca em um novo array separadas em indices

              //se o perfil for adm nao tem filtro, se for usuario tem
              if($_SESSION['perfil_id'] == 2){
                //só vamos exibir o chamado se ele for criado pelo usuario
                if ($_SESSION['id'] != $chamado_dados[0]) {
                  continue;
                }
              }

              //sempre que acaba uma linha, o cursor vai automaticamente pra de baixo
              //mas ela nao tem nenhum dado, entao criamos uma condição que pra que o laço desconsidere se nao tiver informações nela
              if (count($chamado_dados) < 3) { //se a quantidade de elementos for menor q 3
                continue;
              }

              ?> 

              <div class="card mb-3 bg-light">
                <div class="card-body">
                  <h5 class="card-title"><?=$chamado_dados[1]?> <!--usando tag de impressao, chama a variavel, escolhendo um respectivo indice do array para ser impressa--> </h5>
                  <h6 class="card-subtitle mb-2 text-muted"><?=$chamado_dados[2]?></h6>
                  <p class="card-text"><?=$chamado_dados[3]?></p>

                </div>
              </div>

              <?php } ?>
              
                    

              <div class="row mt-5">
                <div class="col-6">
                  <a class="btn btn-lg btn-warning btn-block" href="home.php">Voltar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
