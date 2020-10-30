<?php
session_start();
error_reporting(0);
$var=$_SESSION['usuar'];
var_dump($var);
if($var === null ){
  echo'no puede entrar aqui';
  die();
}
?>