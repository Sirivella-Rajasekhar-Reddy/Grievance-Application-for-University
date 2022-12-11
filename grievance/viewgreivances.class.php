<?php
require_once("dbcredentials.php");
require_once("logs.php");

/**
 * Developed by ,
 */
class Viewgrievance extends DBCredentials
{
	private $classname = "Viewgrievance";
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

	

	public function viewAllGrievances(){
		$myname = $this->classname." - viewGrievance - ";
		$res = array();
		$res['status'] = 0;
		if($this->myerr==0 && !empty($this->myconn)){
				
				  $sqlqry = "SELECT `grievanceid`,`remarks`, `gtype`,`complaint`,`status` FROM `complaints` order by grievanceid desc";
			if ($stmt = $this->myconn->prepare($sqlqry)) {
				if($stmt->execute()){
					$i=-1;
					$stmt->bind_result($grievanceid,$remarks,$gtype,$complaint,$status);
					while($stmt->fetch()){
						$i++;
						$result[$i]['grievanceid']=$grievanceid;
					    $result[$i]['gtype']=$gtype;
                        $result[$i]['complaint']=$complaint;
                         $result[$i]['status']=$status;
                         $result[$i]['remarks']=$remarks;

					}	
		}
		else{
			$this->logs->errLog($myname."Statementnot executed");

		}
			}
			else{
				$this->logs->errLog($myname."Prepared Statement ERROR");

			}
		}

		else{
			$this->logs->errLog($myname."Mysqli Error or else");
		}
		return $result;
	}
		
	public function viewAllGrievByStatus($status){
        $res = array();
		$res['status'] = 0;
		try{
            $obj=new mysqli("localhost","root","","grievancedb");
            $qry=$obj->prepare("select complaintid,remarks,dept,raisedon,complaint,status from complaints where status=? and dept=? order by complaintid desc");
            $qry->bind_param("ss",$status,$dept);
            if($qry->execute()){
                $i=-1;
                $qry->bind_result($complaintid,$remarks,$dept,$raisedon,$complaint,$status);
                while($qry->fetch()){
                    $i++;
                    $result[$i]['complaintid']=$complaintid;
                    $result[$i]['dept']=$dept;
                    $result[$i]['raisedon']=$raisedon;
                    $result[$i]['complaint']=$complaint;
                     $result[$i]['status']=$status;
                     $result[$i]['remarks']=$remarks;
                }
            }

        }catch(exception $e){            
        }
		return $result;
	}
	
// 	public function updGrievance($gid,$status,$remarks){
// 		$myname = $this->classname." - updGrievance - ";
// 		$res = array();
// 		$res['status'] = 0;

// 		if($this->myerr==0 && !empty($this->myconn)){
			
// 		  $sqlqry = "UPDATE `complaints` SET `status`=?, remarks=? WHERE `grievanceid`=?";
// 		  if ($stmt = $this->myconn->prepare($sqlqry)) {
// 				$stmt->bind_param("sss",$status,$remarks,$gid);
// 				if($stmt->execute()){
// 					if($this->myconn->affected_rows){
// 					  $res['status'] = 1;
// 					  $res['rows_affected'] = $this->myconn->affected_rows;
// 					}
// 				}
// 				else{
// 					$this->logs->errLog($myname."Statement not executed".$this->myconn->error);
// 				}
// 			}
// 			else{
// 				$this->logs->errLog($myname."Not prepared");
// 			}
// 		}
// 		else{
// 			$this->logs->errLog($myname."Mysqli Error or else");
// 		}

// 		return $res;
// 	}
	
// public function getmonthlystatus()
// {
// 	$myname = $this->classname." - viewGrievance - ";
// 		$res = array();
// 		$res['status'] = 0;
// 		$currmonth=date('m');
// 		if($this->myerr==0 && !empty($this->myconn)){
				
// 				  $sqlqry = "SELECT `grievanceid`,`gtype`, `raisedon`, `complaint`,`status` FROM `complaints` WHERE month=?;";
// 			if ($stmt = $this->myconn->prepare($sqlqry)) {
// 				$stmt->bind_param("i",$currmonth);
// 				if($stmt->execute()){
// 					$i=-1;
// 					$stmt->bind_result($grievanceid,$gtype,$raisedon,$complaint,$status);
// 					while($row=$stmt->fetch()){
// 						$i++;
// 						$result[$i]['grievanceid']=$grievanceid;
// 					    $result[$i]['gtype']=$gtype;
// 					    $result[$i]['raisedon']=$raisedon;
//                         $result[$i]['complaint']=$complaint;
//                          $result[$i]['status']=$status;

// 					}	
// 		}
// 		else{
// 			$this->logs->errLog($myname."Statementnot executed");

// 		}
// 			}
// 			else{
// 				$this->logs->errLog($myname."Prepared Statement ERROR");

// 			}
// 		}

// 		else{
// 			$this->logs->errLog($myname."Mysqli Error or else");
// 		}
		
// 		return $result;
// }
	

	
// 	public function getgrievancebygid($gid){
// 		$res = array();
// 		$res['status'] = 0;
// 		//$dt=date('Ymd');
//         $myname = $this->classname." - getgrievancebyid - ";
// 		if($this->myerr==0 && !empty($this->myconn)){
// 			  $sqlqry = "SELECT `complaint`,`gtype`,`raisedon`,`status`, `remarks`, `grievanceid` FROM `complaints` WHERE `grievanceid`=?";
// 			if ($stmt = $this->myconn->prepare($sqlqry)) {
// 				$stmt->bind_param("s",$gid);
// 				if($stmt->execute()){
// 					$stmt->bind_result($complaint,$gtype,$raisedon,$status,$remarks, $grievanceid);
// 					$i=0;
// 					while($stmt->fetch()){
// 						$res['status'] = 1;
// 						$res['complaint']=$complaint;
// 						$res['gtype'] = $gtype;
// 						$res['raisedon'] = $raisedon;
// 					    $res['gstatus'] = $status;
// 					    $res['remarks'] = $remarks;
// 					    $res['gid'] = $grievanceid;
// 					}

// 				}
// 				else{
// 					$this->logs->errLog($myname."Statement not executed".$this->myconn->error);
// 				}
// 			}
// 			else{
// 				$this->logs->errLog($myname."Not prepared");
// 			}
// 		}
// 		else{
// 			$this->logs->errLog($myname."Mysqli Error or else");
// 		}

// 		return $res;
// 	}
			

// 	public function getRoleById($gid){
// 		$res = array();
// 		$res['status'] = 0;
//         $myname = $this->classname." - getRoleById - ";
// 		if($this->myerr==0 && !empty($this->myconn)){
// 			  $sqlqry = "SELECT role FROM details left join `complaints` on details.id=complaints.id WHERE `grievanceid`=?";
// 			if ($stmt = $this->myconn->prepare($sqlqry)) {
// 				$stmt->bind_param("s",$gid);
// 				if($stmt->execute()){
// 					$stmt->bind_result($role);
// 					while($stmt->fetch()){
// 						$res['status'] = 1;
// 						$res['role'] = $role;
// 					}

// 				}
// 				else{
// 					$this->logs->errLog($myname."Statement not executed".$this->myconn->error);
// 				}
// 			}
// 			else{
// 				$this->logs->errLog($myname."Not prepared");
// 			}
// 		}
// 		else{
// 			$this->logs->errLog($myname."Mysqli Error or else");
// 		}

// 		return $res;
// 	}
			
	
	

// 	public function __destruct(){
// 		if(!empty($this->myconn)){
// 		  $this->myconn->close();
// 		}
// 	}

}

 ?>
