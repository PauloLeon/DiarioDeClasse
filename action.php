<?php
//arquivo de usuario
require_once('objetos/User.php');
require_once('model/conexao.php');
$oConexao = new conexao();

session_start();
if($_POST['formSubmit'] == "Submit") 
{

	// Esse codigo força o usuario a entrar com os campos requiridos
		$errorMessage = "";

		if(empty($_POST['inputNome'])) 
        {
			$errorMessage .= "<li>Por favor digite seu nome ou da instituição.</li>";
		}
		
		if(empty($_POST['inputEmail'])) 
        {
			$errorMessage .= "<li>Você precisa de um email.</li>";
		}


		if(empty($_POST['inputSenha'])) 
        {
			$errorMessage .= "<li>Defina sua senha.</li>";
		}
		
		
 	 $varNome = $_POST['inputNome'];
	 $varEmail = $_POST['inputEmail'];
	 $varSenha = $_POST['inputSenha'];
	 
	  
	 	if(empty($errorMessage)) 
        {
			try{
				//inserindo usuario no banco
				$sql = "insert into usuario (idUsuario, nome, email, senha, tipo_conta) values (DEFAULT,"
				.PrepSQL($varNome).", "
				.PrepSQL($varEmail).", "
				.PrepSQL($varSenha).", 'free');";
				$result = $oConexao->insertUsuarioBanco($sql);

				//retornando todos os usuarios
				$sqlBusca = "select * from Usuario;";
				$array = $oConexao->findInDatabase($sqlBusca);
				print_r(array_values($array)); 
				for ($i = 0; $i <= sizeof($array); $i++) 
				{
					echo $array[0];	
					$nome = array_column($a, 'nome');
				}
				//se tudo der certo
				if($result)
				{
					echo "Conta Efetuada com Sucesso!,\nEstamos lhe redirecionando em 5 segundos...";
					//retorno do nome e do id do usuario para guardar na sessao
					$sql = "select nome, idUsuario from usuario where email like ".PrepSQL($varEmail)." and senha like ".PrepSQL($varSenha).";";
					$result = $oConexao->query($sql);
					$row = mysql_fetch_array($result);
					 $_SESSION['userLogado'] =  new User($varEmail,$varNome,$row['idUsuario']);
					//mudar o tempo depois!
					echo '<meta HTTP-EQUIV="Refresh" CONTENT="5; URL=../index.php">';			
				}
				
  				} catch (Exception $exc) {
       		     	die($exc->getTraceAsString());
    			}

			exit;
		}

}
 
 //metodo para debug
function debug_to_console( $data ) {

    if ( is_array( $data ) )
        $output = "<script>console.log( 'Debug Objects: " . implode( ',', $data) . "' );</script>";
    else
        $output = "<script>console.log( 'Debug Objects: " . $data . "' );</script>";

    echo $output;
}

//metodo que prepara o sql
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
