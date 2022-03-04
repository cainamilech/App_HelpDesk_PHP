<?php

session_start();

session_destroy(); //destroi a sessao
header('Location: index.php'); //redireciona pro index pedindo novamente os dados para entrar na sessao

?>