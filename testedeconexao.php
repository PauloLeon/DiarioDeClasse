<?php

 //error_reporting(0);
  
	 //***Comentario: Paulo Rosa*** Conexao antiga da epoca do link cidadao
	 // var $user = "root";
	 //  var $passwd = "prodepa";
	 // var $host = "10.1.1.237";
	 // var $database = "cidadesdigitais";
	 
	 
	 //***Comentario: Paulo Rosa*** Atualizado para o diario de classe
	   $user = "root";
	   $passwd = "";
	  //var $host = "localhost:8889"; localhost para o mac os
	   $host = "localhost";
	   $database = "diariodeclasse";
	  $query;
	   $link;
	   $result;
	  
		 $link = mysql_connect($host, $user, $passwd,true);
		 mysql_select_db($database, $link);
			   if (!$link) {
				   echo "Não foi possível conectar ao banco MySQL."; 
			   }else {
				  echo "Parabéns!! A conexão ao banco de dados ocorreu normalmente!.";
			   }
		 
  
	  
	  

 	
?>