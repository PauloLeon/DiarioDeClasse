<?php
error_reporting(0);
	$varEmail = $_POST['inputEmail'];
	$varSenha = $_POST['inputPassword'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Diário de Classe</title>
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
<body class="home">
	<a href="#content" class="sr-only">Ir para o conteúdo</a>
	<div class="extra-geral">
		<div class="site-geral">
			<header class="extra-header">
				<div class="site-header">
					<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
						<div class="container">
							<div class="navbar-header">
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-primary">
									<span class="sr-only">Navegação</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
								<a class="navbar-brand" href="#HOME" title="Voltar para a página inicial"><img src="../DiarioDeClasse/imagem/site/diario-de-classe.png" alt="Diário de Classe" class="img-responsive"></a>
							</div>
							<div class="collapse navbar-collapse navbar-primary">
								<ul class="nav navbar-nav">
									<li class=""><a href="#SOBRE">Sobre</a></li>
									<li class=""><a href="#VANTAGENS">Vantagens</a></li>
									<li class=""><a href="#EXPERIMENTE">Experimente</a></li>
									<li class=""><a href="#CONTATO">Contato</a></li>
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
					<div class="page page-home" id="HOME">
						<div class="container">
							<div class="atalhos">
								<span class="icones">
									<span class="icones-title">Apps</span>
									<a href="#" target="_blank" title="Tenha o Diário de Classe em seu dispositivo!"><span class="sr-only">App Store</span><span class="fa fa-apple"></span></a>
									<a href="#" target="_blank" title="Tenha o Diário de Classe em seu dispositivo!"><span class="sr-only">Google Play!</span><span class="fa fa-android"></span></a>
								</span>
								<a class="btn-login" data-toggle="modal" href="#modal-login">
									<span class="fa fa-user"></span>
									Login
								</a>
							</div>
							<div class="page-heading">
								<h1 class="page-title sr-only">Diário de Classe</h1>
								<div class="content-brand">
									<img src="../DiarioDeClasse/imagem/site/diario-de-classe.png" alt="Diário de Classe" class="img-responsive center-block">
								</div> <!-- .content-brand -->
							</div> <!-- .page-heading -->
							<div class="page-content">
								<div class="row">
									<div class="col-md-8 col-md-offset-2">
										<div class="monitor">
											<div class="texto">
												<strong class="destaque">Controle frequências, conteúdos e avaliações das suas turmas, tudo em um só lugar!!!</strong>
											</div> <!-- .texto -->
											<a href="#EXPERIMENTE" class="btn btn-warning btn-lg btn-experimente">Experimente!!!<br>7 dias grátis</a><br>
											<a href="#SOBRE" class="btn btn-link">Saiba mais</a>
										</div> <!-- .monitor -->
									</div> <!-- .col-md-8 -->
								</div> <!-- .row -->

							</div> <!-- .page-content -->
						</div> <!-- .container -->
					</div> <!-- .page-home -->
					<div class="page page-sobre" id="SOBRE">
						<div class="container">
							<div class="page-heading">
								<h2 class="page-title h1"><span class="destaque">Um</span> diário <span class="destaque">de</span> classe completo</h2>
								<div class="resumo">
									O bom e velho Diário de Classe agora em versão digital.
								</div> <!-- .resumo -->
							</div> <!-- .page-heading -->
							<div class="page-content">
								<div class="row">
									<div class="col-md-4">
										<div class="icone">[ICONE AQUI]</div>
										<div class="texto">
											Organize seus registros de maneira simples e descomplicada.
										</div> <!-- .texto -->
									</div> <!-- .col-md-4 -->
									<div class="col-md-4">
										<div class="icone">[ICONE AQUI]</div>
										<div class="texto">
											Para professores de todos os ensinos, cursinhos, universidades e outros.
										</div> <!-- .texto -->
									</div> <!-- .col-md-4 -->
									<div class="col-md-4">
										<div class="icone">[ICONE AQUI]</div>
										<div class="texto">
											Utilize na web ou baixe o app para celular ou tablet.
										</div> <!-- .texto -->
									</div> <!-- .col-md-4 -->
								</div> <!-- .row -->
								<a href="#EXPERIMENTE" class="btn btn-lg btn-warning btn-experimente">Experimente!!!<br>7 dias grátis</a><br>
								<a href="#VANTAGENS" class="btn btn-link">Veja as vantagens</a><br>
								<div class="ycon-chaves-yellow"></div>
							</div> <!-- .page-content -->
						</div> <!-- .container -->
					</div> <!-- .page-sobre -->
					<div class="page page-vantagens" id="VANTAGENS">
						<div class="container">
							<div class="page-heading">
								<h2 class="page-title">Vantagens</h2>
								<div class="resumo">
									<div class="row">
										<div class="col-md-6 col-md-offset-3">
											Veja as principais vantagens de utilizar o nosso Diário de Classe:
										</div> <!-- .col-md-6 -->
									</div> <!-- .row -->
								</div> <!-- .resumo -->
							</div> <!-- .page-heading -->
							<div class="page-content">
								<div class="row">
									<div class="col-md-6">
										<div class="media vantagem">
                                                                                    <span class="pull-left"><img src="../DiarioDeClasse/imagem/site/icon/img_icone__03.png"></span>
											<div class="media-body">
												<h3 class="media-heading title">Mobilidade</h3>
												<div class="texto">
													Controle pelo celular ou tablet com ou sem internet.
												</div> <!-- .texto -->
											</div> <!-- .media-body -->
										</div> <!-- .vantagem -->
									</div> <!-- .col-md-6 -->
									<div class="col-md-6">
										<div class="media vantagem">
											<span class="pull-left"><img src="../DiarioDeClasse/imagem/site/icon/img_icone__06.png"></span>
											<div class="media-body">
												<h3 class="media-heading title">Registro de frequência</h3>
												<div class="texto">
													Controle de maneira simples e rápida a frequência de seus alunos.
												</div> <!-- .texto -->
											</div> <!-- .media-body -->
										</div> <!-- .vantagem -->
									</div> <!-- .col-md-6 -->
								</div> <!-- .row -->
								<div class="row">
									<div class="col-md-6">
										<div class="media vantagem">
											<span class="pull-left"><img src="../DiarioDeClasse/imagem/site/icon/img_icone__10.png"></span>
											<div class="media-body">
												<h3 class="media-heading title">Registro de conteúdo</h3>
												<div class="texto">
													Coloque no aplicativo todo o conteúdo
													que fosse você precisa para usar em sala de aula e se organize.
												</div> <!-- .texto -->
											</div> <!-- .media-body -->
										</div> <!-- .vantagem -->
									</div> <!-- .col-md-6 -->
									<div class="col-md-6">
										<div class="media vantagem">
                                                                                    <span class="pull-left"><img src="../DiarioDeClasse/imagem/site/icon/img_icone__12.png"></span>
											<div class="media-body">
												<h3 class="media-heading title">Registro de Avaliações (Notas, Conceito ou Pareceres)</h3>
												<div class="texto">
													Registre o rendimento dos seus alunos, quantitativo, qualitativo e/ou dissertativo!
												</div> <!-- .texto -->
											</div> <!-- .media-body -->
										</div> <!-- .vantagem -->
									</div> <!-- .col-md-6 -->
								</div> <!-- .row -->
								<div class="text-center text-plus">
									<a href="#EXPERIMENTE" class="btn btn-warning btn-experimente btn-wired btn-double">
										<span>Confira os planos</span>
										<small>e experimente grátis por 30 dias</small>
									</a>
									<br>
									<br>
									<span class="ycon-chaves-gray"></span>
								</div> <!-- .text-center -->
							</div> <!-- .page-content -->
						</div> <!-- .container -->
					</div> <!-- .page-vantagens -->
					<div class="page page-experimente" id="EXPERIMENTE">
						<div class="container">
							<div class="page-heading">
								<h2 class="page-title h1">Experimente</h2>
								<div class="resumo">
									Todos seus dados em um só lugar
								</div> <!-- .resumo -->
							</div> <!-- .page-heading -->
							<div class="page-content">
								<div class="row">
									<div class="col-md-5 col-md-offset-1">
										<div class="plano plano-info">
											<div class="extra">
												<span class="selo">
													<span class="text">Experimente! 7 dias grátis</span>
													<span class="space"></span>
												</span>
												<div class="plano-heading">
													<div class="icone">
														<span class="imagem">
															<img src="../DiarioDeClasse/imagem/site/icon/plano-individual.png" alt="Plano individual">
														</span>
													</div> <!-- .icone -->
													<h3 class="title">Plano individual</h3>
													<div class="resumo">
														Para professores de todos os tipos de escola, cursinhos e universidades
													</div> <!-- .resumo -->
												</div> <!-- .plano-heading -->
												<div class="plano-content">
													<div class="preco">
														<div class="row">
															<div class="col-md-12 col-sm-12 mensal">
																<span class="">
																	<span class="moeda">R$</span>
																	<span class="valor">20</span>
																	<span class="resto">
																		<span class="centavos">,00</span><span class="text">por ano</span>
																	</span>
																</span>
															</div> <!-- .col-md-8 -->

														</div> <!-- .row -->
													</div> <!-- .preco -->
													<a href="#EXPERIMENTE" class="btn btn-experimente">
														<span>Começar</span>
														<small>Experimente grátis por 7 dias</small>
													</a>
												</div> <!-- .plano-content -->
											</div> <!-- .extra -->
										</div> <!-- .plano -->
									</div> <!-- .col-md-5 -->
									<div class="col-md-5">
										<div class="plano plano-success">
											<div class="extra">
												<div class="plano-heading">
													<div class="icone">
														<span class="imagem">
															<img src="../DiarioDeClasse/imagem/site/icon/plano-institucional.png" alt="Plano institucional">
														</span>
													</div> <!-- .icone -->
													<h3 class="title">Plano institucional</h3>
													<div class="resumo">
														Para escolas e instituições de ensino. Maior praticidade e economia com o uso do aplicativo.
													</div> <!-- .resumo -->
												</div> <!-- .plano-heading -->
												<div class="plano-content">
													<div class="preco">
														<div class="row">
															<div class="col-md-12 col-sm-12 mensal">
																<span class="">
																	<span class="moeda">R$</span>
																	<span class="valor">5</span>
																	<span class="resto">
																	<span class="centavos">,00</span><span class="text">por professor/ mês</span>
																	</span>
																</span>
															</div> <!-- .col-md-8 -->

														</div> <!-- .row -->
													</div> <!-- .preco -->
													<a href="#EXPERIMENTE" class="btn btn-experimente">
														<span>EM BREVE</span>
														<!-- <small>Por 7 dias</small>-->
													</a>
												</div> <!-- .plano-content -->
											</div> <!-- .extra -->
										</div> <!-- .plano -->
									</div> <!-- .col-md-5 -->
								</div> <!-- .row -->
								<div class="download-central">
									<a href="#" target="_blank" title="Disponível no Google Play!"><img src="../DiarioDeClasse/imagem/site/googleplay.png" alt="Disponível no Google Play!"></a>
									<a href="#" target="_blank" title="Baixar na App Store"><img src="../DiarioDeClasse/imagem/site/appstore.png" alt="Baixar na App Store"></a>
								</div> <!-- .download-central -->
							</div> <!-- .page-content -->
						</div> <!-- .container -->
					</div> <!-- .page-experimente -->
					<div class="page page-contato" id="CONTATO">
						<div class="container">
							<div class="page-heading">
								<h2 class="page-title h1">Fale com a gente</h2>
								<div class="resumo">
									Utilize um de nossos canais de atendimento para entrar em contato com nossa equipe
								</div> <!-- .resumo -->
							</div> <!-- .page-heading -->
							<div class="page-content">
								<div class="row">
									<div class="col-md-4">
										<div class="panel panel-default">
											<div class="panel-body">
												<h3 class="panel-title">Contatos</h3>
												<div class="media">
													<span class="pull-left"><span class="ycon-phone-gray"></span></span>
													<div class="media-body">
														<span class="text-phone-lg"><span>91.</span> 3085 0817</span>
													</div> <!-- .media-body -->
												</div> <!-- .media -->
												<div class="media">
													<span class="pull-left"><span class="ycon-mail-gray"></span></span>
													<div class="media-body">
														<a href="mailto:contato@diariodeclasse.com" title="Envie-nos um e-mail!">contato@diariodeclasse.com</a>
													</div> <!-- .media-body -->
												</div> <!-- .media -->
											</div> <!-- .panel-body -->
											<div class="panel-body">
												<h3 class="panel-title">Redes sociais</h3>
												<div class="social-central">
													<a href="#" title="Acesse nosso Facebook" target="_blank"><span class="sr-only">Facebook</span><span class="fa fa-facebook"></span></a>
													<a href="#" title="Acesse nosso Twitter" target="_blank"><span class="sr-only">Twitter</span><span class="fa fa-twitter"></span></a>
													<a href="#" title="Acesse nosso Instagram" target="_blank"><span class="sr-only">Instagram</span><span class="fa fa-instagram"></span></a>
												</div> <!-- .social-central -->
											</div> <!-- .panel-body -->
										</div> <!--.panel-default -->
									</div> <!-- .col-md-4 -->
									<div class="col-md-8">
										<div class="form-contato">
											<form action="" method="POST" class="" id="FRM-CONTATO">
												<div class="form-content">
													<span class="ycon-losango arrow"></span>
													<div class="form-group">
														<label  class="sr-only">Escreva sua mensagem</label>
														<textarea class="form-control mensagem" rows="6" name="MENSAGEM" id="MENSAGEM" placeholder="Escreva sua mensagem:"></textarea>
													</div> <!-- .form-group -->
													<div class="form-group">
														<label  class="sr-only">E-mail:</label>
														<input type="text" class="form-control" placeholder="E-mail:" name="EMAIL" id="EMAIL" value=""  />
													</div> <!-- .form-group -->
													<div class="clearfix">
														<div class="form-group half">
															<label  class="sr-only">Nome:</label>
															<input type="text" class="form-control" placeholder="Nome:" name="NOME" id="NOME" value="" />
														</div> <!-- .form-group -->
														<div class="form-group half">
															<label  class="sr-only">Telefone:</label>
															<input type="text" class="form-control" placeholder="Telefone:" name="TELEFONE" id="TELEFONE" value="" />
														</div> <!-- .form-group -->
													</div>
												</div> <!-- .form-content -->
												<button type="submit" class="btn btn-info btn-lg btn-block">Enviar</button>
											</form>
										</div> <!-- .form-contato -->
									</div> <!-- .col-md-8 -->
								</div> <!-- .row -->
							</div> <!-- .page-content -->
						</div> <!-- .container -->
					</div> <!-- .page-contato -->
				</div> <!-- .site-central -->
			</div> <!-- .extra-central -->
			<footer>
				<div class="extra-footer">
					<div class="site-footer">
						<div class="container">
							<div class="row">
								<div class="col-md-8">
									<ul class="menu-footer">
										<li><a href="#HOME" title="">Início</a></li>
										<li><a href="#SOBRE" title="">Sobre</a></li>
										<li><a href="#VANTAGENS" title="">Vantagens</a></li>
										<li><a href="#EXPERIMENTE" title="">Experimente</a></li>
										<li><a href="#CONTATO" title="">Contato</a></li>
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
													Tudo que você precisa para gerenciar suas turmas. Baixe agora o aplicativo no seu <a href="#" target="_blank" title="Tenha o aplicativo no seu smartphone!">Android</a> ou <a href="#" target="_blank" title="Tenha o aplicativo em seu Iphone ou Ipad!">iOS</a>.
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
								<form action="action_login.php" method="post">
									<div class="form-group">
										<label class="sr-only">Seu e-mail</label>
										<input type="text" class="form-control login" name="inputEmail" value="<?=$varEmail;?>" placeholder="Seu e-mail:">
									</div> <!-- .form-group -->
									<div class="form-group">
										<label class="sr-only">Senha</label>
										<input type="password" class="form-control senha" name="inputPassword" value="<?=$varSenha;?>" placeholder="Senha:">
									</div> <!-- .form-group -->
									<p>
										<a href="#" title="Inicie o processo de recuperação da sua senha!"><small>Esqueceu sua senha?</small></a>
									</p>
									<button type="submit" name="formSubmit" value="Submit"class="btn btn-info btn-lg btn-block btn-rounded">Fazer login</button>
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
