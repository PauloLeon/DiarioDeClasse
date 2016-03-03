<?php
session_start();
function debug_to_console( $data )
{
    if ( is_array( $data ) )
        $output = "<script>console.log( 'Debug Objects: " . implode( ',', $data) . "' );</script>";
    else
        $output = "<script>console.log( 'Debug Objects: " . $data . "' );</script>";

  //  echo $output;
}


error_reporting(0);
//arquivo de usuario
require_once('php/User.php');
require_once('model/conexao.php');
$oConexao = new conexao();

if($_POST['formSubmit'] == "Submit")
{

	// Esse codigo força o usuario a entrar com os campos requiridos
		$errorMessage = "";

		if(empty($_POST['inputEmail']))
		{
			$errorMessage .= "<li>Você precisa de um email.</li>";
		}



		if(empty($_POST['inputPassword']))
		{
			$errorMessage .= "<li>Defina sua senha.</li>";
		}


	   $varEmail = $_POST['inputEmail'];
	   $varSenha = $_POST['inputPassword'];

	  //se o usuario entrar com os dados corretamente
		if(empty($errorMessage))
		{
			try{
				$sql = "select email, senha from usuario where email like ".PrepSQL($varEmail)." and senha like ".PrepSQL($varSenha).";";
				$result = $oConexao->queryRows($sql);
				//se o resultado retornar um desses parametros o login nao existe.
				if($result==false || $result>1){
					echo "ERRO DE LOGIN OU SENHA";
					//destruindo sessao;
					$_SESSION = array();
					if (isset($_COOKIE[session_name()])) {
					  setcookie(session_name(), '', time()-42000, '/');
					}
					session_destroy();
				}else{
					//retorno do nome e do id do usuario para guardar na sessao
					$sql = "select nome, idUsuario from usuario where email like ".PrepSQL($varEmail)." and senha like ".PrepSQL($varSenha).";";
					$result = $oConexao->query($sql);
					$row = mysql_fetch_array($result);
					//criando variavel de sessao
					$_SESSION['userLogado'] = new User($varEmail,$row['nome'],$row['idUsuario']);
					debug_to_console($varEmail . " ARQUIVO:actionLogin");
					//debug_to_console($oConexao);
					debug_to_console($row['nome']. " ARQUIVO:actionLogin");
					debug_to_console($row['idUsuario'] . " ARQUIVO:actionLogin");
					debug_to_console($_SESSION['userLogado']->isConnect() . " ARQUIVO:actionLogin");
					if($_SESSION['userLogado']=="")debug_to_console("Sessao não iniciada direito -
					ARQUIVO:actionLogin");
					//echo "Login Efetuado com Sucesso!,\nEstamos lhe redirecionando em 5 segundos...";
					//para redirecionar com um tempo de 5segundos de delay
					echo '<meta HTTP-EQUIV="Refresh" CONTENT="0; URL=../DiarioDeClasse/index.php">';

				}
		   } catch (Exception $exc) {
				 die($exc->getTraceAsString());
			}


			exit;
		}

}


// funcao para preparar o sql
function PrepSQL($value)
{
   //tirando os "/"
   if(get_magic_quotes_gpc())
   {
	 $value = stripslashes($value);
   }

   //tirando as aspas
	$value = "'" . mysql_real_escape_string($value) . "'";
	return($value);
}



?>
