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

      $actualoutput=trim($_POST['actualoutput']);

      $actualoutputarray=explode("~!",$actualoutput);


      $expectedoutput=trim($_POST['expectedoutput']);

      $expectedoutputarray=explode("~!",$expectedoutput);

      
      for($i=0;$i<count($actualoutputarray);$i++)
      {
        $actualoutputarray[$i]=trim($actualoutputarray[$i]);        
        $splittedactual=explode(" ",$actualoutputarray[$i]);
   
        
        if(in_array($expectedoutputarray[$i],$splittedactual))
        {
          echo "test case passed<br>";
        }
        else
        {
          echo "test case failed<br>";
        }
      }

      $this->model->SubmitAssignment($userid,$assignmentid,$date,$code,$grade);
    }
    public function getinstructors()
    {
    
      $this->model->getcourseinsts($_GET['id']);
    }
}

?>