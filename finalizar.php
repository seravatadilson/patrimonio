<?php
session_start();
$_SESSION["siape"]="";
$_SESSION["senha"]="";
$_SESSION["admin"]="";
echo "<script> alert('Sessão Finalizada!!'); location.href='index.html';</script>";
session_destroy();
exit
 ?>
