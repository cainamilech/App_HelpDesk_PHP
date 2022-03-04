<?php 

	session_start();

	//variavel que verifica se a autenticação foi realizada, caso haja o processo de autenticação na session, ela vira true
	$usuario_autenticado = false;
	$usuario_id = null;
	$usuario_perfil_id = null;


	//criar uma logica para dizer se o perfil é adm ou usuario
	$perfis = array(1 => 'administrativo', 2 => 'usuario');

	//usarios do sistema
	$usuarios_app = array(
		array('id' => 1, 'email' => 'adm@teste.com.br', 'senha' => '123456', 'perfil_id' => 1),
		array('id' => 2, 'email' => 'user@teste.com.br', 'senha' => '123456', 'perfil_id' => 1),
		array('id' => 3, 'email' => 'joao@teste.com.br', 'senha' => '123456', 'perfil_id' => 2),
		array('id' => 4, 'email' => 'maria@teste.com.br', 'senha' => '123456', 'perfil_id' => 2),
	);

	//foreach percorre cada elemento da variavel usuarios_app e nos da acesso a cada um dos valores

	//se o email e senha recuperado por _POST forem iguais a um email e senha de algum usuario do sistema
	//a variavel usuario_autenticado vira true

	foreach ($usuarios_app as $user) {
		if($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']){
			$usuario_autenticado = true;
			$usuario_id = $user['id']; //atribuir o valor contido em id
			$usuario_perfil_id = $user['perfil_id']; //atribuir o valor contido em perfil id
		}
	}

	if($usuario_autenticado){
		echo 'Usuário autenticado';
		$_SESSION['autenticado'] = 'SIM'; //essa variavel autoriza as paginas serem mostradas, pelo session_start
		$_SESSION['id'] = $usuario_id;
		$_SESSION['perfil_id'] = $usuario_perfil_id;
		header('Location: home.php'); //header força um redirecionamento para outra pagina
	} else { 
		$_SESSION['autenticado'] = 'NAO'; //mas se ela for não, cada pagina tem uma codificação para nao mostrar a sessao e redirecionar pra erro2
		header('Location: index.php?login=erro'); //header força um redirecionamento para o index e ?login=erro encaminha um parametro via get chamando um html no index
	}

	/*
	print_r($_POST);

	echo $_POST['email'];
	echo $_POST['senha'];
	*/
 ?>