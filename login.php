<?php
	error_reporting(0);
	$varEmail = $_POST['inputEmail'];
	$varSenha = $_POST['inputPassword'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Identificação - Diário de Classe</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=960, user-scalable=yes">
	<link rel="shortcut icon" href="imagem/favicon.png" type="image/png" />
	<meta name="author" content="Libra Design" />
	<meta name="keywords" content="" />
	<meta property="og:description" content="" />
	<meta name="description" content="" />
	<meta property="og:title" content="" />
	<meta property="og:url" content="" />
	<meta property="og:image" content="/imagem/logo-mini.jpg" />
	<meta property="og:site_name" content="" />
	<meta property="og:type" content="website" />
	<link rel="stylesheet" href="library/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="fonts/flaticon.css">
	<link rel="stylesheet" href="fonts/stylesheet.css">
	<link rel="stylesheet" href="imagem/site/ycon.css">
	<link rel="stylesheet" href="css/site.css">
	<script type="text/javascript" src="../DiarioDeClasse/library/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="../DiarioDeClasse/library/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../DiarioDeClasse/library/easing/jquery.easing.1.3.js"></script>
	<script type="text/javascript" src="../DiarioDeClasse/library/local-scroll/jquery.scrollTo-1.4.3.1-min.js"></script>
	<script type="text/javascript" src="../DiarioDeClasse/library/local-scroll/jquery.localscroll-1.2.7-min.js"></script>
	<script type="text/javascript" src="../DiarioDeClasse/js/bootstrap_site.js"></script>
</head>
<body class="interna">
	<a href="#content" class="sr-only">Ir para o conteúdo</a>
	<div class="extra-geral">
		<div class="site-geral">
			<header class="extra-header">
				<div class="site-header">
					<nav class="navbar navbar-default" role="navigation">
						<div class="container">
							<div class="navbar-header">
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-primary">
									<span class="sr-only">Navegação</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
								<a class="navbar-brand" href="index1.php#HOME" title="Voltar para a página inicial"><img src="../DiarioDeClasse/imagem/site/diario-de-classe.png" alt="Diário de Classe"></a>
							</div>
							<div class="collapse navbar-collapse navbar-primary">
								<ul class="nav navbar-nav">
									<li class=""><a href="index1.php#SOBRE">Sobre</a></li>
									<li class=""><a href="index1.php#VANTAGENS">Vantagens</a></li>
									<li class=""><a href="index1.php#EXPERIMENTE">Experimente</a></li>
									<li class=""><a href="index1.php#CONTATO">Contato</a></li>
								</ul>
								<div class="links">
									<span class="icones">
										<span class="icones-title">Apps</span>
										<a href="#" target="_blank" title="Tenha o Diário de Classe em seu dispositivo!"><span class="sr-only">App Store</span><span class="fa fa-apple"></span></a>
										<a href="#" target="_blank" title="Tenha o Diário de Classe em seu dispositivo!"><span class="sr-only">Google Play!</span><span class="fa fa-android"></span></a>
									</span>
									<a class="btn-login" data-toggle="modal" href="#modal-login">
										<span class="fa fa-user"></span>
										Login
									</a>
								</div> <!-- .links -->
							</div><!-- /.navbar-collapse -->
						</div> <!-- .container -->
					</nav>
				</div> <!-- .site-header -->
			</header> <!-- .extra-header -->
			<div class="extra-central">
				<div class="site-central" id="content">
					<div class="modal modal-login modal-open" id="modal-login" style="">
						<div class="modal-dialog modal-lg">
							<div class="modal-content">
								<div class="modal-body clearfix">
									<div class="left">
										<h4 class="modal-title">Acesse sua área</h4>
										<div class="row">
											<div class="col-md-8">
												<form action="action_login.php" method="post">
													<div class="form-group">
														<label class="sr-only">Seu e-mail</label>
														<input type="text" class="form-control login"  name="inputEmail" value="<?=$varEmail;?>" placeholder="Seu e-mail:">
													</div> <!-- .form-group -->
													<div class="form-group">
														<label class="sr-only">Senha</label>
														<input type="password" class="form-control senha" name="inputPassword" value="<?=$varSenha;?>" placeholder="Senha:">
													</div> <!-- .form-group -->
													<p>
														<a href="#" title="Inicie o processo de recuperação da sua senha!"><small>Esqueceu sua senha?</small></a>
													</p>
													<button class="btn btn-info btn-lg btn-block btn-rounded" name="formSubmit" value="Submit" >Fazer login</button>
												</form>
											</div> <!-- .col-md-8 -->
										</div> <!-- .row -->
										<br>
										<strong>Acesse sua conta pelo:</strong><br>
										<a href="#" class="btn btn-default btn-rounded normal btn-sm text-facebook"><span class="fa fa-facebook"></span> Facebook</a>
										<a href="#" class="btn btn-default btn-rounded normal btn-sm text-twitter"><span class="fa fa-twitter"></span> Twitter</a>
										<a href="#" class="btn btn-default btn-rounded normal btn-sm text-google"><span class="fa fa-google"></span> Google</a>
									</div> <!-- .left -->
									<div class="right">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										<h4 class="modal-title">Ainda não tem cadastro?</h4>
										<p class="lead">
											Faça o seu agora mesmo.
										</p>
										<a href="#" title="" class="btn btn-experimente">Experimente</a><br>
										<span class="selo-sm">Grátis por 30 dias</span>
									</div> <!-- .right -->
								</div> <!-- .modal-body -->
							</div> <!-- .modal-content -->
						</div> <!-- .modal-dialog -->
					</div> <!-- #modal-login -->
				</div> <!-- .site-central -->
			</div> <!-- .extra-central -->
			<footer>
				<div class="extra-footer">
					<div class="site-footer">
						<div class="container">
							<div class="row">
								<div class="col-md-8">
									<ul class="menu-footer">
										<li><a href="index1.php#HOME" title="">Início</a></li>
										<li><a href="index1.php#SOBRE" title="">Sobre</a></li>
										<li><a href="index1.php#VANTAGENS" title="">Vantagens</a></li>
										<li><a href="index1.php#EXPERIMENTE" title="">Experimente</a></li>
										<li><a href="index1.php#CONTATO" title="">Contato</a></li>
									</ul>
								</div> <!-- .col-md-8 -->
								<div class="col-md-4">
									<div class="social-footer">
										<a href="#" title="Acesse nosso Facebook" target="_blank"><span class="sr-only">Facebook</span><span class="fa fa-facebook"></span></a>
										<a href="#" title="Acesse nosso Twitter" target="_blank"><span class="sr-only">Twitter</span><span class="fa fa-twitter"></span></a>
										<a href="#" title="Acesse nosso Instagram" target="_blank"><span class="sr-only">Instagram</span><span class="fa fa-instagram"></span></a>
									</div> <!-- .social-footer -->
								</div> <!-- .col-md-4 -->
							</div> <!-- .row -->
							<hr class="white">
							<div class="site-resumo">
								<div class="row">
									<div class="col-md-10">
										<div class="media">
											<div class="media-left marca">
												<img src="../DiarioDeClasse/imagem/site/diario-de-classe-white.png" alt="Marca Diário de Classe">
											</div> <!-- .media-left -->
											<div class="media-left chaves">
												<img src="../DiarioDeClasse/imagem/site/chaves-white.png" alt="Chaves">
											</div> <!-- .media-left -->
											<div class="media-body">
												<span class="texto">
													Tudo que você precisa nas suas aulas, organizadas em um só lugar. Baixe agora o aplicativo no seu <a href="#" target="_blank" title="Tenha o aplicativo no seu smartphone!">Android</a> ou <a href="#" target="_blank" title="Tenha o aplicativo em seu Iphone ou Ipad!">iOS</a>.
												</span>
											</div> <!-- .media-body -->
										</div> <!-- .media -->
									</div> <!-- .col-md-10 -->
								</div> <!-- .row -->
							</div> <!-- .site-resumo -->
						</div> <!-- .container -->
					</div> <!-- .site-footer -->
					<div class="site-direitos">
						<div class="container">
							<span class="text">Diário de Classe é um produto Hábil Software ©  2015.   </span>
							<ul class="menu-direitos">
								<li><a href="#" title="">Termos de uso</a></li>
								<li><a href="#" title="">Apps</a></li>
								<li><a href="#" title="">Desenvolvedores</a></li>
							</ul>
							<div class="download-footer">
								<a href="#" target="_blank" title="Disponível no Google Play!"><img src="../DiarioDeClasse/imagem/site/googleplay.png" alt="Disponível no Google Play!"></a>
								<a href="#" target="_blank" title="Baixar na App Store"><img src="../DiarioDeClasse/imagem/site/appstore.png" alt="Baixar na App Store"></a>
							</div> <!-- .download-footer -->
							<a href="http://www.libradesign.com.br" target="_blank" title="Libra Design" class="sr-only"><img src="../DiarioDeClasse/imagem/site/libra.png" alt="Logotipo Libra Design +Tech"></a>
						</div> <!-- .container -->
					</div> <!-- .site-direitos -->
				</div> <!-- .extra-footer -->
			</footer>
		</div> <!-- .site-geral -->
	</div> <!-- .extra-geral -->
	<div class="modal fade modal-login" id="modal-login" style="">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-body clearfix">
					<div class="left">
						<h4 class="modal-title">Acesse sua área</h4>
						<div class="row">
							<div class="col-md-8">
								<form action="">
									<div class="form-group">
										<label class="sr-only">Seu e-mail</label>
										<input type="text" class="form-control login" placeholder="Seu e-mail:">
									</div> <!-- .form-group -->
									<div class="form-group">
										<label class="sr-only">Senha</label>
										<input type="password" class="form-control senha" placeholder="Senha:">
									</div> <!-- .form-group -->
									<p>
										<a href="#" title="Inicie o processo de recuperação da sua senha!"><small>Esqueceu sua senha?</small></a>
									</p>
									<buttontype="submit" name="formSubmit" value="Submit" type="submit" class="btn btn-success" name="formSubmit" value="Submit" class="btn btn-info btn-lg btn-block btn-rounded">Fazer login</button>
								</form>
							</div> <!-- .col-md-8 -->
						</div> <!-- .row -->
						<br>
						<strong>Acesse sua conta pelo:</strong><br>
						<a href="#" class="btn btn-default btn-rounded normal btn-sm text-facebook"><span class="fa fa-facebook"></span> Facebook</a>
						<a href="#" class="btn btn-default btn-rounded normal btn-sm text-twitter"><span class="fa fa-twitter"></span> Twitter</a>
						<a href="#" class="btn btn-default btn-rounded normal btn-sm text-google"><span class="fa fa-google"></span> Google</a>
					</div> <!-- .left -->
					<div class="right">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Ainda não tem cadastro?</h4>
						<p class="lead">
							Faça o seu agora mesmo.
						</p>
						<a href="#" title="" class="btn btn-experimente">Experimente</a><br>
						<span class="selo-sm">Grátis por 30 dias</span>
					</div> <!-- .right -->
				</div> <!-- .modal-body -->
			</div> <!-- .modal-content -->
		</div> <!-- .modal-dialog -->
	</div> <!-- #modal-login -->
	<script src="../DiarioDeClasse/http://localhost:35729/livereload.js"></script>
	<script>
	jQuery(document).ready(function(){

	});
	</script>
</body>
</html>
