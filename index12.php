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
	 
	// debug_to_console($_GET['inputEmail2']); 
	 
?>

<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title>Diário de Classe</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="">
      <meta name="author" content="">
      <link href="css/cssEXT.css" rel="stylesheet">
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <script type="text/javascript" src="js/jquery-min.js"></script>
      <script type="text/javascript" src="js/bootstrap.min.js"></script>
   </head>
   <body id="fixed-gear-bikes-for-only-329-id" class="index-template">
      <div class="zopim" __jx__id="___$_4 ___$_4" style="margin: 0px; padding: 0px; border: 0px; overflow: hidden; position: fixed; z-index: 16000001; display: none; width: 216px; height: 71px; bottom: 23px; left: 23px; background: transparent;">
         <iframe frameborder="0" src="javascript:void(document.write('<!DOCTYPE html><html><head><style>html,body{height:100%;width:100%;} *{border:0;padding:0;margin:0;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box}</style></head><body onload=&quot;window.isLoaded = true&quot;></body></html>'), document.close())"
            style="vertical-align: top; position: relative; width: 100%; height: 100%; margin: 0px; overflow: hidden; background-color: transparent;"></iframe>
         <a class="jx_ui_Widget" __jx__id="___$_20" target="zlivechatpopout_undefined"
            href="#" style="position: absolute; width: 100%; height: 100%; top: 0px; left: 0px;"></a>
      </div>
      <div id="body-wrapper" draggable="true">
         <!-- utility-bar -->
         <div class="navbar navbar-default navbar-fixed-top navbar-inverse" style="z-index: 3500;" id="custom-bootstrap-menu">
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
                  
                  
                 <a class="navbar-brand" href="index1.php" draggable="true">Diário de Classe</a>
               </div>
               
               <div class="collapse navbar-collapse navbar-ex1-collapse">
                  <ul class="nav navbar-nav navbar-right">
                     <li class="active">
                        <a href="index.php">Início</a>
                     </li>
                     <li>
                        <a href="Contato.php">Contato</a>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
         <header id="main-header" class="animated-slow fadeIn font-fix-new hidden-xs index"
            style="MARGIN-LEFT: 50%;">
            <!-- Cadastre-se -->
            <script>
			  function teste() {
				  var s = $("#inputEmail2").val();
				  $("#inputEmail").val(s);
				  $("#inputNome").focus();	
			  }
			  $("#open").keyup(function(event){
   				 if(event.keyCode == 13){
       				 $("#open").click();
   				 }
			});
			</script>
            <div id="form-group">
               <h4 style="color:#fff" draggable="true">Comece a experimentar gratuitamente agora</h4>
               <form class="form-horizontal" role="form" >
               <input type="text" id="inputEmail2" placeholder="digite seu email aqui" class="input-lg" style="font-size: 14px;" tabindex=1 >
               <a id="open" class="btn btn-julio btn-sm btn-success" data-toggle="modal" data-target="#myModal"
                  onclick="teste()" style="height: 46px;line-height: 2.9;border-radius: 6px;" tabindex=2 >Abrir Uma Conta</a>
            </form>
            </div>
            <!-- End Cadastre-se -->
         </header>
         <!-- main-header -->	
         <div id="billboard">
            <div class="slide animated-fast fadeIn">
               <img src="imagens/back-to-school5.jpg"
                  alt="Shop the Glow Series" style="top: 0px;">
               <a class="slide-link" title="Shop the Glow Series" href="login.php" tabindex=3>Entrar</a>
            </div>
            <!-- slide -->
         </div>
         <!-- billboard -->
         <script>
			function teste() {
				var s = $("#inputEmail2").val();
				$("#inputEmail").val(s);
					
			}
			 $("#open").keyup(function(event){
   				 if(event.keyCode == 13){
       				 $("#open").click();
   				 }
			});
			
		</script>
         <div id="form-group" class="visible-xs" style=" margin: 10px;">
            <h4 draggable="true">Comece a experimentar gratuitamente agora</h4>
            <form class="form-horizontal" role="form" >
               <input type="text" id="inputEmail2" placeholder="digite seu email aqui" class="input-lg" style="font-size: 14px;text-transform: lowercase;" tabindex=1 >
               <a class="btn btn-julio btn-sm btn-success" data-toggle="modal" data-target="#myModal"
                  onclick="teste()"  style="height: 46px;line-height: 2.9;border-radius: 6px;" tabindex=2 >Abrir Uma Conta</a>
            </form>
         </div>
         <div id="content">
            <div id="spotlights" class="animated-fast fadeInUp">
               <a class="spotlight" href="#" title="Shop by Size">
               <img src="imagens/block2.jpg" alt="Shop by Size" class="retina-on">
               </a>
               <!-- spotlight -->
               <a class="spotlight " href="#" title="Bikes that Give Back">
               <img src="imagens/block3.jpg" alt="Bikes that Give Back" class="retina-on">
               </a>
               <!-- spotlight -->
               <a class="spotlight" href="#" title="Sale">
               <img src="imagens/block4.jpg" alt="Sale" class="retina-on">
               </a>
               <!-- spotlight -->
               <!--<a class="spotlight" href="#" title="Dealer Locator">
               <img src="imagens/block5.jpg" alt="Dealer Locator" class="retina-on">
               </a>-->
               <!-- spotlight -->
            </div>
            <!-- spotlights -->
            <!-- featured-products -->
            <!-- Caro -->
         </div>
         <!-- content -->
         <!--modal-->
        
          <div class="modal fade" style="z-index: 4000;" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">
              <span aria-hidden="true">×</span>
              <span class="sr-only">Close</span>
            </button>
            <h4 class="modal-title" id="myModalLabel" draggable="true">Cadastro de Cliente</h4>
          </div>
          <div class="modal-body">
            <form class="form-horizontal" role="form" draggable="true"
            action="action.php" method="post" >
              <div class="form-group">
                <div class="col-sm-2">
                  <label for="inputNome"  class="control-label">Nome</label>
                </div>
                <div class="col-sm-10">
                  <input type="text" 
                  	class="form-control" 
                   	name="inputNome"
                    id="inputNome"
                    tabindex=1 autofocus 
                    placeholder="Instituição/Professor" 
                    value="<?=$varNome;?>"
                     />
                </div>
              </div>
              <div class="form-group" draggable="true">
                <div class="col-sm-2">
                  <label for="inputEmail"  class="control-label">Email</label>
                </div>
                <div class="col-sm-10">
                  <input type="email"  
                 	class="form-control" 
                    id="inputEmail"
                    tabindex=2 
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
                   id="inputSenha" 
                    name="inputSenha" 
                    tabindex=3
                    placeholder="Senha"
                    value="<?=$varSenha;?>" />
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" id="my-checkbox" name="my-checkbox" data-size="mini"  >Concordo com os
                      <a href="#">Termos do Díario de Classe</a>.</label>
                  </div>
                </div>
              </div>
          </div>
          <div class="modal-footer">
           <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
           <button type="submit" class="btn btn-success" tabindex=4  id="submitlogin" name="formSubmit" value="Submit" >Começar</button> 
          </div>
          </form>
        </div>
      </div>
    </div>
         <!--end modal-->
         
         <footer id="main-footer" draggable="true">
            <div class="container clearfix">
               <div id="connect" draggable="true">
                  <div id="social-links">
                     <h4>Mais Conteúdo? Acesse:</h4>
                     <p style="display: flex;" draggable="true">
                        <img src="imagens/apple19.png" class=" img-responsive" alt="Responsive image"
                           style="display:right">
                        <img src="imagens/android2.png" class="img-responsive" alt="Responsive image"
                           style="height: 16px; width: 16px;">
                        <img src="imagens/facebook55.png" class="img-responsive" alt="Responsive image"
                           style="height: 16px; width: 16px;">
                        <img src="imagens/instagram12.png" class="img-responsive" alt="Responsive image"
                           style="height: 16px; width: 16px;">
                     </p>
                  </div>
                  <div id="mc-footer-subscribe-form">
                     <h4>Assine nossa caixa de email</h4>
                     <form accept-charset="UTF-8" action="/contact"
                        class="contact-form" method="post">
                        <input name="form_type" type="hidden" value="customer">
                        <input name="utf8" type="hidden" value="✓">
                        <input type="hidden" id="contact_tags" name="contact[tags]" value="prospect,newsletter">
                        <input type="text" id="mc-footer-email" name="contact[email]" placeholder="digite seu email aqui">
                        <input type="submit" class="submit" id="mc-footer-subscribe">
                     </form>
                  </div>
               </div>
               <!-- connect -->
               <ul id="footer-nav" draggable="true">
                  <li>
                     <a href="#">Sobre</a>
                     <ul class="dropdown" draggable="true">
                        <li>
                           <a href="#">App Diario de Classe</a>
                        </li>
                        <li>
                           <a href="#">Site Diario de Classe</a>
                        </li>
                        <li>
                           <a href="#">Funcionalidades</a>
                        </li>
                        <li>
                           <a href="#">FAQ</a>
                        </li>
                     </ul>
                     <!-- dropdown -->
                  </li>
                  <li>
                     <!-- dropdown -->
                  </li>
                  <li>
                     <a href="#">Habil Software</a>
                     <ul class="dropdown" draggable="true">
                        <li>
                           <a href="#">A empresa</a>
                        </li>
                        <li>
                           <a href="#">Produtos</a>
                        </li>
                        <li>
                           <a href="#">Videos</a>
                        </li>
                        <li>
                           <a href="#">Contato</a>
                        </li>
                     </ul>
                     <!-- dropdown -->
                  </li>
                  <li>
                     <!-- dropdown -->
                  </li>
                  <li>
                     <a href="#">Suporte</a>
                     <ul class="dropdown" draggable="true">
                        <li>
                           <a href="#">Ajuda</a>
                        </li>
                        <li class="active">
                           <a href="#">855.255.5011</a>
                        </li>
                        <li>
                           <a href="#">support@habilsoftware.com</a>
                        </li>
                        <li>
                           <a href="#">Av. Pedro Alvares Cabral<br>BELEM, CEP 91502</a>
                        </li>
                        <li>
                           <a href="#">Política de Privacidade</a>
                        </li>
                     </ul>
                     <!-- dropdown -->
                  </li>
               </ul>
               <!-- footer-nav -->
               <p id="copyright">©2015 Design by Paulo Rosa
                  <span class="sep">|</span>Versão De demonstração
               </p>
            </div>
            <!-- container -->
         </footer>
         <!-- main-footer -->
      </div>
      <!-- body-wrapper -->
    
   </body>
</html>
<script type="text/javascript" src="js/jquery-min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/plugins/morris/raphael.min.js"></script>
<script src="js/plugins/morris/morris.min.js"></script>
<script src="js/plugins/morris/morris-data.js"></script>
<script>
//para fazer o usuario somente se logar caso o check do termo esteja habilitado.
$("inputSenha").tabIndex = "6";
$("inputEmail").tabIndex = "5";
$("inputNome").tabIndex = "4";
$("[id='submitlogin']").prop('disabled', true);
$("[id='my-checkbox']").click(function() {
	if ($("[id='my-checkbox']").prop('checked')){
		$("[id='submitlogin']").prop('disabled', false);
	}else{
		$("[id='submitlogin']").prop('disabled', true);
	}
});
$('#myModal').on('shown.bs.modal', function () {
  	  				$('#inputNome').focus();
					console.log("oi");
});

</script>