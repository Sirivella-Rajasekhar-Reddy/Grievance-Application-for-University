<?php
@session_start();
if(!empty($_SESSION['user1']) && !empty($_SESSION['dept']) && $_SESSION['user1'] != 'vc' && $_SESSION['user1'] != 'rector' && $_SESSION['user1'] != 'registrar')
{
require('header.php');
require('register.class.php');
$vg=new Register();
$result=$vg->viewAllGrievByStatus("processing",$_SESSION['dept']);
require('adminnavbar.php');
?>

<br>
<br>
<div class="container">
    <ul class="nav nav-tabs">
      <li class="nav-item">
        <a class="nav-link" href="viewgrievances.php">New</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="#">Under Process</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="solvedgriev.php">Resolved</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="rejectedgriev.php">Not Considered</a>
      </li>
    </ul>

<div class="card">
    <h4 align="center">Under Process Grievances</h4>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ComplaintID</th>
      <th scope="col">Department</th>
      <th scope="col">Dated</th>
      <th scope="col">Status</th>
      <th scope="col">View/Update</th>
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
</div>
<?php
}
else{
  require('header.php');
require('register.class.php');
$vg=new Register();
$result=$vg->viewAllGrievByStatusAdmin("processing");
require('adminnavbar.php');
?>

<br>
<br>
<div class="container">
    <ul class="nav nav-tabs">
      <li class="nav-item">
        <a class="nav-link" href="viewgrievances.php">New</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="#">Under Process</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="solvedgriev.php">Resolved</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="rejectedgriev.php">Not Considered</a>
      </li>
    </ul>

<div class="card">
    <h4 align="center">Under Process Grievances</h4>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ComplaintID</th>
      <th scope="col">Department</th>
      <th scope="col">Dated</th>
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
      </td>      
      </tr>
      
<?php }}?>
  </tbody>

</table>
</div>
</div>
<?php
}
?>