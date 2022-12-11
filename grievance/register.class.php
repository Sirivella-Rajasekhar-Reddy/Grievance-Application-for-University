<?php
require_once("dbcredentials.php");
require_once("logs.php");

/**
 * Developed by ,
 */
class Register extends DBCredentials
{
	private $classname = "Register";
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
	public function registerUser($username,$role,$gender,$college,$email,$phnum,$pwd){
		$return_val = 0;
		try{
			$obj = new mysqli("localhost","root","","grievancedb");
			
			$qry = $obj->prepare("insert into details(username,role,gender,college,email,phnum,pwd) values(?,?,?,?,?,?,?)");
			$qry->bind_param("sssssss",$username,$role,$gender,$college,$email,$phnum,$pwd);
			if($qry->execute()){
				$return_val = 1;
			}
		}catch(exception $e){
		}
		return $return_val;

	}
	public function checkRegister($username,$email,$phnum){
		$return_val = 0;
		try{
			$obj = new mysqli("localhost","root","","grievancedb");
			$qry = $obj->prepare("select username from details where username=? and email=? and phnum=?");
			$qry->bind_param("sss",$username,$email,$phnum);
			if($qry->execute()){
				$qry->bind_result($usernames);
				while($qry->fetch()){
					$return_val = 1;
				}
			}
		}catch(exception $e){
		}	
		return $return_val;
	}
	public function checkAdminLogin($username, $pwd){
		$res=array();
		$res['return_val']=0;
		try{
			$obj = new mysqli("localhost","root","","grievancedb");
			$qry = $obj->prepare("select username,dept from admin where username=? and pwd=?");
			$qry->bind_param("ss",$username,$pwd);
			if($qry->execute()){
				$qry->bind_result($username,$dept);
				$i=0;
				while($qry->fetch()){
					$res['return_val']=1;
					$res[$i]['dept']=$dept;
					$i++;
				}
			}
		}catch(exception $e){
		}
		return $res;
	}
public function checkLogin($username, $pwd){
		$return_val = 0;
		try{
			$obj = new mysqli("localhost","root","","grievancedb");
			$qry = $obj->prepare("select username,gender from details where username=? and pwd=?");
			$_SESSION["gender"] = $_POST["gender"];
			$qry->bind_param("ss",$username,$pwd);
			if($qry->execute()){
				$qry->bind_result($username,$gender);
				while($qry->fetch()){
					$return_val = 1;
				}
			}
		}catch(exception $e){
		}	
		return $return_val;
	}
	public function changepwd($id,$pwd,$npwd){
        $return_val=0;
        try{
            $obj=new mysqli("localhost","root","","grievancedb");
            $qry=$obj->prepare("update details set pwd=? where username=? and pwd=?");
            $qry->bind_param("sss",$npwd,$id,$pwd);
            if($qry->execute()){
				$return_val = 1;
            }
        }catch(exception $e){            
        }
        return $return_val;
    }
	public function changeadmpwd($id,$pwd,$npwd){
        $return_val=0;
        try{
            $obj=new mysqli("localhost","root","","grievancedb");
            $qry=$obj->prepare("update admin set pwd=? where username=? and pwd=?");
            $qry->bind_param("sss",$npwd,$id,$pwd);
            if($qry->execute()){
				$return_val = 1;
            }
        }catch(exception $e){            
        }
        return $return_val;
    }
	public function viewAllGrievByStatus($status1,$dept1){
        $res = array();
		$res['return_val']=0;
		try{
            $obj=new mysqli("localhost","root","","grievancedb");
            $qry=$obj->prepare("select username,dept,complaint,raisedon,status,complaintid,remarks from complaints where status=? and dept=? order by complaintid desc");
            $qry->bind_param("ss",$status1,$dept1);
            if($qry->execute()){
                $qry->bind_result($username,$dept,$complaint,$raisedon,$status,$complaintid,$remarks);
				$i=0;
				while($qry->fetch()){
					$res['return_val']=1;
					$res[$i]['dept']=$dept;
					$res[$i]['complaint']=$complaint;
					$res[$i]['raisedon']=$raisedon;
					$res[$i]['status']=$status;
					$res[$i]['complaintid']=$complaintid;
					$res[$i]['remarks']=$remarks;
					$i++;
				}
				$res['cnt']=$i;
            }
			
        }catch(exception $e){            
        }
		return $res;
	}
	public function viewAllGrievByStatusAdmin($status1){
        $res = array();
		$res['return_val']=0;
		try{
            $obj=new mysqli("localhost","root","","grievancedb");
            $qry=$obj->prepare("select username,dept,complaint,raisedon,status,complaintid,remarks from complaints where status=? order by complaintid desc");
            $qry->bind_param("s",$status1);
            if($qry->execute()){
                $qry->bind_result($username,$dept,$complaint,$raisedon,$status,$complaintid,$remarks);
				$i=0;
				while($qry->fetch()){
					$res['return_val']=1;
					$res[$i]['dept']=$dept;
					$res[$i]['complaint']=$complaint;
					$res[$i]['raisedon']=$raisedon;
					$res[$i]['status']=$status;
					$res[$i]['complaintid']=$complaintid;
					$res[$i]['remarks']=$remarks;
					$i++;
				}
				$res['cnt']=$i;
            }
			
        }catch(exception $e){            
        }
		return $res;
	}


