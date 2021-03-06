<?php
	error_reporting(0);
	$varEmail = $_POST['inputEmail'];
	$varSenha = $_POST['inputPassword'];
	$varNome="";
	$varEmailCadastrar="";
    $varSenhaCadastrar="";
?>
<html>

  <head>
    <meta charset="utf-8">
    <title>Diario de Classe</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Bootstrap Core CSS -->

	<link href="css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="../DiarioDeClasse/js/jquery.min.js"></script>
    <script type="text/javascript" src="../DiarioDeClasse/js/bootstrap.min.js"></script>
  </head>

  <body>
 <!--Integração com o Facebook, testando ainda-->
  <script>
 	 window.fbAsyncInit = function() {
   		 FB.init({
     	 appId      : '907537712625088',
     	 xfbml      : true,
     	 version    : 'v2.3'
   	 });
 	 };

 	 (function(d, s, id){
    	 var js, fjs = d.getElementsByTagName(s)[0];
    	 if (d.getElementById(id)) {return;}
    	 js = d.createElement(s); js.id = id;
		 js.src = "//connect.facebook.net/en_US/sdk.js";
		 fjs.parentNode.insertBefore(js, fjs);
  	 }(document, 'script', 'facebook-jssdk'));
 </script>


      <div class="navbar navbar-default navbar-static-top navbar-inverse">
        <style>
          .body{padding-top:70px}
        </style>
        <div class="container">
          <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span> </button>
            <a class="navbar-brand" href="index1.php">Diario de Classe</a>
          </div>
          <div class="collapse navbar-collapse navbar-ex1-collapse"></div>
        </div>
      </div>

<!--    <img src="../DiarioDeClasse/http://placehold.it/600x100" class="img-responsive" style="width: 100%; height: 650;">  -->
      <div>
      <p></p>
      <p></p>
    </div>
    <div>
      <div class="container">
        <div class="row">
          <div class="col-md-12" draggable="true">
            <div class="panel panel-default">
              <div class="panel-heading">
                <div class="col-sm-7">
                  <h3 class="panel-title">Entrar</h3>
                </div>
                <div class="col-sm">
                  <h3 class="hidden-xs panel-title">Não Possui Cadastro?</h3>
                </div>
              </div>
              <div class="panel-body">
                <form class="form-horizontal" role="form" action="action_login.php" method="post">
                  <div class="form-group">
                    <div class="col-sm-2">
                      <label for="inputEmail3" class="control-label">Email:</label>
                    </div>
                    <div class="col-sm-4">
                      <input type="email" class="form-control" name="inputEmail" placeholder="Email"
                      value="<?=$varEmail;?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-2">
                      <label for="inputPassword3" class="control-label">Senha:</label>
                    </div>
                    <div class="col-sm-4">
                      <input type="password" class="form-control" name="inputPassword" placeholder="Senha"
                      value="<?=$varSenha;?>">
                    </div>
                    <div class="col-sm-4 hidden-xs text-center">
                      <a class="btn btn-danger" data-toggle="modal" data-target="#myModal">Cadastre-se Agora!</a>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox">Matenha-me conectado</label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-success" name="formSubmit" value="Submit">Entrar</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel" draggable="true">Cadastro</h4>
          </div>
          <div class="modal-body">
            <form class="form-horizontal" role="form" draggable="true" action="action/action.php"
            method="post">
              <div class="form-group">
                <div class="col-sm-2">
                  <label for="inputNome" class="control-label">Nome</label>
                </div>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="inputNome" placeholder="Instituição/Professor"
                  value="<?=$varNome;?>">
                </div>
              </div>
              <div class="form-group" draggable="true">
                <div class="col-sm-2">
                  <label for="inputEmail" class="control-label">Email</label>
                </div>
                <div class="col-sm-10">
                  <input type="email" class="form-control" name="inputEmail" placeholder="Email"
                  value="<?=$varEmailCadastrar;?>">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-2">
                  <label for="inputSenha" class="control-label">Senha</label>
                </div>
                <div class="col-sm-10">
                  <input type="password" class="form-control" name="inputSenha" placeholder="Senha"
                  value="<?=$varSenhaCadastrar;?>">
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
            <button type="submit" class="btn btn-primary" name="formSubmit"
            value="Submit">Começar</button>
          </div>
          </form>
        </div>
      </div>
    </div>
  </body>

</html>
