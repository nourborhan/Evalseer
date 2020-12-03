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
                $assignment->setAssignmentid($row2["AssignmentiD"]);
                $assignment->setAssignmentname($row2["Assignmentname"]);
                $assignment->setAssignmentdesc($row2["Assignmentdesc."]);
                $assignment->setAssignmentstartdate($row2["Startdate"]);
                $assignment->setAssignmentcutoffdate($row2["Cutoffdate"]);
                $assignment->setAssignmentgrade($row2["Grade"]);
                $assignment->setNbofsubmissions($row2["NBofsubmissions"]);
                
                array_push($this->courses[$i]->assignments,$assignment);
            }
        }
    }

    
}