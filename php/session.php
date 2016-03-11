<?php
header('Content-Type: text/html; charset=UTF-8');
	function debug_to_console( $data )
	{
		if ( is_array( $data ) )
			$output = "<script>console.log( 'Debug Objects: " . implode( ',', $data) . "' );</script>";
		else
			$output = "<script>console.log( 'Debug Objects: " . $data . "' );</script>";

		echo $output;
	}

	require_once('php/User.php');
	session_start();

	if((!isset ($_SESSION['userLogado']) == true))
	{
		debug_to_console("deslogou do sistema - ARQUIVO:CadastrarAluno.php");
		unset($_SESSION['userLogado']);
		echo '<meta HTTP-EQUIV="Refresh" CONTENT="0; URL=../DiarioDeClasse/index1.php">';
		debug_to_console("foi redirecionado - ARQUIVO:CadastrarAluno.php");
	}

	$userLogado = $_SESSION['userLogado'];


?>
