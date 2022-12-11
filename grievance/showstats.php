<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>JNTUA CEA</title>
    <link rel="icon" href="favicon.png" sizes="16x16" type="image/png" />
		<!--<script src="htttps://code.jquery.com/jquery-2.1.3.min.js"></script>-->
    <!-- Bootstrap -->
    <link href="style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="print" href="style.css">
<style type="text/css">
/* Sticky footer styles
-------------------------------------------------- */
html {
  position: relative;
  min-height: 100%;
}
body {
  /* Margin bottom by footer height */
  margin-bottom: 60px;
  /*background-color: #DFE2DB;
    background-color: #FDF3E7;*/
    background-color: #F5F3EE;
}
.footer {
  position: absolute;
  bottom: 0;
  width: 100%;
  /* Set the fixed height of the footer here */
  height: 60px;
  background-color: #f5f5f5;
}

.container .text-muted {
  margin: 20px 0;
}

.labelapply3{
    padding-top: 1px !important;
}

.doprint{
display: none;
}
.vl {
margin-top:10px;
    margin-left:10px;
    margin-right:10px;
  border-left: 2px solid black;
  height: 60px;
}
.head{
    margin-top:20px;
    
}
#stye{
    color:#17a2b8;
    margin-left:40px;
}
@media print {
   .dontprint { display: none !important; }
   .doprint { display: block !important; }
}


h1 {
  text-transform: uppercase;
  font-size: 4em;
}

.card {
  width: 300px;
  height: 30px;
  background-color: transparent;
          transform: rotateY(50deg);
  box-shadow: -6px 5px 13px 2px rgba(0, 0, 0, 0.25);
	transition: all 1s ease;
  color: transparent;
}
.card:hover {
  width: 300px;
  height: 30px;
  background-color: transparent;
          transform: rotateY(0deg);
  box-shadow: 0px 0px 36px 2px rgba(0, 0, 0, 0.25);
  color: black;
}

</style>


    <!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.5/css/mdb.min.css" rel="stylesheet">


</head>
<body>
  <div class="container" style="     -webkit-box-shadow: 0 10px 6px -6px #999;
        -moz-box-shadow: 0 10px 6px -6px #999;
             box-shadow: 0 10px 6px -6px #999;margin-bottom:10px margin-right:20px; background-color: white;">
  <div class="row" >
    <a  href="#"><img src="jntuaceatp.png" width="80px" height="80px"></a>
    <div class="vl"></div>
    <div class="head"><h1>JNTUACEA <span id="stye"> ONLINE GRIEVANCE SYSTEM</span></h1>
    </div>
    </div>
</div>
<br />
<?php

$pending = 0;
$processing = 0;
$resolved = 0;
$invalid = 0;

require_once("grievance.class.php");
$gr_obj = new Grievance();
$res = $gr_obj->grievanceStats();
if($res['status']==1){
    if(!empty($res['new'])){
        $pending = $res['new'];
    }
    if(!empty($res['processing'])){
        $processing = $res['processing'];
    }    
    if(!empty($res['solved'])){
        $resolved = $res['solved'];
    }    
    if(!empty($res['rejected'])){
        $invalid = $res['rejected'];
    }
}
$total = $pending+$processing+$resolved+$invalid;

?>

    <div class="container">
        <a href="./" class="btn btn-default">Grievance Home</a>
        <h3 align="center">JNTUACEA Grievance Statistics</h3>
        <div class="row">
                <div class="col-md-3 col-sm-6 py-2">
                    <div class="card bg-success text-white h-100">
                        <div class="card-body bg-success">
                            <div class="rotate">
                                <i class="fa fa-battery-full fa-4x"></i>
                            </div>
                            <h6 class="text-uppercase">Resolved</h6>
                            <h1 class="display-4"><?php echo $resolved; ?></h1>
                        </div>
                    </div>
                </div>
    
                <div class="col-md-3 col-sm-6 py-2">
                    <div class="card bg-success text-white h-100">
                        <div class="card-body bg-primary">
                            <div class="rotate">
                                <i class="fa fa-battery-half fa-4x"></i>
                            </div>
                            <h6 class="text-uppercase">Under Process</h6>
                            <h1 class="display-4"><?php echo $processing; ?></h1>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6 py-2">
                    <div class="card bg-success text-white h-100">
                        <div class="card-body bg-default">
                            <div class="rotate">
                                <i class="fa fa-battery-empty fa-4x"></i>
                            </div>
                            <h6 class="text-uppercase">Pending/New</h6>
                            <h1 class="display-4"><?php echo $pending; ?></h1>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6 py-2">
                    <div class="card bg-success text-white h-100">
                        <div class="card-body bg-warning">
                            <div class="rotate">
                                <i class="fa fa-times fa-4x"></i>
                            </div>
                            <h6 class="text-uppercase">Invalid</h6>
                            <h1 class="display-4"><?php echo $invalid; ?></h1>
                        </div>
                    </div>
                </div>
        </div>
    </div>

  

<?php
require_once("footer.php");
?>