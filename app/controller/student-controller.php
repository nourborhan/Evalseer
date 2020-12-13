<?php

  require_once("../app/controller/Controller.php");

class StudentController extends Controller{

    public function getAllAssignments()
    {
      $userid=$_SESSION['ID'];
    //   echo $userid;
      $this->model->getAssignments($userid);
    }
    public function getCourseAssignments()
    {
      $userid=$_SESSION['ID'];
      $this->model->getCourseAssignments($userid,$_GET['id']);
    }
    public function getAssignmentdetails()
    {
    
      $this->model->getAssigndetails($_GET['id']);
    }

    public function addtodropdown()
    {
  
      $userid=$_SESSION['ID'];
      $this->model->addtodropdown($userid);
    }
    public function getCoursedetails()
    {
    
      $this->model->getcourseinfo($_GET['id']);
    }
    public function submitAssignment()
    {
      $userid=$_POST['userid'];
      $assignmentid=$_POST['assignmentid'];
      $code=$_POST['assignmentcode'];
      $date=date("Y-m-d");
      $grade=$_COOKIE["compilinggrade"];

      $actualoutput=trim($_POST['expectedoutput']);



      $actualoutputarray=explode(" ",$actualoutput);


      foreach($actualoutputarray as $value){

        
        }


      $expectedoutputfromdb=(string)$_POST['expectedoutputfromdb'];

      

      echo $expectedoutputfromdb."<br>" . "                  " . gettype($expectedoutputfromdb) ;
      if (in_array($expectedoutputfromdb,$actualoutputarray,false))
      {
        echo "text case found and passed";
      }
      else
      {
        echo in_array($expectedoutputfromdb,$actualoutputarray);
        echo "text case fel shala7at";
      }

      $this->model->SubmitAssignment($userid,$assignmentid,$date,$code,$grade);
    }
    public function getinstructors()
    {
    
      $this->model->getcourseinsts($_GET['id']);
    }
}

?>