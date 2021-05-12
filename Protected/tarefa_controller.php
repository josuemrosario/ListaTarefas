<?php

	require '../Protected/tarefa.model.php';
	require '../Protected/tarefa.service.php';
	require '../Protected/conexao.php';

	const DEBUG  = 0;

	
	// Apenas para fins de Debug
	if(defined('DEBUG') && DEBUG == 1){
		echo '<pre>';
		print_r($_POST);
		echo '</pre>';
	}

	if(isset($_GET['acao']) && $_GET['acao'] == 'inserir'){
		//Cria uma nova tarefa
		$tarefa = new Tarefa();
		$tarefa->__set('tarefa',$_POST['tarefa']);

		$conexao = new Conexao();

		$tarefaService = new TarefaService($conexao,$tarefa);
		$tarefaService->inserir();

		header('Location: nova_tarefa.php?inclusao=1');
	}

	if(isset($_GET['acao']) && $_GET['acao'] == 'recuperar'){
		
		$tarefa = new Tarefa();
		$conexao = new Conexao();
		$tarefaService = new TarefaService($conexao,$tarefa);
		$tarefas = $tarefaService->recuperar();


	}

	if(isset($_GET['acao']) && $_GET['acao'] == 'atualizar'){
		$tarefa = new Tarefa();
		$tarefa->__set('id',$_POST['id']);
		$tarefa->__set('tarefa',$_POST['tarefa']);

		$conexao = new Conexao();
		$tarefaService = new TarefaService($conexao,$tarefa);
		if($tarefaService->atualizar()){
			header('Location: todas_tarefas.php?acao=recuperar');
		}
	}



?>