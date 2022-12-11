<?php
@session_start();
if(!empty($_SESSION['user']))
{
require('header.php');
require('navbar.php');
?>
<br />



<div class="container">
<div class= "card">
    <div class="header">
        <div class = "row">
            <div class ="col-sm-6">
                <span style= "font-size:1.2em"><h3 style="text-align:right;"><b>Instructions :</b></h3>
</span>
</div>

<div class ="col-sm-6" style="text-align:right;">
</div>
</div>
</div>

<div class = "card-body">
    <ul>
        <li>To submit your grievance click on the "SUBMIT GRIEVANCE" option  present in the navbar.</li>
        <li>Select the department you wish to lodge the complain to and enter a detailed description of your complaint/grievance.</li>
        <li>To view the status of your complaint click on the "VIEW GRIEVANCE" option from the navbar. </li>
        <li>The status of your complaint will be visible and remarks from the admin regarding your complaint will also be displayed.</li>
        <li>To update your password click on the "UPDATE PASSWORD " option in the navbar and enter your existing password along with the new password and confirm your password.</li>
        <li><b>For any further technical queries contact :</b></br>
Prof. A. Sureshbabu</br>
Director,</br>
Software Development Centre</br>
JNTU Anantapur -515002, Andhra Pradesh, India</br>
Email: sdc@jntua.ac.in
</li>
</ul>
</div>
</div>

</div>
</br>

<?php
require_once('footer.php');
}
else
{
    header('Location: index.php');
}

?>