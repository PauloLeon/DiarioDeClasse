<?php
require_once('model/conexao.php');
$oConexao = new conexao();

class Usuario {

  // singleton instance
  private static $instance;
  private $nome_usuario;
  private $email_usuario;
  
  // private constructor function
  // to prevent external instantiation
  private function __construct($varEmail , $varSenha) 
  { 
  		try{
			$sql = "select email, nome from Usuario where email like ".PrepSQL($varEmail)." and senha like ".PrepSQL($varSenha).";";
		} catch (Exception $exc) {
       		     die($exc->getTraceAsString());
    	}
  }

  // getInstance method
  public static function getInstance() 
  {
	  
    if(!self::$instance) 
	{
      self::$instance = new self();
    }

    return self::$instance;

  }

  

}
?>