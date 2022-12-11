<?php
@session_start();
if(!empty($_SESSION['user1']))
{
if(!empty($_POST['complaintid']) && !empty($_POST['forward']) && $_POST['forward']=="Forward"){
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


<form action ="forward.php" method="POST">
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
	<div class="col-md-3" style="text-align:right">Previous Department:</div>
	<div class="col-md-6"> <?php echo $result['dept']; ?></div>
	<div class="col-md-3"></div>
</div>
<br>
<div class="row">
	<div class="col-md-3" style="text-align:right">Select Department:</div>
	<div class="col-md-6">
	
	<select class="form-control" name="dept" required>
            <option value="Women Empowerment Cell (WEC)" <?php if($result['dept']=="Women Empowerment Cell (WEC)"){ echo "selected"; } ?>>Women Empowerment Cell (WEC)</option>
            <option value="Academics & planning" <?php if($result['dept']=="Academics & planning"){ echo "selected"; } ?> > Academics & planning </option>
			<option value="Academic Audit"<?php if($result['dept']=="Academic Audit"){ echo "selected"; } ?>>Academic Audit</option>
            <option value="Admissions"<?php if($result['dept']=="Admissions"){ echo "selected"; } ?>>Admissions</option>
			<option value="Examination Branch"<?php if($result['dept']=="Academic Audit"){ echo "selected"; } ?>>Examination Branch</option>
            <option value="Research & Development" <?php if($result['dept']=="Research & Development"){ echo "selected"; } ?> >Research & Development</option>
			<option value="Industrial Relations & Placements(IRP)"<?php if($result['dept']=="Industrial Relations & Placements(IRP)"){ echo "selected"; } ?>>Industrial Relations & Placements(IRP)</option>
            <option value="Industrial Consultancy Services(ICS)"<?php if($result['dept']=="Industrial Consultancy Services(ICS)"){ echo "selected"; } ?>>Industrial Consultancy Services(ICS)</option>
            <option value="Foreign Affairs & Alumni Matters"<?php if($result['dept']=="Foreign Affairs & Alumni Matters"){ echo "selected"; } ?>>Foreign Affairs & Alumni Matters</option>
            <option value="Faculty Development"<?php if($result['dept']=="Faculty Development"){ echo "selected"; } ?>>Faculty Development</option>
			<option value="Internal Quality Assurance Cell (IQAC)"<?php if($result['dept']=="Internal Quality Assurance Cell (IQAC)"){ echo "selected"; } ?>>Internal Quality Assurance Cell (IQAC)</option>
			<option value="Sponsored Research"<?php if($result['dept']=="Sponsored Research"){ echo "selected"; } ?>>Sponsored Research</option>
            <option value="Oil technology & Pharmaceutical  Research institution (OTPRI)"<?php if($result['dept']=="Oil technology & Pharmaceutical  Research institution (OTPRI)"){ echo "selected"; } ?>> Oil technology & Pharmaceutical  Research institution (OTPRI)</option>
            <option value="SC/ST cell"<?php if($result['dept']=="SC/ST cell"){ echo "selected"; } ?>>SC/ST cell</option>
           <option value="BC cell"<?php if($result['dept']=="BC cell"){ echo "selected"; } ?>>BC cell</option>
           <option value="Principal,JNTUACE Anantapur"<?php if($result['dept']=="Principal,JNTUACE Anantapur"){ echo "selected"; } ?>>Principal,JNTUACE Anantapur</option>
           <option value="Principal,JNTUACE Pulivendula"<?php if($result['dept']=="Principal,JNTUACE Pulivendula"){ echo "selected"; } ?>>Principal,JNTUACE Pulivendula</option>
           <option value="Principal,JNTUACE Kalikiri"<?php if($result['dept']=="Principal,JNTUACE Kalikiri"){ echo "selected"; } ?>>Principal,JNTUACE Kalikiri</option>
           <option value="HOD ,School of Management Science Anantapur"<?php if($result['dept']=="HOD ,School of Management Science Anantapur"){ echo "selected"; } ?>>HOD ,School of Management Science Anantapur</option>
		   <option value="General"<?php if($result['dept']=="General"){ echo "selected"; } ?>>General</option>
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
	<div class="col-md-6"><input type="submit" value="Forward" class="btn btn-primary"></div>
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