<?php
@session_start();

if(!empty($_SESSION['user']))
{

$succ = "";
$err = "";
if(!empty($_POST["pwd"]) && !empty($_POST["npwd"]) && !empty($_POST["cnpwd"])){
    require_once("register.class.php");
    $obj=new Register();
    $x=$obj->changepwd($_SESSION["user"],$_POST["pwd"],$_POST["npwd"]);
    if($x==1){
		$succ="Your Password Changed Successfully";
	}else{
		$err = "Invalid Password";
	}
}


require('header.php');
                    require_once("navbar.php");
?>


        <div class="container-fluid row"> 
<div class="col-md-4">
</div>
<div class="col-md-4 p-5">
        <!-- Default form register -->
<form
 class="text-center border border-light" action="updatepwd.php" method="POST" onsubmit="validate()">

    <p class="h4 mb-4">Update Password</p>


    <!-- Existing Password -->
    <input type="password" id="pwd" class="form-control" placeholder="Existing Password" aria-describedby="defaultRegisterFormPasswordHelpBlock" name="pwd" required>
    <br />
    <!-- New Password -->
    <input type="password" id="npwd" class="form-control" placeholder="New Password" aria-describedby="defaultRegisterFormPasswordHelpBlock" name="npwd" required>
    <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
        At least 8 characters and 1 digit
    </small>
    
    <input type="password" id="cnpwd" class="form-control" placeholder="Confirm New Password" name="cnpwd" required>
    

    <!-- Sign up button -->
    <button class="btn btn-info my-4 btn-block" type="submit">Update Password</button>
<hr />
</form>
<!-- Default form register -->
<?php
    if(!empty($err)){
        echo '<div class="alert alert-danger">'.$err.'</div>';
    }elseif(!empty($succ)){
        echo '<div class="alert alert-success">'.$succ.'</div>';
    }
?>

</div>
<div class="col-md-4">
</div>
</div>

<?php
require_once("footer.php");
} else{
    header('Location: index.php');
}
?>

