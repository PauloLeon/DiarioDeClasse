<?php
	include 'php/session.php';
	$varNome = "";
	$jsonDisciplinas = $userLogado->getDisciplinaJSON($userLogado->getId());

	 if (!empty($_GET['formSubmit']))
	 {
		 $varNome =  $_GET['inputNome'];
		 if($varNome){
  			 $userLogado->insertDisciplinaBanco(trim($varNome),$userLogado->getId());
		 }else{
			 echo"<script LANGUAGE=\"JavaScript\">
			 		alert(\"O Nome da Disciplina parece estar Vazio.\");
				</SCRIPT>";
		 }
	 }
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>Diário de Classe</title>
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<!-- Custom CSS -->
<link href="css/sb-admin.css" rel="stylesheet">
<!-- Morris Charts CSS -->
<link href="css/plugins/morris.css" rel="stylesheet">
<!-- Custom Fonts -->
<link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet"
    type="text/css">
</head>

<body>
<div id="wrapper">
  <!-- Navigation -->
  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="index.php"><img src="../DiarioDeClasse/imagem/site/diario-de-classe.png" class="img-responsive"style="width:150px;"></a> </div>
    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav">

      <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php
										echo $userLogado->getNome();?> <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li> <a href="#" style="color: #428bca;"><i class="fa fa-fw fa-user"></i> Perfil</a> </li>
          <li> <a href="#" style="color: #428bca;"><i class="fa fa-fw fa-envelope"></i> Caixa de Mensagens</a> </li>
          <li> <a href="#" style="color: #428bca;"><i class="fa fa-fw fa-gear"></i> Configuração de Conta</a> </li>
          <li class="divider"></li>
          <li> <a href="action_logout.php"style="color: #c94141;"><i class="fa fa-fw fa-power-off"></i> Sair</a> </li>
        </ul>
      </li>
    </ul>
    <!-- Sidebar Menu Items - These collapse to the responsive navigation
        menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
      <ul class=" div_blue nav navbar-nav side-nav">
        <li> <a href="index.php"><i class="fa fa-fw fa-desktop"></i> Dashboard</a> </li>
        <li>
                  <a href="">Cadastros<i class="fa fa-fw fa-caret-down"></i></a>
                </li>
                <li>
                  <a href="Cadastrar.php">Instituição/Escola</a>
                </li>
                <li>
                  <a href="CadastrarDisciplina.php">Disciplina</a>
                </li>
                <li>
                  <a href="CadastroTurma.php">Turma</a>
                </li>
                <li>
                  <a href="CadastrarAluno.php">Aluno</a>
                </li>
      </ul>
    </div>
    <!-- /.navbar-collapse -->
  </nav>

  <div id="" style="min-height: 100vh; width: 100%; background-color: white;">
    <div class="container-fluid">
      <!-- Page Heading -->
      <div class="row">
        <div class="col-lg-12" id="disciplina">
         <h1 class="page-header">Cadastro  <small>de Disciplina</small> </h1>
  <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
					<div class="row hidden-xs ">
						<div class="col-xs-12 col-sm-6 col-md-6">
							<h3 class="panel-title"><div class="form-group">
								<button class="btn btn-success" data-toggle="modal" data-target="#incluirModal" name="incluir" onClick="incluirOnClick()" value="submit_insert"><span class="glyphicon glyphicon-plus"></span> Nova Disciplina</button>
							</div></h3>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6">
							<h3 class="panel-title">
								<div class="input-group pull-right">
									<input class="search pull-right" placeholder="Pesquisar" aria-describedby="basic-addon1" style="height: 30px;"/>
									<span class="input-group-addon " id="basic-addon1">
										<span class="glyphicon glyphicon-search" aria-hidden="true">
										</span>
									</span>
								</div>
							</h3>
						</div>
					</div>

					<h3 class="panel-title visible-sm visible-xs"><div class="form-group visible-xs">
						<button class="btn btn-success" data-toggle="modal" data-target="#incluirModal" name="incluir" onClick="incluirOnClick()" value="submit_insert"><span class="glyphicon glyphicon-plus"></span> Nova Disciplina</button>
					        </div></h3>


							<h3 class="panel-title visible-sm visible-xs"> <div class="form-group visible-xs">
									<div class="input-group">
									<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
									<input class="search" placeholder="Pesquisar" aria-describedby="basic-addon1" style="
					height: 30px;"/>
						</div>
					</div></h3>




           <div class="panel panel-primary" >

              <div class="panel-heading">
                <div class="row">
		<div class="col-xs-6 col-sm-6 col-md-6"><h3 class="panel-title">Disciplinas</h3></div>
        <div class="col-xs-6 col-sm-6 col-md-6"><h3 class="panel-title">Editar</h3></div>
        </div>
              </div>

              <div class="panel-body">
                <ul class="list list-group" style="width: auto;">
                    <?php
                        $jsonDisciplinas = json_decode($jsonDisciplinas);
                        if(empty($jsonDisciplinas))
                        {
                            echo"<li class=\"list-group-item\">"."Você ainda não tem disciplinas cadastradas."."</li>";
                        }
                        foreach($jsonDisciplinas as $val)
                        {

							echo"<li class=\"list-group-item\"  data-toggle=\"modal\" data-target=\"#editModal\">
				  <div class=\"disciplinaSearch row\">
             		 <div class=\"col-xs-6 col-sm-6 col-md-6\">".utf8_decode($val->nome)."</div>
					 <div class=\"col-xs-6 col-sm-6 col-md-6\"><img src='imagens/editGray.png' alt=''></div>
           		 </div>
				</li>";
                        }
                      ?>
                  </ul>
               </div>

          </div>
        </div>
        <div class="col-md-2"></div>
  </div>
        </div>
      </div>
    </div>
  </div>
</div>



<!--MODAL INCLUIR-->
<div class="modal fade" id="incluirModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Incluir Nova Disciplina...</h4>
      </div>
      <div class="modal-body">
           <div class="thumbnail" style=" background-color: ghostwhite;" >
              <form role="form" action="CadastrarDisciplina.php" method="get">
                <div class="form-group">
                  <label class="control-label" for="exampleInputEmail1">Nome da Disciplina &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp; <br>
                  </label>
                  <input class="form-control" id="exampleInputEmail1" placeholder="Entre com o nome da disciplina"
                       type="text" id="inputNome" name="inputNome" value="<?=$varNome;?>">
                </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        <button type="submit" id="cadastrar" class="btn btn-julio" name="formSubmit" value="submit_insert">Cadastrar</button>
      </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->




</body>
</html>
<?php
echo file_get_contents(dirname(__FILE__)."/Scripts/CadastrarDisciplinaScript.php", true);
?>
