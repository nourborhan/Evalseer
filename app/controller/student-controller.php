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

      $compilefeedback;
      $logicfeedback = "";
      $stylefeedback = $_SESSION["stylefeedback"];

      if($compilinggrade == 100)
      {
        $compilefeedback = "Your Code Compiled Successfully";
      }
      else
      {
        $compilefeedback = "Your Code Failed to Compile";
      }
    

      //splitting output of compiler
      $actualoutput=trim($_POST['actualoutput']);
      $actualoutputarray=explode("~!",$actualoutput);

      //splitting expected output from database
      $expectedoutput=trim($_POST['expectedoutput']);
      $expectedoutputarray=explode("~!",$expectedoutput);

      //test case success counter
      $LogicCounter=0;

      //test case checker

      $testcasesiunputs = $_SESSION["testcasesinputs"];

      $testcasesiunputs=explode("~!",$testcasesiunputs);

      for($i=0;$i<count($actualoutputarray);$i++)
      {
        $actualoutputarray[$i]=trim($actualoutputarray[$i]);        
        
        //check if the actual output contains the expected output 
        
        
        $regexp='/('.$expectedoutputarray[$i].')/';

          
        if(preg_match($regexp, $actualoutputarray[$i],$matches))
        {
         
         
          $LogicCounter=$LogicCounter+1;
          

        }
        else
        {
          // will be used for reports
          

          $logicfeedback = $logicfeedback."You may have a logical error because the following test failed for your code with inputs ".$testcasesiunputs[$i]." did not match
          the expected output ".$expectedoutputarray[$i]."<br><br>";


          
        }   

        

      }

      $logicfeedback=$logicfeedback.$LogicCounter."/".count($actualoutputarray)." Test cases passed! <br><br>";
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


      $this->model->SubmitAssignment($userid,$assignmentid,$date,$code,$totalgrade,$actualcompilinggrade,$LogicGrade,$StyleGrade,$SyntaxGrade,$compilefeedback,$logicfeedback,$stylefeedback);
    }


    public function getinstructors()
    {
      $this->model->getcourseinsts($_GET['id']);
    }
}

?>