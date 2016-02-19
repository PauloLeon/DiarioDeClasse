<?php
		include 'php/session.php';
		$turma = $_POST['turma'];
		$disciplina = $_POST['disciplina'];
		$quantidaDeAulas = $_POST['number'];
		$dia = $_POST['day'];
		$mes = $_POST['month'];
		$ano = $_POST['year'];
		$disciplina =  $userLogado->getIdDisciplinaJSON($disciplina, $userLogado->getId());
		// $disciplina = json_decode($disciplina);
		debug_to_console("Turma=".$turma." | "."Disciplina=".$disciplina." | "."Quantidade de Aulas=".$quantidaDeAulas." | "."Dia=".$dia." | "."Mês=".$mes." | "."Ano=".$ano. "- ARQUIVO:Frequencias.php");
		$jsonAlunos =  $userLogado->getAlunosJson($userLogado->getId(),$turma);
		$jsonAlunos = json_decode($jsonAlunos);
?>

<script type="text/javascript">
function replaceAll(find, replace, str) {
	return str.replace(new RegExp(find, 'g'), replace);
}
//passando as variaveis  que vieram da tela anterios Post-PHP para javascript
var turma  =  "<?php echo $turma; ?>";
var disciplina =  "<?php echo str_replace("\"","'",$disciplina);?>";
disciplina = replaceAll("'", "\"",disciplina);
disciplina = JSON.parse(disciplina);
disciplina = disciplina[0].idDisciplina;
var quantidadeDeAulas = "<?php echo $quantidaDeAulas; ?>";
var dia =  "<?php echo $dia; ?>";
var mes =  "<?php echo $mes; ?>";
var ano =  "<?php echo $ano; ?>";
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
	<link href="css/datepicker.css" rel="stylesheet">
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

