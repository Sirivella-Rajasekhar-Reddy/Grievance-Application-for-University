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
                <span style= "font-size:1.2em"><h3 style="text-align:right;">Circulars :</h3>
</span>
</div>
<div class ="col-sm-6" style="text-align:right;">
</div>
</div>
</div>
<div class = "card-body">
    <ul>
        <li>
            <a href ="Regulations.pdf" target="_blank"> AICTE Regulations - Redressal of Grievances </a>
</li>
<br>
<li>
            <a href ="ugc_regulation.pdf" target="_blank"> UGC Regulations - Redressal of Grievances </a>
</li>
</ul>
</div>
</div>
</div>
<?php 
require_once('footer.php');
}
else
{
    header('Location: index.php');
}

?>