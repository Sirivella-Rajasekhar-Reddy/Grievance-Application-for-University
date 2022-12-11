<?php

@session_start();
require('header.php');
if(!empty($_SESSION['user']))
{


                    require_once("navbar.php");
                  ?>
             





<!-- Actual code -->
<div class="container">

<form action ="putgrievance.php" method="POST">
<br>

	</div>
	<div class="col-md-3"></div>
</div>
</div>
<br>
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
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
	<div class="col-md-3"></div>
</div>
<br>
<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-6"><textarea class="form-control" name="complaint" rows="6" cols="50" placeholder="Enter your grievance in detail" required></textarea></div>
	<div class="col-md-3"></div>
</div>
<br>
<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-6"><input type="submit" value="SUBMIT" class="btn btn-primary"></div>
	<div class="col-md-3"></div>
</div>

</form>
<br>
<br>
<div class="container">
<div class="col-md-3"></div>
<div class= "card">
    <div class="header">
        <div class = "row">
            <div class ="col-sm-6">
                <span style= "font-size:1.2em"><h3 style="text-align:right;"><b>Note :</b></h3>
</span>
</div>
<div class ="col-sm-6" style="text-align:right;">
</div>
</div>
</div>

<div class = "card-body">
    <ul>
        <li>Please note that if any duplicate or indecent greivances are submitted strict action will be taken by the appropriate authorities.</li>
        <li>Before submitting the grievance select the relevant department fitting to your grievance.</li>
        
</ul>
</div>
</div>

</div>

</div>

</br>
</body>
</html>
<?php
require_once('footer.php');
}
	else {
  header('Location: index.php');
}

