<?php
@session_start();

if( !empty($_POST['complaintid']) && !empty($_POST['status']) && isset($_POST['remarks']))
{

               $complaintid = $_POST['complaintid'];
               $status = $_POST['status'];
                $remarks = $_POST['remarks'];
                  

               require_once("register.class.php");

                  $reg = new Register();
                  $res = $reg->updGrievance($complaintid,$status,$remarks);
                  if($res==1){
                    header('Location: viewgrievances.php');
                  }        
}                 
else
{

 header('Location: admin.php');
}
?>



