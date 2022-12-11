<?php
@session_start();
if(!empty($_SESSION['user1'])){
if(!empty($_SESSION['user1']) && !empty($_SESSION['dept']) && $_SESSION['user1'] != 'vc' && $_SESSION['user1'] != 'rector' && $_SESSION['user1'] != 'registrar')
{
    require_once("register.class.php");
	$obj = new Register();
	$res=$obj->statCounter($_SESSION['dept']);
    $cnt1=0;$cnt2=0;$cnt3=0;$cnt4=0;
    for($i=0;$i<=$res['cnt'];$i++){
        if($res[$i]['status']=="new"){
            $cnt1++;
        }
        elseif($res[$i]['status']=="processing"){
            $cnt2++;
        }
        elseif($res[$i]['status']=="solved"){
            $cnt3++;
        }
        elseif($res[$i]['status']=="rejected"){
            $cnt4++;
        }
    }
require('header.php');
require('adminnavbar.php');
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Grievence Stat Counter</title>
  <!-- <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'> -->
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css'><link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<!-- start count stats -->

<div class="container">
    <br />
    <div class="card"><h2 align="center"> Welcome To <?php echo $_SESSION['dept'] ?> Dept</h2>
    </div>
</div>
<section id="counter-stats" class="wow fadeInRight" data-wow-duration="1.4s">
	<div class="container">
		<div class="row">
           <div class="col-lg-3 stats">
				<i class="fa fa-envelope" aria-hidden="true"></i>
				<div class="counting" data-count="<?php echo $cnt1;?>">0</div>
				<h5>New</h5>
			</div>
			<div class="col-lg-3 stats">
				<i class="fa fa-eye" aria-hidden="true"></i>
				<div class="counting" data-count="<?php echo $cnt2;?>">0</div>
				<h5>Under Process</h5>
			</div>

            <div class="col-lg-3 stats">
				<i class="fa fa-check" aria-hidden="true"></i>
				<div class="counting" data-count="<?php echo $cnt3;?>">0</div>
				<h5>Resolved</h5>
			</div>
			<div class="col-lg-3 stats">
				<i class="fa fa-remove" aria-hidden="true"></i>
				<div class="counting" data-count="<?php echo $cnt4;?>">0</div>
				<h5>Invalid</h5>
			</div>


		</div>
		<!-- end row -->
	</div>
	<!-- end container -->

</section>


<!-- end cont stats -->
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/wow/0.1.12/wow.min.js'></script><script  src="./script.js"></script>

</body>
</html>





<?php
}
else{

    require_once("register.class.php");
	$obj = new Register();
	$res=$obj->statCounterAdmin();
    $cnt1=0;$cnt2=0;$cnt3=0;$cnt4=0;
    for($i=0;$i<=$res['cnt'];$i++){
        if($res[$i]['status']=="new"){
            $cnt1++;
        }
        elseif($res[$i]['status']=="processing"){
            $cnt2++;
        }
        elseif($res[$i]['status']=="solved"){
            $cnt3++;
        }
        elseif($res[$i]['status']=="rejected"){
            $cnt4++;
        }
    }
    $cntall=($cnt1+$cnt2+$cnt3+$cnt4)/4;
	if(!empty($_POST['dept'])){
        $res1=$obj->statCounterAdminDept($_POST['dept']);
        $result=$obj->getStatusAdmin($_POST['dept']);
        $cnt5=0;$cnt6=0;$cnt7=0;$cnt8=0;
        for($i=0;$i<=$res1['cnt'];$i++){
            if($res1[$i]['status']=="new"){
                $cnt5++;
            }
            elseif($res1[$i]['status']=="processing"){
                $cnt6++;
            }
            elseif($res1[$i]['status']=="solved"){
                $cnt7++;
            }
            elseif($res1[$i]['status']=="rejected"){
                $cnt8++;
            }
        }
    }
require('header.php');
require('adminnavbar.php');
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Grievence Stat Counter</title>
  <!-- <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'> -->
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css'><link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<!-- start count stats -->

<div class="container">
    <br />
    <div class="card"><h2 align="center">Welcome To <?php if($_SESSION['user1']=="vc"){ echo "Vice Chancellor";}else{ echo $_SESSION['user1'];} ?></h2>
    </div>
</div>
<section id="counter-stats" class="wow fadeInRight" data-wow-duration="<?php echo $cntall ?>">
	<div class="container">
		<div class="row">
           <div class="col-lg-3 stats">
				<i class="fa fa-envelope" aria-hidden="true"></i>
				<div class="counting" data-count="<?php echo $cnt1;?>">0</div>
				<h5>New</h5>
			</div>
			<div class="col-lg-3 stats">
				<i class="fa fa-eye" aria-hidden="true"></i>
				<div class="counting" data-count="<?php echo $cnt2;?>">0</div>
				<h5>Under Process</h5>
			</div>

            <div class="col-lg-3 stats">
				<i class="fa fa-check" aria-hidden="true"></i>
				<div class="counting" data-count="<?php echo $cnt3;?>">0</div>
				<h5>Resolved</h5>
			</div>
			<div class="col-lg-3 stats">
				<i class="fa fa-remove" aria-hidden="true"></i>
				<div class="counting" data-count="<?php echo $cnt4;?>">0</div>
				<h5>Not Considered</h5>
			</div>


		</div>
		<!-- end row -->
	</div>
	<!-- end container -->
	

</section>
<div class="container">
<div class="">
        <br>
        <div class="row"> 
<div class="col-md-4">
</div>
<div class="col-md-4">
        <!-- Default form register -->
<form class="text-center border border-light p-5" action="adminhome.php" method="POST">
<div class="form-row mb-4">
        <div class="col">
		<select class="form-control" name="dept" required>
        <option value="" disabled selected>Select Department</option>
            <option value="Women Empowerment Cell (WEC)">Women Empowerment Cell (WEC)</option>
            <option value="Academics & planning">Academics & planning</option>
			<option value="Academic Audit">Academic Audit</option>
            <option value="Admissions">Admissions</option>
			<option value="Examination Branch">Examination Branch</option>
            <option value="Research & Development">Research & Development</option>
			<option value="Industrial Relations & Placements(IRP)">Industrial Relations & Placements(IRP)</option>
            <option value="Industrial Consultancy Services(ICS)">Industrial Consultancy Services(ICS)</option>
            <option value="Foreign Affairs & Alumni Matters">Foreign Affairs & Alumni Matters</option>
            <option value="Faculty Development">Faculty Development</option>
			<option value="Internal Quality Assurance Cell (IQAC)">Internal Quality Assurance Cell (IQAC)</option>
			<option value="Sponsored Research">Sponsored Research</option>
            <option value="Oil technology & Pharmaceutical  Research institution (OTPRI)"> Oil technology & Pharmaceutical  Research institution (OTPRI)</option>
            <option value="SC/ST cell">SC/ST cell</option>
           <option value="BC cell">BC cell</option>
           <option value="Principal,JNTUACE Anantapur">Principal,JNTUACE Anantapur</option>
           <option value="Principal,JNTUACE Pulivendula">Principal,JNTUACE Pulivendula</option>
           <option value="Principal,JNTUACE Kalikiri">Principal,JNTUACE Kalikiri</option>
           <option value="HOD ,School of Management Science Anantapur">HOD ,School of Management Science Anantapur</option>
           <option value="General">General</option>

	   </select>
    </div>
    </div>

<button class="btn btn-info btn-block my-4" type="submit">Submit</button>
</form>
</div>
</div>
</div>
<!-- <section id="counter-stats" class="wow fadeInRight"> -->
<div class="container">
<div class="card">
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Department</th>
      <th scope="col">New</th>
      <th scope="col">Under Process</th>
	  <th scope="col">Resolved</th>
	  <th scope="col">Not Considered</th>
    </tr>
  </thead>
  <tbody>
  <?php 
 if($res1['return_val']==1){?>
    <tr>
      <td><?php echo $_POST['dept'] ?></td>
      <td><?php echo $cnt5 ?></td>
      <td><?php echo $cnt6 ?></td>
	  <td><?php echo $cnt7 ?></td>
      <td><?php echo $cnt8 ?></td>

    </tr>
    
<?php } ?>
  </tbody>

</table>
</div>
</div>
</section>
<br>
<section>
<br>
<br>
<div class="container">
<div class="card">
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Grievance ID</th>
      <th scope="col">Department</th>
      <!--<th scope="col">Complaint</th>-->
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
<?php 
 if($result['return_val']==1){
    for($i=0;$i<=$result['cnt'];$i++){?>
    
   <form action="update.php" method="POST">
    <tr>
      <td><?php echo $result[$i]['complaintid']; ?></td>
      <td><?php echo $result[$i]['dept']; ?></td>
    <td><?php echo $result[$i]['status']; ?></td>

    </tr>

       </form>
    
<?php }} ?>
  </tbody>

</table>
</div>
</div>



<!-- </section> -->
    </div>
<br>
<br>
<br>
<br>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/wow/0.1.12/wow.min.js'></script><script  src="./script.js"></script>

</body>
</html>
<?php
}
require_once("footer.php");
}
else{
    header('Location: admin.php');
}
?>