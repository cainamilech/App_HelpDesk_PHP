<?php 

  session_start();

  //se o autenticado nao exitir ou for diferente de sim
  //força o redirecionamento
  //lembrando que o ! é pra mudar de true pra false
  if(!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] !='SIM'){
    header('Location: index.php?login=erro2');
  }
  

 ?>