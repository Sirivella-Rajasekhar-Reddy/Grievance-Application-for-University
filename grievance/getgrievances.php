<link rel="stylesheet" href="stepper.css" >
<?php
@session_start();
if(!empty($_SESSION['user']))
{
require('header.php');
require_once("navbar.php");
?>
<div class="container-fluid">
  <div class="row row-offcanvas row-offcanvas-left">
    <div class="col-md-1">&nbsp;
		</div>
		<div class="col-md-10">
      <?php
			  require_once("grievance.class.php");
        $obj=new Grievance();
        $res = $obj->getgrievancebyid($_SESSION['user']);

        if($res['xstatus']==1 && !empty($res['ival'])){
					for($i=0; $i<$res['ival'];$i++){
      ?>
			<br />
      <div class="card">
      <div class="card-body">
      <div class="row">
      <div class="col"><span style="float : left"><b> Complaint : </b><?php echo nl2br($res[$i]['complaint']); ?></span></div>
      <div class="col"><div class="progress" style="max-width: 90%">
		<?php
		if($res[$i]['status']=='new'){
		?>
		<div class="progress-bar progress-bar-stripped" style="width: 25%">New
		</div>
		<?php
		}
		elseif($res[$i]['status']=='processing'){
		?>
		<div class="progress-bar bg-warning progress-bar-stripped" style="width: 50%">processing
		</div>
		<?php
		}
		elseif($res[$i]['status']=='solved'){
		?>
		<div class="progress-bar bg-success progress-bar-stripped" style="width: 75%">solved
		</div>
		<?php
		}
		elseif($res[$i]['status']=='rejected'){
		?>
		<div class="progress-bar bg-danger progress-bar-stripped" style="width: 100%">rejected
        </div>
		<?php
		}
		?>
	</div>
          </div>
      <div class="w-100"></div>
      <div class="col"><br><span style="float : left"><b> Remarks/Response : </b><?php echo nl2br($res[$i]['remarks']); ?></span></div>
    
    <div class="col"><span><b>New &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</b></span><b>Under Process&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</b></span><span><b>Resolved&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</b></span><span><b>Rejected</b></span></div>
  </div>
      </div>
      </div>
			<?php
        }
			?>
		</div>
		<?php
     }
     else {
		?>
  <div class="card">
    <div class="card-body"><br/>
      <h4>No New Grievances</h4>
    </div>
    </div> <!-- panel info -->
  <?php
    }
  ?>
  </div>
</div>
<br>
<br>
<?php
require('footer.php');
}
else
{

  header('Location: index.php');
}

 ?>

<!-- <div class="container">
  <div class="row">
    <div class="col">Column</div>
    <div class="col">Column</div>
    <div class="w-100"></div>
    <div class="col">Column</div>
    <div class="col">Column</div>
  </div>
</div> -->


