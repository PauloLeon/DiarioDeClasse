 <?php
  $redirecionar = "../DiarioDeClasse/index1.php";
  session_start();
  $_SESSION = array();
  if (isset($_COOKIE[session_name()])) {
	  setcookie(session_name(), '', time()-42000, '/');
  }
  session_destroy();
	//header('location:'.$redirecionar);
  echo '<meta HTTP-EQUIV="Refresh" CONTENT="0; URL=../DiarioDeClasse/index1.php">';
 ?>
