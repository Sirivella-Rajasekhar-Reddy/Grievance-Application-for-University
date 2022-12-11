<?php
class Logs
{
  private $rootdir = "logs";
  public function __construct()
  {
    if(!file_exists($this->rootdir)){
      mkdir($this->rootdir);
    }
  }

  public function errLog($msg){
    $filename = $this->rootdir."/error.log";
    $data = "\n".date('d-m-Y H:i:s').": ".$_SERVER['REMOTE_ADDR']." - ".$msg;
    file_put_contents($filename,$data,FILE_APPEND);
  }

  public function logMe($msg){
    $filename = $this->rootdir."/logme.log";
    $data = "\n".date('d-m-Y H:i:s').": ".$_SERVER['REMOTE_ADDR']." - ".$msg;
    file_put_contents($filename,$data,FILE_APPEND);
  }
  
}

?>
