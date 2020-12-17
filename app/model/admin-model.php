<?php

require_once("../app/model/model.php");
require_once("../app/model/courseclass.php");

class Admin extends model {

    public $allcoursescodes =array();
    public $allcoursesnames =array();
    public $allcoursesdetalis = array();
    public $allintructorsnames =array();
    public $allintructorsids =array();
    public $allTAsnames =array();
    public $allTAsids =array();
    public $allnames = array(); //for suspend section   

    function __construct() {
        $this->dbh = $this->connect();
    }

    function readCoursesSelection(){
        $sql="SELECT Coursecode,Name FROM course;";
        $Result = mysqli_query($this->db->getConn(),$sql);
        while($row=$Result->fetch_assoc())
            {

                array_push($this->allcoursescodes,$row["Coursecode"]);
                array_push($this->allcoursesnames,$row["Name"]);
            }
    }

    function readCourseDetalis(){
        $sql="SELECT * FROM course;";
        $Result = mysqli_query($this->db->getConn(),$sql);
        
        while($row=$Result->fetch_assoc())
        {
            $course = new Course();
            $course->setCoursename ($row["Name"]);
            $course->setCoursecode ($row["Coursecode"]);
            $course->setCoursegrade ($row["Grade"]);
            $course->setGradetopass ($row["Gradetopass"]);
            $course->setCoursestartdate ($row["Startdate"]);
            $course->setCourseenddate ($row["Enddate"]);
            $course->setCoursedesc ($row["Description"]);

            $instructoslist = '';
            $sql2="SELECT user.Name,user.Title FROM user INNER JOIN courseedducator ON courseedducator.UserID=user.UserID and courseedducator.Primaryeducatorflag=1 and CourseID=".$row["CourseID"]."";
            $Result2 = mysqli_query($this->db->getConn(),$sql2);
            while($row2=$Result2->fetch_assoc())
            {
                array_push($course->assignedinstructorsnames,$row2["Name"]);
            }

            $TAlist = '';
            $sql3="SELECT user.Name,user.Title FROM user INNER JOIN courseedducator ON courseedducator.UserID=user.UserID and courseedducator.Assistantflag =1 and CourseID=".$row["CourseID"]."";
            $Result3 = mysqli_query($this->db->getConn(),$sql3);
            while($row3=$Result3->fetch_assoc())
            {
                array_push($course->assignedTAssnames,$row3["Name"]);
            }


            array_push($this->allcoursesdetalis,$course);
        }
    }

    function readinstructos_publishcourse()
    {
        $sql2="SELECT * from user where RoleID='2';";
        $Result2 = mysqli_query($this->db->getConn(),$sql2);
        while($row2=$Result2->fetch_assoc())
        {
            
            array_push($this->allintructorsnames,$row2["Name"]);
            array_push($this->allintructorsids,$row2["UserID"]);
            
            
        }
       
    }

    function readTAs_publishcourse()
    {
        $sql2="SELECT * FROM user where RoleID='4';";
        $Result2 = mysqli_query($this->db->getConn(),$sql2);
        while($row2=$Result2->fetch_assoc())
        {
            array_push($this->allTAsnames,$row2["Name"]);
            array_push($this->allTAsids,$row2["UserID"]);
            
        }
    }


    function readInstructors__suspendsection()
    {
        $sql="SELECT Name FROM user WHERE Title='Teaching Assistant' OR Title='instructor' ";
        $Result = mysqli_query($this->db->getConn(),$sql);
        while($row=$Result->fetch_assoc())
            {
                array_push($this->allnames,$row["Name"]);
            }
    }

   

    function PublishCourse($creatorid,$coursetitle,$coursecode,$coursedesc,$arrayofinsIDs,$arrayoftasIDs,$coursetotalgrade,$coursegradetopass,$coursestartdate,$courseenddate)
    {
        $sql="INSERT INTO `course` (`UserID`, `Coursecode`, `Name`, `Description`, `Grade`, `Gradetopass`, `Startdate`, `Enddate`, `Active`, `Timeceated`, `Timemodified`, `Suspended`) 
        VALUES ('$creatorid', '$coursecode', '$coursetitle', '$coursedesc', '$coursetotalgrade', '$coursegradetopass', '$coursestartdate', '$courseenddate', '1', NULL, NULL, '0');";

        $Result = mysqli_query($this->db->getConn(),$sql);

        if($Result)
        {

            $sql2="SELECT MAX(CourseID) as wantedid FROM course;";
            $Result2 = mysqli_query($this->db->getConn(),$sql2);
            $row =$Result2->fetch_assoc();
            $wantedID = $row["wantedid"];

            for($i=0;$i<count($arrayofinsIDs);$i++)
            {
                $sql3="INSERT INTO `courseedducator` (`CourseID`, `UserID`, `Primaryeducatorflag`, `Assistantflag`) VALUES ('$wantedID', ".$arrayofinsIDs[$i].", '1', '0');";
                $Result3 = mysqli_query($this->db->getConn(),$sql3);
            }

            for($y=0;$y<count($arrayoftasIDs);$y++)
            {
                $sql4="INSERT INTO `courseedducator` (`CourseID`, `UserID`, `Primaryeducatorflag`, `Assistantflag`) VALUES ('$wantedID', ".$arrayoftasIDs[$y].", '0', '1');";
                $Result4 = mysqli_query($this->db->getConn(),$sql4);
            }


            echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'>
                    </script><script> alert('Successfully Published Course','','success')</script>";
        }
        else
        {
            echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'>
            </script><script> alert('Error Publishing Course','','error');</script>";
        }
    }

    
}    

?>