	public function getgrievancebyid($complaintid){
		$res = array();
		$res['return_val']=0;
		try{
            $obj=new mysqli("localhost","root","","grievancedb");
            $qry=$obj->prepare("select username,complaint,raisedon,status,complaintid,remarks from complaints where complaintid=?");
			$qry->bind_param("s",$complaintid);
			if($qry->execute()){
                $qry->bind_result($username,$complaint,$raisedon,$status,$complaintid,$remarks);
				$i=0;
				while($qry->fetch()){
					$res['return_val']=1;
					$res[$i]['complaint']=$complaint;
					$res[$i]['raisedon']=$raisedon;
					$res[$i]['status']=$status;
					$res[$i]['complaintid']=$complaintid;
					$res[$i]['remarks']=$remarks;
					$i++;
				}
				$res['cnt']=$i;
            }
		}
		catch(exception $e){            
        }
		return $res;
	}
	
	public function getgrievancebygid($complaintid1){
		$res = array();
		$res['return_val']=0;
		try{
            $obj=new mysqli("localhost","root","","grievancedb");
            $qry=$obj->prepare("select username,dept,complaint,raisedon,status,complaintid,remarks from complaints where complaintid=?");
			$qry->bind_param("s",$complaintid1);
			if($qry->execute()){
                $qry->bind_result($username,$dept,$complaint,$raisedon,$status,$complaintid,$remarks);
				while($qry->fetch()){
					$res['return_val']=1;
					$res['dept']=$dept;
					$res['complaint']=$complaint;
					$res['raisedon']=$raisedon;
					$res['status']=$status;
					$res['complaintid']=$complaintid;
					$res['remarks']=$remarks;
				}
            }
		}
		catch(exception $e){            
        }
		return $res;
	}

