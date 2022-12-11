<?php
@session_start();

$err = "";
if(!empty($_POST["username"]) && !empty($_POST["pwd"])){
	require_once("register.class.php");
	$obj = new Register();	
	$res = $obj->checkLogin($_POST["username"],$_POST["pwd"]);
    
	if($res==1){
		$_SESSION["user"] = $_POST["username"];
        $_SESSION["gender"] = $_POST["gender"];
		header('Location: studenthome.php');
	}else{
		$err = "Invalid Credentials";
	}
}

require_once('header.php');
?>

    <!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.5/css/mdb.min.css" rel="stylesheet">

<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.5/js/mdb.min.js"></script>

  <!-- Default form login -->
  <div class="container">
    <br>
  <div class="row"> 
<div class="col-md-4">
</div>
<div class="col-md-4">

<form class="text-center border border-light p-5" action="./" method="POST">

    <p class="h4 mb-4">Sign In</p>

    <!-- Email -->
    <input type="text" id="username" class="form-control mb-4" placeholder="Roll Number/ Username" name="username" required>

    <!-- Password -->
    <input type="password" id="pwd" class="form-control mb-4" placeholder="Password" name="pwd" required>
    

    <!-- Sign in button -->
    <button class="btn btn-info btn-block my-4" type="submit">Sign in</button>

    <!-- Register -->
    <p>Not a member?
        <a href="register.php">Register</a>
    </p>
    <a href ="User_Manual.pdf" target="_blank"> Click here to view the user manual </a>
    

</form>
<!-- Default form login -->
<?php
    if(!empty($err)){
        echo '<div class="alert alert-danger">'.$err.'</div>';
    }
?>
</div>

</div>

<div class="container">
    <br>
        <h5 align="center" class="text-success">
Grievance can save life, job and bring better opportunities.<br><br>
It can bring change in the system....<br><br>
Prevents minor complaints or disagreements from spiraling into something more serious<br><br>
</h5>
        
</div>

</div>


<?php
require_once("footer.php");
?>
