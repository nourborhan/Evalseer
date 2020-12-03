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
    
      $this->model->addtodropdown();
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

      $this->model->SubmitAssignment($userid,$assignmentid,$date,$code,$grade);
    }
    public function getinstructors()
    {
    
      $this->model->getcourseinsts($_GET['id']);
    }
}

?>