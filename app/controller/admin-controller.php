<?php

  require_once("../app/controller/Controller.php");

class AdminController extends Controller{

  public function PublishCourse(){

    $creatorid = $_SESSION["ID"];
    $coursetitle = $_POST["courseTitle"];
    $coursecode = $_POST["courseCode"];
    $coursedesc = $_POST["courseDesc"];
    $coursetotalgrade = $_POST["courseTotalGrade"];
    $coursegradetopass = $_POST["courseTotalGradetopass"];
    $coursestartdate = $_POST["coursestart"];
    $courseenddate = $_POST["courseend"];

    $arrayofinsIDs=array();
    if(!empty($_POST['ins']))   
    {
      foreach($_POST['ins'] as $check)
      {
        array_push($arrayofinsIDs,$check);
      } 
                  
    }

    $arrayoftasIDs=array();
    if(!empty($_POST['tas']))   
    {
      foreach($_POST['tas'] as $check)
      {
        array_push($arrayoftasIDs,$check);
      } 
                  
    }
    
    $this->model->PublishCourse($creatorid,$coursetitle,$coursecode,$coursedesc,$arrayofinsIDs,$arrayoftasIDs,$coursetotalgrade,$coursegradetopass,$coursestartdate,$courseenddate);

  }

}

?>