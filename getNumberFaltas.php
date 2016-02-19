<?php
include 'php/session.php';
$q = intval($_GET['q']);
$idAluno = intval($_GET['idAluno']);
		
echo"<div class=\"form-group\"  style=\"margin: 0px;\">
                  <ul id=\"qtdAulasLimitada\" class=\"pagination\" style=\"margin: 0px;\">"; 
				  
				  for ($i = 1; $i <= $q; $i++) {
					 echo"<li><a style=\"border-radius: 24px; margin: 1px;\" href=\"#\">".$i."</a></li>";
				  }
				  echo" <li ><button idForClick=\"".$idAluno."\" style=\"border-radius: 24px; margin: 1px;\"  >Justificar Falta </button></li> ";
			echo "</ul>
            </div> ";


?>

