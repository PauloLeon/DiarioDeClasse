<?php
error_reporting(0);
# Informa qual o conjunto de caracteres será usado.
header('Content-Type: text/html; charset=utf-8');

class conexao {

  //***Comentario: Paulo Rosa*** Atualizado para o diario de classe
   var $user = "root";
   //var  $passwd = "";
   //PARA FUNCIONAR NO MACOSX
   var $passwd = "root";
   var $host = "localhost:8889";
   //var $host = "localhost";
   var $database = "diariodeclasse";
   var $query;
   var $link;
   var $result;

    function __construct() {
        $this->Conectar();
    }

    function Conectar() {
        try {
            $this->link = mysql_pconnect($this->host, $this->user, $this->passwd);
            mysql_select_db($this->database, $this->link);
			 if (!link) {echo "Não foi possível conectar ao banco MySQL."; exit;}
			else {
				//echo "Parabéns!! A conexão ao banco de dados ocorreu normalmente!.";
			}
        } catch (Exception $exc) {
            die($exc->getTraceAsString());
        }
    }

	function getLink()
	{
		$link = mysql_pconnect($this->host, $this->user, $this->passwd);
        mysql_select_db($this->database, $link);
		return $link;
	}

    function  Desconectar() {
        return mysql_close($this->link);
    }

    function query($sql) {
        $this->query = $sql;
        try {
    $this->result = mysql_query($this->query, $this->link);
            return $this->result;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    function queryArray($sql){
        	 try {
            $this->query = $sql;
            $this->result = mysql_query($this->query, $this->link);
            $aResult = array();
            while ($row = mysql_fetch_assoc($this->result)) {
                $aResult[] = $row;
            }

           return $aResult;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    function queryRows($sql){
        $this->query = $sql;
        $this->result = mysql_query($this->query, $this->link);
         return mysql_num_rows($this->result);
    }


	function insertUsuarioBanco($sql)
	{
	    $this->query = $sql;
        $this->result = mysql_query($this->query, $this->link);
		if(mysql_num_rows($this->result)){
			return false;
		}
		return true;
	}

	function insertBanco($sql, $conexao)
	{
		try {
		  $query = $sql;
		  $this->link =  mysql_pconnect($this->host, $this->user, $this->passwd);
		  $flag = mysql_select_db($this->database, $this->link);
		  $result = mysql_query($query, $this->link);

		  if(mysql_affected_rows()== -1){
			  debug_to_console("nao deu certo ".mysql_error(). "- ARQUIVO:conexao.php");
			  return false;
		  }
		} catch (Exception $exc) {
            debug_to_console($exc->getTraceAsString()."POOOOOORrra");
        }
		return true;
	}

	function queryArrayEscolas($sql){
        	 try {
             mysql_query("SET NAMES 'utf8'");
             mysql_query('SET character_set_connection=utf8');
             mysql_query('SET character_set_client=utf8');
             mysql_query('SET character_set_results=utf8');
				$this->link =  mysql_pconnect($this->host, $this->user, $this->passwd);
		  		$flag = mysql_select_db($this->database, $this->link);
				$this->query = $sql;
				$this->result = mysql_query($this->query, $this->link);
				$aResult = array();
				while ($row = mysql_fetch_assoc($this->result)) {
					$aResult[] = $row;
				}
			   return $aResult;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

	function findInDatabase($sql)
	{
		 try {
            $this->query = $sql;
            $this->result = mysql_query($this->query, $this->link);
            $aResult = array();
            while ($row = mysql_fetch_assoc($this->result)) {
                $aResult[] = $row;
            }

           return $aResult;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
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