	public function getRoleById($complaintid){
		$res = array();
		$res['return_val']=0;
		try{
            $obj=new mysqli("localhost","root","","grievancedb");
            $qry=$obj->prepare("select role,email,phnum from details left join complaints on details.username=complaints.username where complaintid=?");
			$qry->bind_param("s",$complaintid);
			if($qry->execute()){
                $qry->bind_result($role,$email,$phnum);
				while($qry->fetch()){
					$res['return_val']=1;
					$res['role']=$role;
					$res['email']=$email;
					$res['phnum']=$phnum;
					$vg=new Register();
					$result=$vg->getUserByRole($role);
					if($result['return_val']==1){
						$res['username']=$result['username'];
					}
				}
		   }
	    }
		catch(exception $e){            
        }
		return $res;
	}
	public function getUserByRole($role){
		$res = array();
		$res['return_val']=0;
		try{
            $obj=new mysqli("localhost","root","","grievancedb");
            $qry=$obj->prepare("select username from details where role=?");

			$qry->bind_param("s",$role);
			if($qry->execute()){
                $qry->bind_result($username);
				while($qry->fetch()){
					$res['return_val']=1;
					$res['username']=$username;
				}
		   }
	    }
		catch(exception $e){            
        }
		return $res;
	}
	public function updGrievance($complaintid,$status,$remarks){
		$return_val=0;
		try{
            $obj=new mysqli("localhost","root","","grievancedb");
            $qry=$obj->prepare("update complaints set status=?,remarks=? where complaintid=?");
			$qry->bind_param("sss",$status,$remarks,$complaintid);
			if($qry->execute()){
				$return_val=1;
		   }
	    }
		catch(exception $e){            
        }
		return $return_val;
	}
	public function fwdGrievance($complaintid,$dept,$remarks){
		$return_val=0;
		try{
            $obj=new mysqli("localhost","root","","grievancedb");
            $qry=$obj->prepare("update complaints set dept=?,remarks=? where complaintid=?");
			$qry->bind_param("sss",$dept,$remarks,$complaintid);
			if($qry->execute()){
				$return_val=1;
		   }
	    }
		catch(exception $e){            
        }
		return $return_val;
	}
	public function getmonthlystatus($currmonth,$dept1)
	{
		$result = array();
		$result['return_val'] = 0;
	    $curryear=date('Y');

		try{
            $obj=new mysqli("localhost","root","","grievancedb");
            $qry=$obj->prepare("select complaintid,dept,complaint,status from complaints where month=? and year=? and dept=?");
			$qry->bind_param("iis",$currmonth,$curryear,$dept1);
			if($qry->execute()){
				$result['return_val'] = 1;
				$i=-1;
				$qry->bind_result($complaintid,$dept,$complaint,$status);
				while($qry->fetch()){
					$i++;
					$result[$i]['complaintid']=$complaintid;
					$result[$i]['dept']=$dept;
                    $result[$i]['complaint']=$complaint;
                    $result[$i]['status']=$status;
				}
				$result['cnt']=$i;
		   }
		}
		catch(exception $e){            
        }
		return $result;
	}
	public function getmonthlystatusAdmin($currmonth)
	{
		$result = array();
		$result['return_val'] = 0;
		$curryear=date('Y');

		try{
            $obj=new mysqli("localhost","root","","grievancedb");
            $qry=$obj->prepare("select complaintid,dept,complaint,status from complaints where month=? and year=?");
			$qry->bind_param("ii",$currmonth,$curryear);
			if($qry->execute()){
				$result['return_val'] = 1;
				$i=-1;
				$qry->bind_result($complaintid,$dept,$complaint,$status);
				while($qry->fetch()){
					$i++;
					$result[$i]['complaintid']=$complaintid;
					$result[$i]['dept']=$dept;
                    $result[$i]['complaint']=$complaint;
                    $result[$i]['status']=$status;
				}
				$result['cnt']=$i;
		   }
		}
		catch(exception $e){            
        }
		return $result;
	}
	public function statCounter($dept){
		$result = array();
		$result['return_val'] = 0;
		try{
			$obj=new mysqli("localhost","root","","grievancedb");
            $qry=$obj->prepare("select status from complaints where dept=?");
			$qry->bind_param("s",$dept);
			if($qry->execute()){
				$result['return_val'] = 1;
				$i=-1;
				$qry->bind_result($status);
				while($qry->fetch()){
					$i++;
                    $result[$i]['status']=$status;
				}
				$result['cnt']=$i;
		   }
		}
		catch(exception $e){            
        }
		return $result;
	}
	public function statCounterAdmin(){
		$result = array();
		$result['return_val'] = 0;
		try{
			$obj=new mysqli("localhost","root","","grievancedb");
            $qry=$obj->prepare("select status from complaints");
			if($qry->execute()){
				$result['return_val'] = 1;
				$i=-1;
				$qry->bind_result($status);
				while($qry->fetch()){
					$i++;
                    $result[$i]['status']=$status;
				}
				$result['cnt']=$i;
		   }
		}
		catch(exception $e){            
        }
		return $result;
	}
	public function statCounterAdminDept($dept){
		$result = array();
		$result['return_val'] = 0;
		try{
			$obj=new mysqli("localhost","root","","grievancedb");
            $qry=$obj->prepare("select status from complaints where dept=?");
			$qry->bind_param("s",$dept);
			if($qry->execute()){
				$result['return_val'] = 1;
				$i=-1;
				$qry->bind_result($status);
				while($qry->fetch()){
					$i++;
                    $result[$i]['status']=$status;
				}
				$result['cnt']=$i;
		   }
		}
		catch(exception $e){            
        }
		return $result;
	}
	public function getStatusAdmin($dept1)
	{
		$result = array();
		$result['return_val'] = 0;
	    $curryear=date('Y');

		try{
            $obj=new mysqli("localhost","root","","grievancedb");
            $qry=$obj->prepare("select complaintid,dept,complaint,status from complaints where year=? and dept=?");
			$qry->bind_param("is",$curryear,$dept1);
			if($qry->execute()){
				$result['return_val'] = 1;
				$i=-1;
				$qry->bind_result($complaintid,$dept,$complaint,$status);
				while($qry->fetch()){
					$i++;
					$result[$i]['complaintid']=$complaintid;
					$result[$i]['dept']=$dept;
                    $result[$i]['complaint']=$complaint;
                    $result[$i]['status']=$status;
				}
				$result['cnt']=$i;
		   }
		}
		catch(exception $e){            
        }
		return $result;
	}
}
