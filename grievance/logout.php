<?php
@session_start();
if(!empty($_SESSION['user']))
{
  unset($_SESSION['user']);
  session_destroy();
  
}
  header('Location: index.php');

 ?>
