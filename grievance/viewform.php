<?php
@session_start();
if(!empty($_SESSION['user1']) && !empty($_SESSION['dept']) && $_SESSION['user1'] != 'vc' && $_SESSION['user1'] != 'rector' && $_SESSION['user1'] != 'registrar')
{
if(!empty($_POST['complaintid']) && !empty($_POST['submit'])){
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
<h4 align="center"> View Grievance</h4>
<div class="row">
	<div class="col-md-3" style="text-align:right">Grievance id :</div>
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
	<div class="col-md-3" style="text-align:right">Grievance Type</div>
	<div class="col-md-6"> <?php echo $result['dept']; ?></div>
	<div class="col-md-3"></div>
</div>
<br>
<div class="row">
	<div class="col-md-3" style="text-align:right">Grievance :</div>
	<div class="col-md-6"><textarea class="form-control" rows="6" cols="50" required readonly><?php echo $result['complaint']; ?></textarea></div>
	<div class="col-md-3"></div>
</div>
<br>


<div class="row">
	<div class="col-md-3" style="text-align:right">Current Status :</div>
	<div class="col-md-6"> <?php echo strtoupper($result['status']); ?></div>
	<div class="col-md-3"></div>
</div>
<br>
<div class="row">
	<div class="col-md-3" style="text-align:right">Remarks</div>
	<div class="col-md-6"><textarea class="form-control" name="remarks" rows="4" cols="50" readonly="readonly" placeholder="No Remarks yet..!"><?php echo $result['remarks']; ?></textarea></div>
	<div class="col-md-3"></div>
</div>
<br>
<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-6">
	    <a href="viewgrievances.php" class="btn btn-sm btn-info">Back to View Grievances</a>
		<form action="updateform.php" method="POST" style="display:inline">
            <input type="hidden" value="<?php echo $result['complaintid']; ?>" name="complaintid"/>
            <input type="hidden" value="<?php echo $result['dept']; ?>" name="dept"/>
            <input type="hidden" value="<?php echo $result['complaint']; ?>" name="complaint"/>
          <input type="submit" name="submit" value="Update" class="btn btn-sm btn-primary float-right">
        </form>
	</div>
	<div class="col-md-3"></div>
</div>
<br>

</div>

<?php
require('footer.php');
}else{
    header('Location: viewgrievances.php');
}

}else{
    if(!empty($_POST['complaintid']) && !empty($_POST['submit'])){
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
		<h4 align="center"> View Grievance</h4>
		<div class="row">
			<div class="col-md-3" style="text-align:right">Grievance id :</div>
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
			<div class="col-md-3" style="text-align:right">Grievance Type</div>
			<div class="col-md-6"> <?php echo $result['dept']; ?></div>
			<div class="col-md-3"></div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-3" style="text-align:right">Grievance :</div>
			<div class="col-md-6"><textarea class="form-control" rows="6" cols="50" required readonly><?php echo $result['complaint']; ?></textarea></div>
			<div class="col-md-3"></div>
		</div>
		<br>
		
		
		<div class="row">
			<div class="col-md-3" style="text-align:right">Current Status :</div>
			<div class="col-md-6"> <?php echo strtoupper($result['status']); ?></div>
			<div class="col-md-3"></div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-3" style="text-align:right">Remarks</div>
			<div class="col-md-6"><textarea class="form-control" name="remarks" rows="4" cols="50" readonly="readonly" placeholder="No Remarks yet..!"><?php echo $result['remarks']; ?></textarea></div>
			<div class="col-md-3"></div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<a href="viewgrievances.php" class="btn btn-sm btn-info">Back to View Grievances</a>
			</div>
			<div class="col-md-3"></div>
		</div>
		<br>
		
		</div>
		
		<?php
		require('footer.php');
	}
}

?>