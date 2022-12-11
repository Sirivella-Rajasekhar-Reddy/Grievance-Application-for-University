<?php
@session_start();

if( !empty($_POST['complaintid']) && !empty($_POST['dept']) && isset($_POST['remarks']))
{

               $complaintid = $_POST['complaintid'];
               $dept = $_POST['dept'];
                $remarks = $_POST['remarks'];
                  

               require_once("register.class.php");

                  $reg = new Register();
                  $res = $reg->fwdGrievance($complaintid,$dept,$remarks);
                  if($res==1){
                    header('Location: viewgrievances.php');
                  }
                  
                        
                  
                 
}                 
else
{

 header('Location: admin.php');
}
?>