<style>
.btn-launch
{
	background-color: hsl(156, 66%, 68%) !important;
	background-repeat: repeat-x;
	filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#e5f9f1", endColorstr="#77e3b8");
	background-image: -khtml-gradient(linear, left top, left bottom, from(#e5f9f1), to(#77e3b8));
	background-image: -moz-linear-gradient(top, #e5f9f1, #77e3b8);
	background-image: -ms-linear-gradient(top, #e5f9f1, #77e3b8);
	background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #e5f9f1), color-stop(100%, #77e3b8));
	background-image: -webkit-linear-gradient(top, #e5f9f1, #77e3b8);
	background-image: -o-linear-gradient(top, #e5f9f1, #77e3b8);
	background-image: linear-gradient(#e5f9f1, #77e3b8);
	border-color: #77e3b8 #77e3b8 hsl(156, 66%, 61.5%);
	color: #333 !important;
	text-shadow: 0 1px 1px rgba(255, 255, 255, 0.42);
	-webkit-font-smoothing: antialiased;
}

/* Essas duas classes são para trocar a cor do objeto que contem a quantidade de faltas e "Justificar Faltas"*/
.form-group-green
{
	background: #E4F0EA;
	padding: inherit;
	padding-top: inherit;
	padding-right: inherit;
	padding-bottom: inherit;
	padding-left: inherit;
	border-radius: 15px;
	cursor:not-allowed;
}


.form-group-red
{
	background: #a94442;
	padding: inherit;
	padding-top: inherit;
	padding-right: inherit;
	padding-bottom: inherit;
	padding-left: inherit;
	border-radius: 15px;
}

.font-edit-blue
{
	margin-bottom: 0px;
	color: #428bca;
}

.font-edit-white
{
	margin-bottom: 0px;
	color: #fff;
}

.btn-freq-red
{
	border-radius: 24px;
	margin: 1px;
	background: #F2DEDE;
	border: 2px #B7493F solid;
	width: 36px;
	height: 36px;
}

.btn-freq-blue
{
	border-radius: 24px;
	margin: 1px;
	background: #E2F1FF;
	border: 2px #428bca solid;
	width: 36px;
	height: 36px;
}

.btn-freq-green
{
	border-radius: 24px;
	margin: 1px;
	background: #E0F0D6;
	border: 2px #427634 solid
	width: 36px;
	height: 36px;
}
</style>
<body>
	<div id="wrapper">
		<!-- Navigation -->
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php"><img src="/imagem/site/diario-de-classe.png" class="img-responsive"style="width:150px;"></a>
			</div>
			<!-- Top Menu Items -->
			<ul class="nav navbar-right top-nav">

				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Eduardo Saraiva <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li>
							<a href="#" style="color: #428bca;"><i class="fa fa-fw fa-user"></i> Perfil</a>
						</li>
						<li>
							<a href="#" style="color: #428bca;"><i class="fa fa-fw fa-envelope"></i> Caixa de Mensagens</a>
						</li>
						<li>
							<a href="#" style="color: #428bca;"><i class="fa fa-fw fa-gear"></i> Configuração de Conta</a>
						</li>
						<li class="divider"></li>
						<li>
							<a href="action_logout.php"style="color: #c94141;"><i class="fa fa-fw fa-power-off"></i> Sair</a>
						</li>
					</ul>
				</li>
			</ul>
			<!-- Sidebar Menu Items - These collapse to the responsive navigation
			menu on small screens -->
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="div_blue nav navbar-nav side-nav">
					<li>
						<a href="index.php"><i class="fa fa-fw fa-desktop"></i> Dashboard</a>
					</li>
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
			<div id="begin" class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<h4 class="page-header">
							<div class="alert alert-success" role="alert">
								<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
								<span class="sr-only">Error:</span>
								Frequencia para o data:<?php echo $dia; ?>/<?php echo $mes; ?>/<?php echo $ano; ?>, Quantidade de Aulas Ministradas:<?php echo $quantidaDeAulas; ?>
							</div>
						</h4>
					</div>
				</div>

				<div class="row">
				<?php

				if(empty($jsonAlunos))
				{
					echo"<div class=\"row\">
					<div class=\"col-md-2\"></div>
					<div class=\"col-md-8\">
					<img src=\"imagens/turma_vazia.png\" alt=\"...\" class=\"img-thumbnail\">
					</div>
					<div class=\"col-md-2\"></div>
					</div>";
				}
				foreach($jsonAlunos as $val)
				{
					echo"<div class=\"col-lg-4 col-md-4\"
					id=\"extDiv\"
					name=\"alu".$val->idAluno."\"
					idaluno=".$val->idAluno."
					nmaluno=".$val->nmAluno."
					nmturma=".$val->nmTurma.">
					<div class=\"col-lg-12 col-md-12\">
					<div idForColor=\"".$val->idAluno."\" id=\"cardAluno\" idaluno=".$val->idAluno." nmaluno=".$val->nmAluno." class=\"panel panel-success\">
					<div class=\"panel-heading\">
					<div class=\"row\">
					<div class=\"col-xs-3\">
					<img  id=\"img".$val->idAluno."\" class=\"media-object\" src=\"imagens/sx_masculino.png\"alt=\"\">
					</div>
					<div class=\"col-xs-9\">
					<div   id=\"presenca".$val->idAluno."\" draggable=\"true\">Presente!</div>
					<div draggable=\"true\">".$val->nmAluno."</div>
					</div>
					</div>
					</div>
					<div class=\"panel-footer\"></ div>
					<div marcador=\"esconderDePrima\" id=\"divFaltas".$val->idAluno."\" class=\"form-group\"  style=\"margin: 0px;\">
					<ul id=\"qtdAulasLimitada\" idForClick=\"".$val->idAluno."\"  class=\"pagination\" style=\"margin: 0px; width: 100%;\">";
					for ($i = 1; $i <= $quantidaDeAulas; $i++) {

						if ($i == $quantidaDeAulas) {
							echo"<li id=\"".$val->idAluno."\" idForClicknew=\"".$val->idAluno."\" ><a idForClick=\"".$val->idAluno."\" style=\"border-radius: 24px; margin: 1px;background: #F2DEDE;border-color: #B7493F;border: 2px #B7493F solid;width: 36px;height: 36px;\" href=\"#\">"."</a></li>";
						}else{
							echo"<li idForClicknew=\"".$val->idAluno."\" ><a idForClick=\"".$val->idAluno."\" style=\"border-radius: 24px; margin: 1px;background: #F2DEDE;border-color: #B7493F;border: 2px #B7493F solid;width: 36px;height: 36px;\" href=\"#\">"."</a></li>";
						}
					//	echo"<li idForClicknew=\"".$val->idAluno."\" ><a idForClick=\"".$val->idAluno."\" style=\"border-radius: 24px; margin: 1px;\" href=\"#\">".$i."</a></li>";

					}
					echo"<li tagForClick='justificativa' dismiss='1' idForClick=\"".$val->idAluno."\" ><a data-toggle=\"modal\"  data-target=\"#justificarFaltaModal\"  style=\"border-radius: 24px; margin: 1px; width: 100%;text-align:center;\" >Justificar Falta</a></li> ";
					echo "</ul>
					</div>
					</div>
					</div>
					</div>" ;
					echo"</div>";
				}
				?>
			</div>
			<!-- /.row -->
			<div class="row">
		 <div class="col-md-4"></div>
		 <div class="col-md-4 text-center">
		 </div>
		 <div class="col-md-4 text-center">
		 <!--Ver o problemas do tamanho da tela! adaptar para telas menores!!!!-->
		 <button class="btn btn-success" type="submit" name="lancarFrequencia" style="margin-bottom: 20px;">
			 <span class="glyphicon glyphicon-ok"></span> Gravar</button>
		 </div>
	 </div>
			</div>
		</div>
		<!-- /.container-fluid -->
	</div>
	<!-- /#page-wrapper -->


	<!--MODAL JUSTIFICAR FALTA-------------------------------------------------------------------------------------------------->
	<div class="modal fade" id="justificarFaltaModal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Informe a justificativa para a(s) falta(s).</h4>
				</div>
				<div class="modal-body">
						<!--<form role="form"  method="get">-->
						<div class="form-group">
							<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 input-group input-group-lg">
  								<input id="justificarArea" type="text" class="form-control" aria-describedby="basic-addon1" style="height:94px;">
							</div>
						</div>
					<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-6">
					<?php

					echo "<ul id=\"qtdAulasLimitada\" class=\"pagination\" style=\"margin: 0px; width: 100%;\">";
					for ($i = 1; $i <= $quantidaDeAulas; $i++) {

						if ($i == $quantidaDeAulas) {
							echo"<li id=\"".$val->idAluno."\" idForClicknew=\"".$val->idAluno."\" ><a idForClick=\"".$val->idAluno."\" style=\"border-radius: 24px; margin: 1px;background: #E1F1FF;border-color: #B7493F;border: 2px #214565 solid;width: 36px;height: 36px;\" href=\"#\">"."</a></li>";
						}else{
							echo"<li idForClicknew=\"".$val->idAluno."\" ><a idForClick=\"".$val->idAluno."\" style=\"border-radius: 24px; margin: 1px;background: #E1F1FF;border-color: #B7493F;border: 2px #214565 solid;width: 36px;height: 36px;\" href=\"#\">"."</a></li>";
						}
					//	echo"<li idForClicknew=\"".$val->idAluno."\" ><a idForClick=\"".$val->idAluno."\" style=\"border-radius: 24px; margin: 1px;\" href=\"#\">".$i."</a></li>";

					}
					echo "</ul>";

					 ?></div>
				<div class="col-md-1"></div>
			</div>


				</div>
				<div class="modal-footer">
					<button id="dismiss" type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
					<button id="submit" type="submit" class="btn btn-julio" name="submitJustificativa" value="submit_justificativa">Gravar</button>
				</div>
				<!-- </form>-->
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal JUSTIFICAR FALTA-11-->




</body>

</html>
<?php
echo file_get_contents(dirname(__FILE__)."/Scripts/FrequenciasScript.php", true);
?>
