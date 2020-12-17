<?php

require_once("../app/model/model.php");
require_once("../app/model/courseclass.php");
require_once("../app/model/Assignmentclass.php");

class Instructor extends model {

    public $courses = array();

    function __construct() {
        $this->dbh = $this->connect();
    }

    function readCoursesSelection(){
        $sql="SELECT course.CourseID,Coursecode,Name FROM course INNER JOIN courseedducator ON course.CourseID=courseedducator.CourseID and courseedducator.UserID=".$_SESSION["ID"]." ;";
        $Result = mysqli_query($this->db->getConn(),$sql);
        while($row=$Result->fetch_assoc())
            {
                $course = new Course;
                $course->setCoursename($row["Name"]); 
                $course->setCoursecode($row["Coursecode"]);
                $course->setCourseid($row["CourseID"]);
                array_push($this->courses,$course);
                
            }
    }

    function readAssignmentSelection(){
        for($i=0;$i<count($this->courses);$i++)
        {
            $sql2="SELECT * FROM `assignments` WHERE assignments.CourseID=".$this->courses[$i]->getCourseid().";";
            $Result2 = mysqli_query($this->db->getConn(),$sql2);
            while($row2=$Result2->fetch_assoc())
            {
                // $assignmentsname .="<option value='".$row2["AssignmentiD"]."'>".$row2["Assignmentname"]."</option>";
                $assignment = new Assignment;
                $assignment->setAssignmentid($row2["AssignmentID"]);
                $assignment->setAssignmentname($row2["Assignmentname"]);
                $assignment->setAssignmentdesc($row2["Assignmentdesc."]);
                $assignment->setAssignmentstartdate($row2["Startdate"]);
                $assignment->setAssignmentcutoffdate($row2["Cutoffdate"]);
                $assignment->setAssignmentgrade($row2["Grade"]);
                $assignment->setNbofsubmissions($row2["Numberofsubmissions"]);
                
                array_push($this->courses[$i]->assignments,$assignment);
                
            }
        }
    }

    function addAssignment_gradingCriteria($syntaxweight,$logicweight,$styleweight,$complieweight){
        $sql="SELECT MAX(AssignmentID) as wantedid FROM assignments;";
        $Result = mysqli_query($this->db->getConn(),$sql);
        $row =$Result->fetch_assoc();
        $wantedAssignmentID = $row["wantedid"];

        $sql2 = "INSERT INTO `gradingcriteria` (`AssignmentsID`, `Compiling`, `Compiling_weight`, `Sytling`, `Styling_weight`, `Syntax`, `Syntax_weight`, `Logic`, `Logic_weight`) 
        VALUES ('$wantedAssignmentID', '1', '$complieweight', '1', '$styleweight', '1', '$syntaxweight', '1', '$logicweight');";
        $result=mysqli_query($this->db->getConn(),$sql2);

        if($result)
        {
            

            $sql2="SELECT * From gradingcriteria WHERE AssignmentsID='$wantedAssignmentID';";
            $Result2 = mysqli_query($this->db->getConn(),$sql2);
            $row = $Result2->fetch_assoc();
            $wantedFeaturesID = $row["FeaturesID"];


            $sql="UPDATE `assignments` SET `GradingcriteriaID` = '$wantedFeaturesID' WHERE `assignments`.`AssignmentID` = '$wantedAssignmentID';";
            $Result = mysqli_query($this->db->getConn(),$sql);

            if($Result)
            {

                //should adding test cases mechinanism here

                
                if($_POST['outputsArray'])
                {
                    //outputs array
                    $outputsarray = array();

                    foreach ($_POST['outputsArray'] as $element) 
                    { 
                        // echo $element." "; 
                        array_push($outputsarray,$element);
                        
                    }

                    $testcasenumbers=$_POST['testcasenumberarray'];

                    $splittestcases=explode(',',$testcasenumbers);

                    
                    for ($i=0;$i<count($splittestcases);$i++)
                    {
                        echo "splitnumbers".$splittestcases[$i]."<br>";

                        foreach($_POST[trim($splittestcases[$i])+'inputnum'] as $inputelement)
                        {
                            echo "input".$inputelement."<br>";
                        }

                    }

                    //here the test cases can be counted by the size of outputsarray
                    for($i=0;$i<count($outputsarray);$i++)
                    {
                        // echo $outputsarray[$i];
                        //the insert sql statement in test cases table should be here
                    }
                }
                else
                {
                    echo "no test case for this assignment";
                }   



                echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'>
                </script><script> swal('Submitted Successfully','','success');</script>";
            }
            else
            {
                echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'>
                </script><script> swal('Error Adding Assignmet','','error');</script>";
            }

        }
        else{
            echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'>
            </script><script> swal('Error Adding Assignmet','','error');</script>";
        }
    }

    function addAssignment_mainDetails($creatorid,$courseid,$assignmenttitle,$assignmentdesc,$assignmentstartdate,$assignmentcutoffdate
    ,$assignmenttotalgrade,$assignmentnb,$assignmenttype,$ishidden,$syntaxweight,$logicweight,$styleweight,$complieweight)
    {

        $sql="INSERT INTO `assignments` (`EducatorID`, `CourseID`, `Assignmentname`, `Assignmentdesc.`, `Startdate`, `Cutoffdate`, `Grade`, `Numberofsubmissions`, `Gradingtype`, `Suspended`, `Hidden`) 
        VALUES ('$creatorid','$courseid','$assignmenttitle','$assignmentdesc','$assignmentstartdate','$assignmentcutoffdate'
        ,'$assignmenttotalgrade','$assignmentnb','$assignmenttype','0','$ishidden');"; 

        $result=mysqli_query($this->db->getConn(),$sql);

        if($result)
        {
            $this->addAssignment_gradingCriteria($syntaxweight,$logicweight,$styleweight,$complieweight);
        }
        else
        {
            echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'>
            </script><script> swal('Error Adding Assignmet','','error');</script>";
        }
    }

    
}