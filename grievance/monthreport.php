<?php
@session_start();
if(!empty($_SESSION['user1'])){
if(!empty($_SESSION['user1']) && !empty($_SESSION['dept']) && $_SESSION['user1'] != 'vc' && $_SESSION['user1'] != 'rector' && $_SESSION['user1'] != 'registrar')
{
require('header.php');
require('register.class.php');
$vg=new Register();
$result=$vg->getmonthlystatus($_POST['month'],$_SESSION['dept']);
require('adminnavbar.php');
?>
<div class="">
        <br>
        <div class="row"> 
<div class="col-md-4">
</div>
<div class="col-md-4">
        <!-- Default form register -->
<form class="text-center border border-light p-5" action="monthreport.php" method="POST">
<div class="form-row mb-4">
        <div class="col">
            <select name="month" class="form-control" required>
            	 <option value="" disabled selected>Select month</option>	
                  <option value=1>January</option>
                 <option value=2>February</option>	
                 <option value=3>March</option>
                 <option value=4>April</option>	
                 <option value=5>May</option>
                 <option value=6>June</option>
                 <option value=7>July</option>
                 <option value=8>August</option>	                  
                 <option value=9>September</option>
                 <option value=10>October</option>	
                 <option value=11>November</option>
                 <option value=12>December</option>		
           
            </select>
    </div>
    </div>

<button class="btn btn-info btn-block my-4" type="submit">Submit</button>
</form>
</div>
</div>
</div>
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
     <!-- <td><?php //echo nl2br($res['complaint']); ?></td>-->
    <td><?php echo $result[$i]['status']; ?></td>

    </tr>

       </form>
    
<?php }} ?>
  </tbody>

</table>
</div>
<br>
<br>
</div>
<?php
}
else{
  require('header.php');
require('register.class.php');
$vg=new Register();
$result=$vg->getmonthlystatusAdmin($_POST["month"]);
require('adminnavbar.php');
?>
<div class="">
        <br>
        <div class="row"> 
<div class="col-md-4">
</div>
<div class="col-md-4">
        <!-- Default form register -->
<form class="text-center border border-light p-5" action="monthreport.php" method="POST">
<div class="form-row mb-4">
        <div class="col">
            <select name="month" class="form-control" required>
            	 <option value="" disabled selected>Select month</option>	
                  <option value=1>January</option>
                 <option value=2>February</option>	
                 <option value=3>March</option>
                 <option value=4>April</option>	
                 <option value=5>May</option>
                 <option value=6>June</option>
                 <option value=7>July</option>
                 <option value=8>August</option>	                  
                 <option value=9>September</option>
                 <option value=10>October</option>	
                 <option value=11>November</option>
                 <option value=12>December</option>		
           
            </select>
    </div>
    </div>

<button class="btn btn-info btn-block my-4" type="submit">Submit</button>
</form>
</div>
</div>
</div>
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
     <!-- <td><?php //echo nl2br($res['complaint']); ?></td>-->
    <td><?php echo $result[$i]['status']; ?></td>

    </tr>

       </form>
    
<?php }} ?>
  </tbody>

</table>
</div>
<br>
<br>
</div>
<?php
}
require_once("footer.php");
}
else{
  header('Location: admin.php');
}
?>
