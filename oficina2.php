<?php

session_start();
include_once("conexao.php");


$cliente = filter_input(INPUT_POST, 'cliente', FILTER_SANITIZE_STRING);
$data = filter_input(INPUT_POST, 'datas', FILTER_SANITIZE_STRING);
$vendedor = filter_input(INPUT_POST, 'vendedor', FILTER_SANITIZE_STRING);
$descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
$valor = filter_input(INPUT_POST, 'valor', FILTER_SANITIZE_STRING);




$result_cadastro = "INSERT INTO cadastro (cliente, datas, vendedor, descricao, valor) VALUES ('$cliente', NOW(),'$vendedor','$descricao','$valor')";
$resultado_cadastro = mysqli_query($conn, $result_cadastro);

if(mysqli_insert_id($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Usuário cadastrado com sucesso</p>";
	//header("Location: index.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Usuário não foi cadastrado com sucesso</p>";
	//header("Location: index.php"); 

	
}
