<?php
	include 'php/session.php';

	$varNome = "";
	$arrayTurmas = array();

	$jsonTurmas = $userLogado->getTurmaJSON($userLogado->getId());
	$jsonTurmas = json_decode($jsonTurmas);
	if(empty($jsonTurmas)){
	  //não existem turmas com disciplinas cadastradas no sistema!
	}else{
	  $jsonTurmaDisciplinas = $userLogado->getAllTurmaDisciplinaJSON($userLogado->getId());
	}

	 //quando um refresh ocorrer devido inserir uma nova turma...
	 if (!empty($_GET['formSubmit']))
	 {
		 $jsonDisciplinas = $userLogado->getDisciplinaJSON($userLogado->getId());
		  $jsonDisciplinas = json_decode($jsonDisciplinas);
		  foreach($jsonDisciplinas as $val)
		  {
			  if(!empty($_GET[$val->idDisciplina]))
			  {
				  array_push($arrayTurmas, $val->idDisciplina);
			  }

		  }

		 $varNome =  $_GET['inputNome'];
		 $varLancamento = $_GET['checkLancamento'];
		 if($varLancamento=='on'){
			 //disciplina
			 $varLancamento = 1;
		 }else{
			 //turma
			 $varLancamento = 0;
		 }
		 debug_to_console($varLancamento);
		 $varTurno = $_GET['inputTurno'];
		 $varEscola = $_GET['inputEscola'];
  		 $userLogado->insertTurmaBanco(trim($varNome),trim($varTurno),trim($varEscola),$userLogado->getId(),$arrayTurmas,$varLancamento);
 	 }

	 //terminar para Update e Remove
	 if (!empty($_GET['formEditSubmit']))
	 {
		 $varNomeEdit = $_GET['inputNomeEdit'];
		 $varTurnoEdit = $_GET['inputTurnoEdit'];
		 $idTurma = $_GET['inputIdEdit'];
		 $varEscolaEdit = $_GET['inputEscolasEdit'];
		  $userLogado->updateTurma($idTurma,trim($varNomeEdit),trim($varTurnoEdit),$varEscolaEdit,$userLogado->getId());
 	 }
	 //Remove...
	 if (!empty($_GET['formEditSubmitDelete']))
	 {
		 $idTurma = $_GET['inputIdEdit'];
		 $userLogado->removeTurma(trim($idTurma));
 	 }


?>
<script type="text/javascript">
    //passando o json de turmas disciplinas para javascript
	var turmaDisciplina  =  "<?php echo str_replace("\"","'",$jsonTurmaDisciplinas);?>";
	console.log("Esse é turma ---> " + turmaDisciplina);
</script>

