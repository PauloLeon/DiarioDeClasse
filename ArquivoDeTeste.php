<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Arquivo de Teste</title>
<!--css BOOTSTRAP-->
<link href="css/bootstrap.min.css" rel="stylesheet">
<!--Scripts Necessarios-->
<script src="js/jquery-1.11.0.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<?php
	echo file_get_contents(dirname(__FILE__)."/Scripts/TesteScript.php", true);
?>

</head>
<style>
	.scrollable-menu {
		height: auto;
		max-height: 250px;
		overflow-x: hidden;
	}
	  .bs-callout {
		background-color: white;
		padding: 10px;
		margin: 10px 0;
		border: 1px solid #eee;
		border-left-width: 5px;
		border-radius: 3px;
	  }
	  
	  .bs-callout h4 {
		margin-top: 0;
		margin-bottom: 5px;
	  }
	  
	  .bs-callout p:last-child {
		margin-bottom: 0;
	  }
	  
	  .bs-callout code {
		border-radius: 3px;
	  }
	  
	  .bs-callout+.bs-callout {
		margin-top: -5px;
	  }
	  
	  .bs-callout-default {
		border-left-color: #777;
	  }
	  
	  .bs-callout-default h4 {
		color: #777;
	  }
	  
	  .bs-callout-primary {
		border-left-color: #428bca;
	  }
	  
	  .bs-callout-primary h4 {
		color: #428bca;
	  }
	  
	  .bs-callout-success {
		border-left-color: #5cb85c;
	  }
	  
	  .bs-callout-success h4 {
		color: #5cb85c;
	  }
	  
	  .bs-callout-danger {
		border-left-color: #d9534f;
	  }
	  
	  .bs-callout-danger h4 {
		color: #d9534f;
	  }
	  
	  .bs-callout-warning {
		border-left-color: #f0ad4e;
	  }
	  
	  .bs-callout-warning h4 {
		color: #f0ad4e;
	  }
	  
	  .bs-callout-info {
		border-left-color: #5bc0de;
	  }
	  
	  .bs-callout-info h4 {
		color: #5bc0de;
	  }
	  
	  .btn-custom {
		  color: #333;
		  background-color: #fff;
		  /* border-color: #ccc; */
		  WIDTH: 100%;
		  TEXT-ALIGN: LEFT;
	}

	</style>

<body id="BEGIN">
<div class="input-group"style="margin-bottom: 10px;">
     		 <div class="input-group-btn">
       		 <button type="button" class="btn btn-primary dropdown-toggle"  data-toggle="dropdown" aria-expanded="false" >Instituições<span class="caret"></span></button>
        <ul id="listEscolasEDIT" class="dropdown-menu" role="menu">
        </ul>
      </div><!-- /btn-group -->
      <input type="text"  placeholder="Selecione as opções ao lado" class="form-control" name="inputEscolasEdit" id="inputEscolasEdit" value="" >
    </div><!-- /input-group -->
    
<div class="thumbnail" id="#borevere"></div>    

</body>
</html>
