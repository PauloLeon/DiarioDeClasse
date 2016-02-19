<?php

/*		
echo"<div class=\"bs-callout bs-callout-default\"  id=\"Sera\">
				<a href=\"#\"><i class=\"fa fa-2x fa-check fa-fw text-muted\"></i></a>Só imaginação
	</div>";

echo"<script > $(\"#BEGIN button[id|='Sera'\").click(function() {
					console.log(\"booooooora funcionaaaaa dois\");
				    //document.getElementById(\"Sera\").attr('class', 'bs-callout bs-callout-primary'); 
		       });</script>";*/
			   	
echo"<button class=\"btn-primary\"  id=\"Sera\">
				<a href=\"#\"><i class=\"fa fa-2x fa-check fa-fw text-muted\"></i></a>Só imaginação
	</button>";

echo file_get_contents(dirname(__FILE__)."/Scripts/TesteScript.php", true)

?> 

