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
    public function submitAssignment($compilingweight,$syntaxweight,$logicweight,$styleweight,$assignemntgrade)
    {
      $userid=$_POST['userid'];
      $assignmentid=$_POST['assignmentid'];
      $code=$_POST['assignmentcode'];
      $date=date("Y-m-d");
      $compilinggrade=$_COOKIE["compilinggrade"];
    

      //splitting output of compiler
      $actualoutput=trim($_POST['actualoutput']);
      $actualoutputarray=explode("~!",$actualoutput);

      //splitting expected output from database
      $expectedoutput=trim($_POST['expectedoutput']);
      $expectedoutputarray=explode("~!",$expectedoutput);

      //test case success counter
      $LogicCounter=0;

      //test case checker
      for($i=0;$i<count($actualoutputarray);$i++)
      {
        $actualoutputarray[$i]=trim($actualoutputarray[$i]);        
        $splittedactual=explode(" ",$actualoutputarray[$i]);

        echo $actualoutputarray[$i];
        // echo $splittedactual[$i];
   
       
        if(in_array($expectedoutputarray[$i],$splittedactual))
        {
          $LogicCounter=$LogicCounter+1;
          
        }
        else
        {
          // will be used for reports
          
        }   

      }


      //test case weight calculation
      $testfailweight=($LogicCounter/count($actualoutputarray));
      $testfailweight=1-$testfailweight;
      $testfailweight=$logicweight*$testfailweight;
      $LogicGrade=$logicweight-$testfailweight;
    


      //style grade

      $StyleGrade=0;

      //Syntax Grade


      $SyntaxGrade=0;

      //Compiling grade

      
      $compilinggrade=$compilinggrade/100;
      $actualcompilinggrade=$compilingweight*$compilinggrade;

      

      //submitting

      $gradeweight=$LogicGrade+$actualcompilinggrade+$StyleGrade+$SyntaxGrade;
      $gradeweight=$gradeweight/100;

      

      $totalgrade=$assignemntgrade*$gradeweight;


      $this->model->SubmitAssignment($userid,$assignmentid,$date,$code,$totalgrade,$actualcompilinggrade,$LogicGrade,$StyleGrade,$SyntaxGrade);
    }
    public function getinstructors()
    {
    
      $this->model->getcourseinsts($_GET['id']);
    }
}

?>