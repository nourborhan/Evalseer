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

        $sql="SELECT MAX(AssignmentID) as wantedid , CourseID FROM assignments;";
        $Result = mysqli_query($this->db->getConn(),$sql);
        $row =$Result->fetch_assoc();
        $wantedcourseid=$row['CourseID'];
        $wantedAssignmentID = $row["wantedid"]; 

        $sql2 = "INSERT INTO `gradingcriteria` ( `Compiling`, `Compiling_weight`, `Sytling`, `Styling_weight`, `Syntax`, `Syntax_weight`, `Logic`, `Logic_weight`) 
        VALUES ('1', '$complieweight', '1', '$styleweight', '1', '$syntaxweight', '1', '$logicweight');";
        $result=mysqli_query($this->db->getConn(),$sql2);

        if($result)
        {
            

            $sql2="SELECT * FROM gradingcriteria WHERE FeaturesID=(SELECT max(FeaturesID) FROM gradingcriteria)";
            $Result2 = mysqli_query($this->db->getConn(),$sql2);
            $row = $Result2->fetch_assoc();
            $wantedFeaturesID = $row["FeaturesID"];


            $sql="UPDATE `assignments` SET `GradingcriteriaID` = '$wantedFeaturesID' WHERE `assignments`.`AssignmentID` = '$wantedAssignmentID';";
            $Result = mysqli_query($this->db->getConn(),$sql);

            if($Result)
            {

                //should adding test cases mechinanism here

                
                   $this->addAssignment_addTestCases($wantedAssignmentID,$wantedcourseid);



                
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

    function addAssignment_addTestCases($wantedAssignmentID,$wantedcourseid)
    {
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


            $inputsarray=array();

            for ($i=0;$i<count($splittestcases);$i++)
            {
                $inputs="";

                foreach($_POST[trim($splittestcases[$i]).'inputnum'] as $inputelement)
                {
                    if($inputs==="")
                    {
                        $inputs=$inputelement;
                    }
                    else
                    {
                        $inputs=$inputs." ".$inputelement;
                    }
                }

                array_push($inputsarray,$inputs);

            }

            //here the test cases can be counted by the size of outputsarray
            for($i=0;$i<count($outputsarray);$i++)
            {
                // echo $outputsarray[$i];
                //the insert sql statement in test cases table should be here

                $sql3="insert into test_case (AssignmentsID,Input_variable,Expected_output) values('$wantedAssignmentID','$inputsarray[$i]','$outputsarray[$i]')";
                $Result3 = mysqli_query($this->db->getConn(),$sql3);

                if($Result3)
                {
                    if($i===(count($outputsarray)-1))
                    {
                        $this->addAssignment_addtostudents($wantedAssignmentID,$wantedcourseid);
                    }
                }
                else
                {
                    echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'>
                    </script><script> swal('Error Adding Assignmet','','error');</script>"; 
                }
                

            }
        }
        else
        {
            echo "no test case for this assignment";
        }
    }


    function addAssignment_addtostudents($wantedid,$courseid)
    {
        $studentsidarr=array();
        $sql4="select * from studentsenrolled where CourseID=$courseid";
        $Result4 = mysqli_query($this->db->getConn(),$sql4);
        while($row4=$Result4->fetch_assoc())
        {
            array_push($studentsidarr,$row4['StudentID']);
        }

        for ($i=0;$i<count($studentsidarr);$i++)
        {
            $sql5="Insert into submissions (UserID,CourseID,AssignmentID) values ($studentsidarr[$i],$courseid,$wantedid)";
            $Result5=mysqli_query($this->db->getConn(),$sql5);

        }

    
                
        echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'>
        </script><script> alert('Submitted Successfully','','success');</script>";
                    
              
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