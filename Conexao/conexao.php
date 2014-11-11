<?php
class conexao2 {


   //***Comentario: Paulo Rosa*** Conexao antiga
   // var $user = "root";
   //  var $passwd = "prodepa";
   // var $host = "10.1.1.237";
   // var $database = "cidadesdigitais";
   
   
   //***Comentario: Paulo Rosa*** Atualizado o Servidor 30/12/2013
    var $user = "root";
    var $passwd = "";
    var $host = "localhost";
    var $database = "diariodeclasse";
    var $query;
    var $link;
    var $result;

    function __construct() {
        $this->Conectar();
    }
function Conectar() {
        try {
            $this->link = mysql_connect($this->host, $this->user, $this->passwd);
            mysql_select_db($this->database, $this->link);
        } catch (Exception $exc) {
            die($exc->getTraceAsString());
        }
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
}
?>
        