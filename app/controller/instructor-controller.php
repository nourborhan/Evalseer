<?php

  require_once("../app/controller/Controller.php");

class InstructorController extends Controller{

  function addAssignment(){

    $creatorid = $_SESSION["ID"];
    $courseid = $_POST["selectedcourse"];
    $assignmenttitle = $_POST["assignment-title"];
    $assignmentdesc = $_POST["assignment-desc"];
    $assignmentstartdate = $_POST["assignment-start-date"];
    $assignmentcutoffdate = $_POST["assignment-cuttoff-date"];
    $assignmenttotalgrade = $_POST["assignment-total-grade"];
    $assignmentnb = $_POST["assignment-nb"];
    $assignmenttype = $_POST["assignment-type"];
    $assignmentstyleweight = $_POST["assignment-style-weight"];
    $assignmentcompileweight = $_POST["assignment-compile-weight"];
    $assignmentsyntaxweight = $_POST["assignment-syntax-weight"];
    $assignmentlogicweight = $_POST["assignment-logic-weight"];
    $ishidden;
    $assignmenthideflag = $_POST["assignment-hide-flag"];
    if($assignmenthideflag == 'checked')
    {
      $ishidden = 'True';
    }
    else{
      $ishidden = 'False';
    }


    $this->model->addAssignment($creatorid,$courseid,$assignmenttitle,$assignmentdesc,$assignmentstartdate,$assignmentcutoffdate
    ,$assignmenttotalgrade,$assignmentnb,$assignmenttype,$assignmentstyleweight,$assignmentcompileweight,$assignmentsyntaxweight,
    $assignmentlogicweight,$ishidden);
  

  }

}

?>