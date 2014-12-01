<?php 
require_once('model/conexao.php');


	class User
	{
		private $userEmail;
		private $connDataBase;
		private $userName;
		private $idUser;
		private $link;

		
		function __construct($emailSession,$nomeSession,$idUserSession)
	    {
			 
        	$this->userEmail = $emailSession;
			$this->connDataBase = new conexao();
			$this->link = $this->connDataBase->getLink();
			$this->userName = $nomeSession;
			$this->idUser = $idUserSession;
			
			if($this->link == "")
			{
				debug_to_console("Link já começa vazio". "- ARQUIVO:User.php");
			}
			if($this->connDataBase == "")
			{
				debug_to_console("Conexao já começa vazio tambem". "- ARQUIVO:User.php");
			}

   	    }		
		
		public function getEmail()
		{
			return $this->userEmail;
		}
		public function getId()
		{
			return $this->idUser;
		}
		public function getNome()
		{
			return $this->userName;
		}
		public function getConexao()
		{
			return $this->connDataBase;
		}
		//metodos de debug
		public function isConnect()
		{
			if($this->connDataBase==""){
				return "conexão vazia";
			}else{
				return "conexão ativa";	
			}
		}
		
		public function isLink()
		{
			if($this->link==""){
				return "link vazio";
			}else{
				return "link ativo";	
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
		
		public function insertEscolaBanco($nome,$cidade,$idusuario)
		{
			try{
				debug_to_console("\"".$nome."\"". "- ARQUIVO:User.php");
				debug_to_console($idusuario. "- ARQUIVO:User.php");
				$sql ="INSERT INTO escola(nome,cidade,usuario_idUsuario)VALUES("."\"".$nome."\"".","."\"".$cidade."\"".",".$idusuario.");";
				debug_to_console($sql. "- ARQUIVO:User.php");
				$result=$this->connDataBase->insertBanco($sql,$this->connDataBase);
				if($result==false)
				{
					debug_to_console($sql. "- ARQUIVO:User.php");
				}
				echo '<meta HTTP-EQUIV="Refresh" CONTENT="1; URL=../Cadastrar.php">';
			} catch (Exception $exc) {
       		    die($exc->getTraceAsString());
    		} 
			
		}
		
		//apagar se nao precisar depois
		public function getEscolas($idusuario)
		{
			try{
				$sql ="SELECT nome,cidade FROM escola".
				" WHERE usuario_idUsuario = ".$idusuario.
				" ORDER BY nome ASC;";
				debug_to_console($sql. "- ARQUIVO:User.php");
				$result=$this->connDataBase->query($sql);
				$row = mysql_fetch_array($result);
			}catch(Exception $exc){
				die($exc->getTraceAsString());
			}
		}
		
		public function getEscolasJSON($idusuario)
		{
			try{
				$sql ="SELECT nome,cidade FROM escola".
				" WHERE usuario_idUsuario = ".$idusuario.
				" ORDER BY nome ASC;";
				debug_to_console($sql. "- ARQUIVO:User.php");
				
				$result=$this->connDataBase->queryArrayEscolas($sql);
				debug_to_console(json_encode($result). "- ARQUIVO:User.php");
				$json = json_encode($result);
				return $json;
			
			}catch(Exception $exc){
				die($exc->getTraceAsString());
			}
		}
		
		//ainda não feito
		public function getTurmaJSON($idusuario)
		{
			try{
				$sql ="SELECT nome,turno,numero_de_alunos,fk_idEscola FROM turma".
				" WHERE usuario_idUsuario = ".$idusuario.
				" ORDER BY nome ASC;";
				debug_to_console($sql. "- ARQUIVO:User.php");
				
				$result=$this->connDataBase->queryArrayEscolas($sql);
				debug_to_console(json_encode($result). "- ARQUIVO:User.php");
				$json = json_encode($result);
				return $json;
			
			}catch(Exception $exc){
				die($exc->getTraceAsString());
			}
		}
		
		
		
		
		function debug_to_console( $data ) 
		{
   			 if ( is_array( $data ) )
       			 $output = "<script>console.log( 'Debug Objects: " . implode( ',', $data) . "' );</script>";
   			 else
        		$output = "<script>console.log( 'Debug Objects: " . $data . "' );</script>";
   			 echo $output;
		}
		
	} 
	
?>