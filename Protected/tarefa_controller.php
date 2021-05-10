<?php

	require '../Protected/tarefa.model.php';
	require '../Protected/tarefa.service.php';
	require '../Protected/conexao.php';

	echo '<pre>';
	print_r($_POST);
	echo '</pre>';

	//Cria uma nova tarefa
	$tarefa = new Tarefa();
	$tarefa->__set('tarefa',$_POST['tarefa']);

	$conexao = new Conexao();

	$tarefaService = new TarefaService($conexao,$tarefa);
	$tarefaService->inserir();


	echo '<pre>';
	print_r($tarefaService);
	echo '</pre>';

?>