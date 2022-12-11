<?php
@session_start();
if(!empty($_SESSION['user1'])){
if(!empty($_SESSION['user1']) && !empty($_SESSION['dept']) && $_SESSION['user1'] != 'vc' && $_SESSION['user1'] != 'rector' && $_SESSION['user1'] != 'registrar' && $_SESSION['user1'] != 'sdc')
{
require('header.php');
require('register.class.php');
$vg=new Register();
$result=$vg->viewAllGrievByStatus("new",$_SESSION['dept']);
require('adminnavbar.php');
?>

<br>
<br>
<div class="container">
    <ul class="nav nav-tabs">
      <li class="nav-item">
        <a class="nav-link active" href="#">New</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="processinggriev.php">Under Process</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="solvedgriev.php">Resolved</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="rejectedgriev.php">Not Considered</a>
      </li>
    </ul>

<div class="card">
    <h4 align="center">New Grievances</h4>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Complaint ID</th>
      <th scope="col">Dept</th>
      <th scope="col">Raised On</th>
      <th scope="col">Status</th>
      <th scope="col">View/update/forward</th>
    </tr>
  </thead>
  <tbody>
<?php
if($result['return_val']==1){
 for($i=0;$i<$result['cnt'];$i++){?>
    <tr>
      <td><?php echo $result[$i]['complaintid']; ?></td>
      <td><?php echo $result[$i]['dept']; ?></td>
      <td><?php echo date("d-m-Y",strtotime($result[$i]['raisedon'])); ?></td>
      <td><?php echo $result[$i]['status']; ?></td>
      <td>
      <form action="updateform.php" method="POST" style="display:inline">
            <input type="hidden" value="<?php echo $result[$i]['complaintid']; ?>" name="complaintid"/>
            <input type="hidden" value="<?php echo $result[$i]['dept']; ?>" name="dept"/>
            <input type="hidden" value="<?php echo $result[$i]['complaint']; ?>" name="complaint"/>
          <input type="submit" name="submit" value="Update" class="btn btn-sm btn-primary">
        </form> &nbsp;
        <form action="viewform.php" method="POST" style="display:inline">
            <input type="hidden" value="<?php echo $result[$i]['complaintid']; ?>" name="complaintid"/>
          <input type="submit" name="submit" value="View" class="btn btn-sm btn-success">
        </form>
      </td>      
      </tr>
      
<?php }}?>
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
$result=$vg->viewAllGrievByStatusAdmin("new");
require('adminnavbar.php');
?>

<br>
<br>
<div class="container">
    <ul class="nav nav-tabs">
      <li class="nav-item">
        <a class="nav-link active" href="#">New</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="processinggriev.php">Under Process</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="solvedgriev.php">Resolved</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="rejectedgriev.php">Not Considered</a>
      </li>
    </ul>

<div class="card">
    <h4 align="center">New Grievances</h4>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Complaint ID</th>
      <th scope="col">Dept</th>
      <th scope="col">Raised On</th>
      <th scope="col">Status</th>
      <th scope="col">View</th>
    </tr>
  </thead>
  <tbody>
<?php
if($result['return_val']==1){
 for($i=0;$i<$result['cnt'];$i++){?>
    <tr>
      <td><?php echo $result[$i]['complaintid']; ?></td>
      <td><?php echo $result[$i]['dept']; ?></td>
      <td><?php echo date("d-m-Y",strtotime($result[$i]['raisedon'])); ?></td>
      <td><?php echo $result[$i]['status']; ?></td>
      <td>
        <form action="viewform.php" method="POST" style="display:inline">
            <input type="hidden" value="<?php echo $result[$i]['complaintid']; ?>" name="complaintid"/>
          <input type="submit" name="submit" value="View" class="btn btn-sm btn-success">
        </form>
        <?php
        if($_SESSION['user1']=='sdc' || $_SESSION['user1']=='registrar'){
        ?>
        <form action="forwardform.php" method="POST" style="display:inline">
            <input type="hidden" value="<?php echo $result[$i]['complaintid']; ?>" name="complaintid"/>
            <input type="hidden" value="<?php echo $result[$i]['dept']; ?>" name="dept"/>
            <input type="hidden" value="<?php echo $result[$i]['complaint']; ?>" name="complaint"/>
          <input type="submit" name="forward" value="Forward" class="btn btn-sm btn-primary">
        </form> &nbsp;
        <?php
        }
        ?>
      </td>      
      </tr>
      
<?php }}?>
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