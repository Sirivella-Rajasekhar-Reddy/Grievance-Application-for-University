<?php
require_once("dbcredentials.php");
require_once("logs.php");

/**
 * Developed by ,
 */
class Grievance extends DBCredentials
{
	private $classname = "Grievance";
	private $logs = "";
	private $myconn = "";
	private $myerr = 0;

	public function __construct()
	{
		$this->logs = new Logs();
		$this->myconn = new mysqli($this->getHost(),$this->getUser(),$this->getPass(),$this->getDb());

		if (mysqli_connect_errno()) {
			$this->myerr = mysqli_connect_errno();
		}
	}
	
	public function addGrievance($username,$complaint,$dept){
		$gender="male";
		$return_val=0;
		$status="new";
		$t=time();
		$month=date('m');
		$year=date("Y");
		$raisedon = date("d-m-Y H:i:s",$t);
		$lastmodified=date("d-m-Y H:i:s",$t);
		$obj = new mysqli("localhost","root","","grievancedb");
		$qry = $obj->prepare("SELECT MAX( slno ) FROM `complaints`");
		if($qry->execute()){
			$qry->bind_result($max);
			while($qry->fetch()){
				$slnomax=$max;
				$slnomax++;
			}
		}
		$no=str_pad($slnomax, 5, '0', STR_PAD_LEFT);
		$complaintid="grievance".$no;
		try{
			$remarks = "";
			$obj = new mysqli("localhost","root","","grievancedb");
			$qry =$obj->prepare("insert into complaints(username,gender,dept,complaint,raisedon,status,complaintid,remarks,month,year,slno) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
			$qry->bind_param("ssssssssiii",$username,$gender,$dept,$complaint,$raisedon,$status,$complaintid,$remarks,$month,$year,$slnomax);
			if($qry->execute()){
				$return_val=1;
			}
		}catch(exception $e){
		}
		return $return_val;
	}

	public function getgrievancebyid($id){
		$res = array();
		$res['xstatus'] = 0;
		$obj = new mysqli("localhost","root","","grievancedb");
		$qry =$obj->prepare("select complaint,raisedon,status,remarks,complaintid from complaints where username=?");
		$qry->bind_param("s",$id);
		if($qry->execute()){
			$qry->bind_result($complaint,$raisedon,$status,$remarks, $complaintid);
			$i=0;
			while($qry->fetch()){
				$res['xstatus'] = 1;
				$res[$i]['complaint']=$complaint;
				$res[$i]['raisedon'] = $raisedon;
				$res[$i]['status'] = $status;
				$res[$i]['remarks'] = $remarks;
				$res[$i]['gid'] = $complaintid;
				$i++;
			}
			$res['ival']=$i;
		}
		return $res;
	}


	// public function getgrievancebyid($id){
	// 	$res = array();
	// 	$res['xstatus'] = 0;
	// 	//$dt=date('Ymd');
    //     $myname = $this->classname." - getgrievancebyid - ";
	// 	if($this->myerr==0 && !empty($this->myconn)){
	// 		  $sqlqry = "SELECT `complaint`,`raisedon`,`status`, `remarks`, `grievanceid` FROM `complaints` WHERE `id`=?";
	// 		if ($stmt = $this->myconn->prepare($sqlqry)) {
	// 			$stmt->bind_param("s",$id);
	// 			if($stmt->execute()){
	// 				$stmt->bind_result($complaint,$raisedon,$status,$remarks, $grievanceid);
	// 				$i=0;
	// 				while($stmt->fetch()){
	// 					$res['xstatus'] = 1;
	// 					$res[$i]['complaint']=$complaint;
	// 					$res[$i]['raisedon'] = $raisedon;
	// 				    $res[$i]['status'] = $status;
	// 				    $res[$i]['remarks'] = $remarks;
	// 				      $res[$i]['gid'] = $grievanceid;
						
	// 					$i++;
	// 				}
	// 				$res['ival']=$i;
	// 			}
	// 			else{
	// 				$this->logs->errLog($myname."Statement not executed".$this->myconn->error);
	// 			}
	// 		}
	// 		else{
	// 			$this->logs->errLog($myname."Not prepared");
	// 		}
	// 	}
	// 	else{
	// 		$this->logs->errLog($myname."Mysqli Error or else");
	// 	}

	// 	return $res;
	// }
	
	
	
	// public function getgrievancebygid($gid){
	// 	$res = array();
	// 	$res['xstatus'] = 0;
	// 	//$dt=date('Ymd');
    //     $myname = $this->classname." - getgrievancebyid - ";
	// 	if($this->myerr==0 && !empty($this->myconn)){
	// 		  $sqlqry = "SELECT `complaint`,`raisedon`,`status`, `remarks`, `grievanceid` FROM `complaints` WHERE `gid`=?";
	// 		if ($stmt = $this->myconn->prepare($sqlqry)) {
	// 			$stmt->bind_param("s",$gid);
	// 			if($stmt->execute()){
	// 				$stmt->bind_result($complaint,$raisedon,$status,$remarks, $grievanceid);
	// 				$i=0;
	// 				while($stmt->fetch()){
	// 					$res['xstatus'] = 1;
	// 					$res[$i]['complaint']=$complaint;
	// 					$res[$i]['raisedon'] = $raisedon;
	// 				    $res[$i]['status'] = $status;
	// 				    $res[$i]['remarks'] = $remarks;
	// 				      $res[$i]['gid'] = $grievanceid;
						
	// 					$i++;
	// 				}
	// 				$res['ival']=$i;
	// 			}
	// 			else{
	// 				$this->logs->errLog($myname."Statement not executed".$this->myconn->error);
	// 			}
	// 		}
	// 		else{
	// 			$this->logs->errLog($myname."Not prepared");
	// 		}
	// 	}
	// 	else{
	// 		$this->logs->errLog($myname."Mysqli Error or else");
	// 	}

	// 	return $res;
	// }
		
	
	// public function grievanceStats(){
	// 	$res = array();
	// 	$res['status'] = 0;
    //     $myname = $this->classname." - grievanceStats - ";
	// 	if($this->myerr==0 && !empty($this->myconn)){
	// 		  $sqlqry = "SELECT status,count(status) FROM `complaints` group by status";
	// 		if ($stmt = $this->myconn->prepare($sqlqry)) {
	// 		//	$stmt->bind_param("s",$gid);
	// 			if($stmt->execute()){
	// 				$stmt->bind_result($status,$count);

	// 				while($stmt->fetch()){
	// 					$res['status'] = 1;
	// 					$res[$status]=$count;
	// 				}

	// 			}
	// 			else{
	// 				$this->logs->errLog($myname."Statement not executed".$this->myconn->error);
	// 			}
	// 		}
	// 		else{
	// 			$this->logs->errLog($myname."Not prepared");
	// 		}
	// 	}
	// 	else{
	// 		$this->logs->errLog($myname."Mysqli Error or else");
	// 	}

	// 	return $res;
	// }
			
	
	public function __destruct(){
		if(!empty($this->myconn)){
		  $this->myconn->close();
		}
	}

}

 ?>
