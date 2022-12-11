<?php
@session_start();
if(!empty($_SESSION['user1']) && !empty($_SESSION['dept']))
{
if(!empty($_POST['complaintid']) && !empty($_POST['submit']) && $_POST['submit']=="Update"){
require('header.php');
require('register.class.php');
$vg=new Register();
$result=$vg->getgrievancebygid($_POST['complaintid']);
$resrole=$vg->getRoleById($_POST['complaintid']);
require('adminnavbar.php');

?>

<br>
<br>
<div class="container">

<form action ="update.php" method="POST">
<br>
<br>
<div class="row">
	<div class="col-md-3" style="text-align:right">Grievance id :</div>
	<input type="hidden" class="form-control" name="complaintid" value="<?php echo $result['complaintid']; ?>" />
	<div class="col-md-6"> <?php echo $result['complaintid']; ?></div>
	<div class="col-md-3"></div>
</div>
<br>
<div class="row">
	<div class="col-md-3" style="text-align:right">Grievance By :</div>
	<div class="col-md-6"> <?php if(!empty($resrole['role'])){ echo $resrole['role']; } else{ echo "-"; } ?></div>
	<div class="col-md-3"></div>
</div>
<br>
<div class="row">
	<div class="col-md-3" style="text-align:right">Rollno/Username :</div>
	<div class="col-md-6"> <?php if(!empty($resrole['username'])){ echo $resrole['username']; } else{ echo "-"; } ?></div>
	<div class="col-md-3"></div>
</div>
<br>
<div class="row">
	<div class="col-md-3" style="text-align:right">Email :</div>
	<div class="col-md-6"> <?php if(!empty($resrole['email'])){ echo $resrole['email']; } else{ echo "-"; } ?></div>
	<div class="col-md-3"></div>
</div>
<br>
<div class="row">
	<div class="col-md-3" style="text-align:right">Contact No. :</div>
	<div class="col-md-6"> <?php if(!empty($resrole['phnum'])){ echo $resrole['phnum']; } else{ echo "-"; } ?></div>
	<div class="col-md-3"></div>
</div>
<br>
<div class="row">
	<div class="col-md-3" style="text-align:right">Grievance:</div>
	<div class="col-md-6"><textarea class="form-control" rows="6" cols="50" required readonly><?php echo $result['complaint']; ?></textarea></div>
	<div class="col-md-3"></div>
</div>
<br>


<div class="row">
	<div class="col-md-3" style="text-align:right">Previous Status:</div>
	<div class="col-md-6"> <?php echo $result['status']; ?></div>
	<div class="col-md-3"></div>
</div>
<br>
<div class="row">
	<div class="col-md-3" style="text-align:right">Update Status to:</div>
	<div class="col-md-6">
	  <select class="form-control" name="status" required>
      <option value="processing" <?php if($result['status']=="processing"){ echo "selected"; } ?> >processing</option>
      <option value="solved" <?php if($result['status']=="solved"){ echo "selected"; } ?> >solved</option>
      <option value="rejected" <?php if($result['status']=="rejected"){ echo "selected"; } ?> >rejected</option>
      <option value="new" <?php if($result['status']=="new"){ echo "selected"; } ?> >new</option>
       </select>  
	    
	</div>
	<div class="col-md-3"></div>
</div>
<br>
<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-6"><textarea class="form-control" name="remarks" rows="4" cols="50" placeholder="Enter Remarks (if any)"><?php echo $result['remarks']; ?></textarea></div>
	<div class="col-md-3"></div>
</div>
<br>

<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-6"><input type="submit" value="SUBMIT" class="btn btn-primary"></div>
	<div class="col-md-3"></div>
</div>

</form>
</div>

<?php
require('footer.php');
}else{
    header('Location: viewgrievances.php');
}

}else{
    header('Location: admin.php');
}

?>