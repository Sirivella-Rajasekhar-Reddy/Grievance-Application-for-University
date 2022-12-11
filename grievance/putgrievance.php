<?php
@session_start();
if(!empty($_SESSION['user']))
{

require('header.php');
require_once("navbar.php");

@session_start();

if(!empty($_POST['dept']) && !empty($_POST['complaint']))
{
	
              $username = $_SESSION['user'];
              $gender = $_SESSION['gender'];
               $complaint = $_POST['complaint'];
               $dept = $_POST['dept'];
         
                  
                  

                  require_once("grievance.class.php");

                  $reg = new Grievance();
                  $res = $reg->addGrievance($username,$complaint,$dept);
                  if($res==1)
                  {
?>

        <div class="jumbotron">
      <div class="row">
        <div class="col-md-4">&nbsp;
        </div>
        <div class="col-md-4">
        <?php if($res==1){ echo '<div class="alert alert-success"> Grievance submitted successfully</div>'; } ?>
        </div>
        </div>
        <div class="col-md-4">&nbsp;
        </div>
    </div>

                    <?php
                  }
                  else
                  {
                    echo "fail";
                  }

            

}                 
?>
</body>
</html>

<?php
}

else
{
  header('Location: index.php');
}

?>






