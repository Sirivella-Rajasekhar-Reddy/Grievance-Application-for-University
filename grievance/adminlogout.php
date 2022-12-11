<?php
@session_start();
if(!empty($_SESSION['user1']))
{
  unset($_SESSION['user1']);
  session_destroy();
  
}
  header('Location: admin.php');

 ?>