<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Diário de Classe</title>
	<!-- Calendar -->
	<link href="css/bootstrap-datepicker3.css" rel="stylesheet">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-switch.min.css" rel="stylesheet" type="text/css">
	<link href="css/sb-admin.css" rel="stylesheet">
	<link href="css/plugins/morris.css" rel="stylesheet">
	<link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
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
          <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>
            <?php echo $userLogado->getNome();?>
            <b class="caret"></b></a>
        <ul class="dropdown-menu">
              <li> <a href="#" style="color: #428bca;"><i class="fa fa-fw fa-user"></i> Perfil</a> </li>
              <li> <a href="#" style="color: #428bca;"><i class="fa fa-fw fa-envelope"></i> Caixa de Mensagens</a> </li>
              <li> <a href="#" style="color: #428bca;"><i class="fa fa-fw fa-gear"></i> Configuração de Conta</a> </li>
              <li class="divider"></li>
              <li> <a href="action_logout.php"style="color: #c94141;"><i class="fa fa-fw fa-power-off"></i> Sair</a> </li>
            </ul>
      </li>
        </ul>
    <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="div_blue nav navbar-nav side-nav">
        <li> <a href="index.php"><i class="fa fa-fw fa-desktop"></i> Dashboard</a> </li>
        <li> <a href="">Cadastros<i class="fa fa-fw fa-caret-down"></i></a> </li>
				<li><a href="Cadastrar.php">Instituições de Ensino</a></li>
				<li><a href="CadastrarDisciplina.php">Disciplinas</a></li>
				<li><a href="CadastroTurma.php">Turmas</a></li>
				<li><a href="CadastrarAluno.php">Alunos</a></li>
      </ul>
        </div>
    <!-- /.navbar-collapse -->
  </nav>
      <div id="" style="height: 100vh; width: 100%; background-color: white;">
          <!-- Page Heading -->
          <div class="row">
        <div class="col-lg-12" id="users_1">
              <h1 class="page-header">Escolha de Turma</h1>
              <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
							<div class="row">
	              <div class="col-md-6">
                  <div class="form-group">
                <button class="btn btn-success" data-toggle="modal" data-target="#incluirModal" name="incluir" onClick="incluirOnClick()" value="submit_insert"><span class="glyphicon glyphicon-plus"></span> Nova Turma</button>
              </div>
						</div>

						<div class="col-md-6 " style="float: right;">
                  <div class="form-group">
                <div class="input-group pull-right">
									<input class="search pull-right" placeholder="Pesquisar" aria-describedby="basic-addon1" style="height: 30px;"/>
									<span class="input-group-addon " id="basic-addon1">
										<span class="glyphicon glyphicon-search" aria-hidden="true">
										</span>
									</span>
                </div>
              </div>
						</div>
						</div>
                  <div class="panel panel-primary" >
                <div class="panel-heading">
										<div class="row">
											<div class="col-xs-4 col-sm-4 col-md-4"><h3 class="panel-title">Turmas</h3></div>
											<div class="col-xs-4 col-sm-4 col-md-4"><h3 class="panel-title">Escola</h3></div>
											<div class="col-xs-4 col-sm-4 col-md-4"><h3 class="panel-title">Turno</h3></div>
										</div>
                </div>
                <div class="panel-body" >
                      <ul id="listTurmasEDIT" class="list list-group" style="width: auto">
                    <?php
				if(empty($jsonTurmas))
				{
					echo"<li class=\"list-group-item\" >"."Você ainda não tem turmas cadastradas."."</li>";
				}
				foreach($jsonTurmas as $val)
				{
					$jsonTurmaDisciplinas =  $userLogado->getTurmaDisciplinaJSON($val->idTurma);
					$jsonTurmaDisciplinas = json_decode($jsonTurmaDisciplinas);
					$array = array();
					foreach($jsonTurmaDisciplinas as $val_dis)
					{
						if(!empty($val_dis->idDisciplina))
						array_push($array,$val_dis->nmDisciplina);
						//debug_to_console($val_dis->idDisciplina);
					}
					if(empty($array)){
						//cores do span
						if($val->turno=="Matutino"){
							$spanClass = "#428bca";
						}else if($val->turno=="Intermediario"){
							$spanClass = "#5bc0de";
						}else if($val->turno=="Integral"){
							$spanClass = "#5cb85c";
						}else if($val->turno=="Noturno"){
							$spanClass = "#f0ad4e";
						}else if($val->turno=="Vespertino"){
							$spanClass = "#777";
						}


					if($val->tipo_frequencia==0){
							echo"<li id=".$val->idTurma."
								disciplina=\"".$disciplina."\"
								turno=\"".$val->turno."\"
								nmEscola=\"".$val->nmEscola."\"
								nmTurma=\"".$val->nmTurma."\"
								tipo_frequencia=\"".$val->tipo_frequencia."\"
					 		 	class=\"list-group-item\"   >
							  	<div class=\"nome row\">
                    				<div class=\"col-xs-4 col-sm-4 col-md-4\">".$val->nmTurma."</div>
                    				<div class=\"col-xs-4 col-sm-4 col-md-4\">".$val->nmEscola."</div>
                    				<div class=\"col-xs-4 col-sm-4 col-md-4\">
                     			 	<span class=\"label label-paulo\" style=\" color:".$spanClass.";\" >".$val->turno."</span>&nbsp;</div>
                 			 	</div>
						  	</li>";
						}else{
							echo"<li id=".$val->idTurma."
								disciplina=\"".$disciplina."\"
								turno=\"".$val->turno."\"
								nmEscola=\"".$val->nmEscola."\"
								nmTurma=\"".$val->nmTurma."\"
								tipo_frequencia=\"".$val->tipo_frequencia."\"
					 		 	class=\"list-group-item\"
							  	data-toggle=\"modal\" data-target=\"#editModal\"  >
							  	<div class=\"nome row\">
                    				<div class=\"col-xs-4 col-sm-4 col-md-4\">".$val->nmTurma."</div>
                    				<div class=\"col-xs-4 col-sm-4 col-md-4\">".$val->nmEscola."</div>
                    				<div class=\"col-xs-4 col-sm-4 col-md-4\">
                     			 	<span class=\"label label-paulo\" style=\" color:".$spanClass.";\" >".$val->turno."</span>&nbsp;</div>
                 			 	</div>
						  	</li>";
						}
					}else{
						$disciplina = implode(",",$array);

						if($val->turno=="Matutino"){
							$spanClass = "#428bca";
						}else if($val->turno=="Intermediario"){
							$spanClass = "#5bc0de";
						}else if($val->turno=="Integral"){
							$spanClass = "#5cb85c";
						}else if($val->turno=="Noturno"){
							$spanClass = "#f0ad4e";
						}else if($val->turno=="Vespertino"){
							$spanClass = "#777";
						}

						if($val->tipo_frequencia==0){
							echo"<li id=".$val->idTurma."
								disciplina=\"".$disciplina."\"
								turno=\"".$val->turno."\"
								nmEscola=\"".$val->nmEscola."\"
								nmTurma=\"".$val->nmTurma."\"
								tipo_frequencia=\"".$val->tipo_frequencia."\"
					 		 	class=\"list-group-item\"   >
							  	<div class=\"nome row\">
                    				<div class=\"col-xs-4 col-sm-4 col-md-4\">".$val->nmTurma."</div>
                    				<div class=\"col-xs-4 col-sm-4 col-md-4\">".$val->nmEscola."</div>
                    				<div class=\"col-xs-4 col-sm-4 col-md-4\">
                     			 	<span class=\"label label-paulo\" style=\" color:".$spanClass.";\" >".$val->turno."</span>&nbsp;</div>
                 			 	</div>
						  	</li>";
						}else{
							echo"<li id=".$val->idTurma."
								disciplina=\"".$disciplina."\"
								turno=\"".$val->turno."\"
								nmEscola=\"".$val->nmEscola."\"
								nmTurma=\"".$val->nmTurma."\"
								tipo_frequencia=\"".$val->tipo_frequencia."\"
					 		 	class=\"list-group-item\"
							  	data-toggle=\"modal\" data-target=\"#editModal\"  >
							  	<div class=\"nome row\">
                    				<div class=\"col-xs-4 col-sm-4 col-md-4\">".$val->nmTurma."</div>
                    				<div class=\"col-xs-4 col-sm-4 col-md-4\">".$val->nmEscola."</div>
                    				<div class=\"col-xs-4 col-sm-4 col-md-4\">
                     			 	<span class=\"label label-paulo\" style=\" color:".$spanClass.";\" >".$val->turno."</span>&nbsp;</div>
                 			 	</div>
						  	</li>";
						}

					}
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
    <script>
    	function parseTurmaToModal() {
				 // $("#editModal input[name|='day'")
				  var s = $("#listTurmasEDIT").val();
				  $("#inputEmail").val(s);
				  $("#inputNome").focus();
	     }
	</script>

<!-- Modal para a Frequencia ---------------------------------------------------------------------------------->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
<div class="modal-dialog">
      <div class="modal-content">
    <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"> <span aria-hidden="true">×</span> <span class="sr-only">Close</span> </button>
          <h4 class="modal-title" id="myModalLabel" draggable="true">Escolha disciplina</h4>
        </div>
    <div class="modal-body">
          <!--DEPOIS MUDAR PARA POST!!! (Post esconde a URL protegendo pelo menos um pouco!-->
          <form action="Frequencias.php" method="post">
						<div class="row">
					<div class="col-md-4"></div>
					<div class="col-md-4"></div>
					<div class="col-md-4"></div>
        <!--Novo modo, versão DuDu!-->
        <div class="thumbnail"  style="background-color:ghostwhite;margin-left: 20px;margin-right: 24px;padding: 10px;">
              <div class="input-group" style="margin-bottom: 10px;">
            <div class="input-group-btn">
                  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Disciplinas<span class="caret"></span></button>
                  <ul id="getAjaxDisciplinas" class="dropdown-menu" role="menu">
                <?php
							   $jsonDisciplinas = $userLogado->getDisciplinaJSON($userLogado->getId());
							  	$jsonDisciplinas = json_decode($jsonDisciplinas);
							   if(empty($jsonDisciplinas))
								{
									echo"
									<li class=\"list-group-item\" style=\"margin-left: 30px;\">
									   Você ainda não tem disciplinas cadastradas.
									</li>";
								}
								foreach($jsonDisciplinas as $val)
								{
									debug_to_console("inside here!");
									  echo"<li id=".$val->idDisciplina." class=\"list-group-item\">".$val->nome."</li>";
							   	}
						?>
              </ul>
                </div>
            <!-- /btn-group -->
            <input type="text" placeholder="Selecione as opções ao lado" class="form-control" name="disciplina" id="disciplina" value="" disabled="" >
          </div>

              <!--OLD WAY -->
              <!--      <ul id="escolhaDisciplina" class="list list-group" style="width: auto">
            	<li></li>
            </ul>
    -->

              <div class="form-group"style="margin-bottom: 0px;margin-top: 10px;">
            <label class="control-label" >Numero de Aulas Ministradas:</label>
          </div>
              <ul id="qtdAulasList" class="pagination" style="margin-top: 10px;">
            <li id="1" class="active"><a style="border-radius: 24px; margin: 1px;" href="#">1</a></li>
            <li id="2"><a style="border-radius: 24px; margin: 1px;" href="#">2</a></li>
            <li id="3" ><a style="border-radius: 24px; margin: 1px;" href="#">3</a></li>
            <li id="4" ><a style="border-radius: 24px; margin: 1px;"  href="#">4</a></li>
            <li id="5" ><a style="border-radius: 24px; margin: 1px;"  href="#">5</a></li>
            <li id="6" ><a style="border-radius: 24px; margin: 1px;"  href="#">6</a></li>
          </ul>
              <div class="form-group" style="margin-bottom: 0px; margin-top: 10px;">
            <label class="control-label">Data de Lançamento:</label>
            <!--<div id="exemplo"></div>-->
            <div style="overflow:hidden;">
                  <div class="form-group">
                <div class="row">
                      <div class="col-md-8">
										<div id="calendar" class="input-group date" data-provide="datepicker">
    									<input type="text"  value="" class="form-control">
    									<div class="input-group-addon">
        								<span class="glyphicon glyphicon-th"></span>
    									</div>
										</div>
                  </div>
                    </div>
              </div>
                </div>
          </div>

              <!--Hide-->

              <input type="text"
					    value=""
					    name="turma"
					    style="height: 0px;padding: 0px;margin:0px;
					    visibility: hidden;"
					/>
              <input type="text"
                       class="form-control"
                       id="number"
                      name="number"
                      value="ops"
                      style="visibility: hidden; height: 0px;padding: 0px;margin:0px;" />
              <input type="text"
                     class="form-control"
                      name="day"
                      value="variavelqualquer"
                      style="visibility: hidden; height: 0px;padding: 0px;margin:0px;" />
              <input type="text"
                     class="form-control"
                      name="month"
                      value="variavelqualquer2"
                      style="visibility: hidden; height: 0px;padding: 0px;margin:0px;" />
              <input type="text"
                     class="form-control"
                      name="year"
                      value="variavelqualquer3"
                      style="visibility: hidden; height: 0px;padding: 0px;margin:0px;" />
              <!--End hide-->

            </div>
					</div>
        <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-julio" name="submit" value="Submit" onclick="freqOnClick()" >Começar</button>
            </div>
      </form>
        </div>
  </div>
    </div>
<!--END TESTE -->

<!--card turma-->

<!--MODAL INCLUIR-->
<div class="modal fade" id="incluirModal">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Incluir Nova Turma...</h4>
      </div>
          <div class="modal-body">


          <div class="thumbnail" style=" background-color: ghostwhite;">
          <form role="form" action="TurmaDisciplina.php" method="get">
          <div class="form-group" draggable="true" style="margin-bottom: 2px;" >
        <label class="control-label" for="text"  style="
    margin-bottom: 10px;
">Instituição Pertencente <br>
            </label>
      </div>
          <div class="input-group"style="margin-bottom: 10px;">
        <div class="input-group-btn">
              <button type="button" class="btn btn-primary dropdown-toggle"  data-toggle="dropdown" aria-expanded="false" name="inputEscolaEscolha"  value="">Instituições<span class="caret"></span></button>
              <ul id="listEscolas" class="dropdown-menu" role="menu">
            <?php
				$jsonEscolas = json_decode($jsonEscolas);
				if(empty($jsonEscolas))
				{
					echo"<li class=\"list-group-item\">"."Você ainda não tem instituições cadastradas."."</li>";
				}
				foreach($jsonEscolas as $val)
				{
					echo"<li class=\"list-group-item\">".$val->nome."</li>";
				}
		 ?>
          </ul>
            </div>
        <!-- /btn-group -->
        <input type="text" placeholder="Selecione as opções ao lado" class="form-control" name="inputEscola" id="inputEscola" value="<?=$varEscola;?>">
        <!--<button type="button" class="btn btn-default" aria-label="Left Align">
  <span class="glyphicon glyphicon-pushpin" aria-hidden="true"></span>-->
        </button>
      </div>
          <!-- /input-group -->

          <form role="form">
        <div class="form-group" draggable="true" style="margin-bottom: 2px;">
              <label class="control-label" for="text">Turno <br>
          </label>
            </div>
        <div class="input-group"style="margin-bottom: 10px;">
              <div class="input-group-btn">
            <button type="button" class="btn btn-primary dropdown-toggle"  data-toggle="dropdown" aria-expanded="false" >&nbsp;&nbsp;&nbsp;&nbsp;Turno&nbsp;&nbsp;&nbsp;&nbsp;<span class="caret"></span></button>
            <ul id="listTurnos" class="dropdown-menu" role="menu">
                  <li class="list-group-item">Matutino</li>
                  <li class="list-group-item">Intermediario</li>
                  <li class="list-group-item">Vespertino</li>
                  <li class="list-group-item">Noturno</li>
                  <li class="list-group-item">Integral</li>
                </ul>
          </div>
              <!-- /btn-group -->
              <input type="text"  placeholder="Selecione as opções ao lado" class="form-control" name="inputTurno" id="inputTurno" value="<?=$varTurno;?>" >
              <!--<button type="button" class="btn btn-default" aria-label="Left Align">
  <span class="glyphicon glyphicon-pushpin" aria-hidden="true"></span>-->
              </button>
            </div>
        <!-- /input-group -->
        <div class="form-group">
              <label class="control-label" for="exampleInputPassword1" style="
    margin-bottom: 10px;
">Nome da Turma <br>
          </label>
              <input class="form-control" id="exampleInputPassword1" placeholder="Entre com o nome da turma"
                  type="text" name="inputNome" value="<?=$varNome;?>">
            </div>
        <div class="form-group" style="margin-left:1px">
              <label class="control-label">Lançamento de Frequencia por:</label>
            </div>
        <div class="form-group" style="margin-left:3px">
              <input type="checkbox" name="checkLancamento" checked>
              <span data-toggle="tooltip" data-original-title="Use o Lançamento por Turma, para lançar frequencias diarias sem divisão por disciplinas." class="glyphicon glyphicon-question-sign" aria-hidden="true"></span> </div>
        <div class="form-group">
              <div class="form-group " draggable="true" style="margin-bottom: 2px;">
            <label class="control-label" for="text">Incluir Disciplinas <br>
                </label>
          </div>
              <div class="thumbnail scrollable-menu" role="menu" style="background-color: #E4F0EA;">
            <?php
                    $jsonDisciplinas = $userLogado->getDisciplinaJSON($userLogado->getId());
                    $jsonDisciplinas = json_decode($jsonDisciplinas);
                    if(empty($jsonDisciplinas))
                    {
                        echo"
                        <li class=\"form-group\" style=\"margin-left: 30px;\">
                            <input type=\"checkbox\" name=\"my-checkbox\" data-size=\"mini\" data-on-text=\"Sim\"
                            data-off-text=\"Não\"  data-animate=\"true\" disabled=\"true\"  unchecked>
                        Você ainda não tem disciplinas cadastradas.
                        </li>";
                    }
                    foreach($jsonDisciplinas as $val)
                    {
                        echo"<li
                                id=\"".$val->idDisciplina."\"
                                class=\"list-group-item\"
                                style=\"margin-left: 30px;  margin-right: 30px;\" >
                                     <input id=\"my-checkbox\"
                                     type=\"checkbox\"
                                     name=".$val->idDisciplina."
                                     data-size=\"mini\"
                                     data-on-text=\"Sim\"
                                     data-off-text=\"Não\"
                                     data-animate=\"true\"
                                     unchecked>
                                 &nbsp;".$val->nome."
                              </li>";
                    }
             ?>
          </div>
            </div>
        </div>
        </div>
        <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
              <button type="submit" onc lick="cadastrarOnClick()" class="btn btn-julio" name="formSubmit" value="submit_insert" draggable="true" >Cadastrar</button>
            </div>
      </form>
        </div>
    <!-- /.modal-content -->
  </div>
      <!-- /.modal-dialog -->
    </div>
<!-- /.modal -->
<!--end card turma-->
</body>
</html>
<?php
	echo file_get_contents(dirname(__FILE__)."/Scripts/TurmaDisciplinaScript.php", true);
?>
