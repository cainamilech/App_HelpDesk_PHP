<?php

	session_start();

	//montagem do texto
	$titulo = str_replace('#', '-', $_POST['titulo']); //como vou usar # para separar e concatenar as strings recuperadas, se algum texto tiver # o str replace troca por -
	$categoria = str_replace('#', '-', $_POST['categoria']);
	$descricao = str_replace('#', '-', $_POST['descricao']);

	$texto = $_SESSION['id'] . '#' . $titulo . '#' . $categoria . '#' . $descricao . PHP_EOL; //EndOfLine (para a cada registro, mudar a linha no arquivo)

	//abre o arquivo
	$arquivo = fopen('../../app_help_desk/arquivo.hd', 'a'); //nativo do php, o "a" tb é nativo, disponibiliza o arquivo para escrita

	 //seleciona o arquivo, e inclui o texto.
	fwrite($arquivo, $texto);

	 //fecha o arquivo
	fclose($arquivo);

	//redirecionar apos o processo
	header('Location: abrir_chamado.php')


	

?>