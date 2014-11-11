<?php
error_reporting(0);
	  function debug_to_console( $data ) {
	  
		  if ( is_array( $data ) )
			  $output = "<script>console.log( 'Debug Objects: " . implode( ',', $data) . "' );</script>";
		  else
			  $output = "<script>console.log( 'Debug Objects: " . $data . "' );</script>";
	  
		  echo $output;
	  }
	
 	 $varNome="";
	 $varEmail= $_POST['inputEmail2'];
	 $varSenha="";
	 
	 debug_to_console($_GET['inputEmail2']);
?>
<!DOCTYPE html>
<html>
  
  <head>
    <meta charset="utf-8">
    <title>Diário de Classe</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="js/jquery-min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
  </head>
  
  <body>
    <div class="navbar navbar-default navbar-inverse navbar-static-top">
      <style>
        .body{padding-top:70px}
      </style>
      <div class="container">
        <div class="navbar-header">
          <a type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"></a>
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <a class="navbar-brand" href="index.php">Diário de Classe</a>
        </div>
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li>
              <p></p>
              <form action="login.php">
                <button type="submit" class="btn btn-primary">Entrar</button>
              </form>
            </li>
            <li class="active">
              <a href="index.php">Início</a>
            </li>
            <li>
              <a href="contato.html">Contato</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div id="carousel-example-generic" data-interval="false" class="carousel slide"
    data-ride="carousel">
      <div class="carousel-inner">
        <div class="item active" draggable="true">
          <img src="imagens site diario de classse/tablet.png">
          <div class="carousel-caption">
            <h2>Title</h2>
            <p>Description</p>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
      <a class="right carousel-control" href="#carousel-example-generic" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div>
    
	<script>
		function teste() {
			var s = $("#inputEmail2").val();
			$("#inputEmail").val(s);	
		}
	</script>
    
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <form class="form-horizontal" role="form" >
            <div class="form-group" draggable="true">
              <div class="col-sm-6">
                <input type="email" class="form-control" id="inputEmail2" placeholder="Email" name="inputEmail2"  value=""  >
              </div>
              <div class="col-sm-3">
                <a  class="btn btn-primary" data-toggle="modal" data-target="#myModal" onclick="teste()"  >Abrir Uma Conta</a>
              </div>
            </div>
          </form>
          <p>
 			 <?php
		    	if(!empty($errorMessage)) 
		    	{
			    	echo("<p>\nExiste um erro no seu formulario de cadastro:</p>\n");
			    	echo("<ul>" . $errorMessage . "</ul>\n");
            	}
        	?> 
		</p>
        </div>
        <div class="row">
          <div class="col-md-6">
            <img src="http://placehold.it/1024x600" class="img-responsive">
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">
              <span aria-hidden="true">×</span>
              <span class="sr-only">Close</span>
            </button>
            <h4 class="modal-title" id="myModalLabel" draggable="true">Cadastro</h4>
          </div>
          <div class="modal-body">
            <form class="form-horizontal" role="form" draggable="true"
            action="action.php" method="post">
              <div class="form-group">
                <div class="col-sm-2">
                  <label for="inputNome" class="control-label">Nome</label>
                </div>
                <div class="col-sm-10">
                  <input type="text" 
                  	class="form-control" 
                   	name="inputNome"
                    placeholder="Instituição/Professor" 
                    value="<?=$varNome;?>"
                     />
                </div>
              </div>
              <div class="form-group" draggable="true">
                <div class="col-sm-2">
                  <label for="inputEmail" class="control-label">Email</label>
                </div>
                <div class="col-sm-10">
                  <input type="email"  
                 	class="form-control" 
                    id="inputEmail"
                  	name="inputEmail"
                  	value="<?=$varEmail;?>" />
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-2">
                  <label for="inputSenha" class="control-label">Senha</label>
                </div>
                <div class="col-sm-10">
                  <input type="password" 
                   class="form-control" 
                    name="inputSenha" 
                    placeholder="Senha"
                    value="<?=$varSenha;?>" />
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox">Concordo com os
                      <a href="#">Termos do Díario de Classe</a>.</label>
                  </div>
                </div>
              </div>
          </div>
          <div class="modal-footer">
           <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
           <button type="submit" class="btn btn-primary" name="formSubmit" value="Submit" >Começar</button> 
          </div>
          </form>
        </div>
      </div>
    </div>
    <div style="background-color:#f5f5f5;" class="footer">
      <div class="container">
        <p class="text-muted">Rodapé</p>
      </div>
    </div>
  </body>
</html>