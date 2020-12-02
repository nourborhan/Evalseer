<?php

require_once("../app/model/model.php");
require_once("../app/model/courseclass.php");

class Admin extends model {

    public $allcoursescodes =array();
    public $allcoursesnames =array();
    public $allcoursesdetalis = array();
    public $allintructorsnames =array();
    public $allTAsnames =array();
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
        $sql2="SELECT user.Name,user.Title FROM user INNER JOIN courseedducator ON courseedducator.UserID=user.UserID and courseedducator.Primaryeducatorflag=1 ";
        $Result2 = mysqli_query($this->db->getConn(),$sql2);
        while($row2=$Result2->fetch_assoc())
        {
            
            array_push($this->allintructorsnames,$row2["Name"]);
            
        }
       
    }

    function readTAs_publishcourse()
    {
        $sql2="SELECT user.Name,user.Title FROM user INNER JOIN courseedducator ON courseedducator.UserID=user.UserID and courseedducator.Assistantflag=1 ";
        $Result2 = mysqli_query($this->db->getConn(),$sql2);
        while($row2=$Result2->fetch_assoc())
        {
            array_push($this->allTAsnames,$row2["Name"]);
            
        }
    }

    // function readcourse__suspendsection()
    // {
        
    //     $sql="SELECT Coursecode FROM course;";
    //     $Result = mysqli_query($this->db->getConn(),$sql);
    //     while($row=$Result->fetch_assoc())
    //         {

    //             echo '<input type="checkbox" class="form-check-input" id="exampleCheck1">
    //             <label class="form-check-label" for="exampleCheck1">'.$row["Coursecode"].'</label>
    //             <br>';
    //         }
    // }

    function readInstructors__suspendsection()
    {
        $sql="SELECT Name FROM user WHERE Title='Teaching Assistant' OR Title='instructor' ";
        $Result = mysqli_query($this->db->getConn(),$sql);
        while($row=$Result->fetch_assoc())
            {

                // echo '<input type="checkbox" class="form-check-input" id="exampleCheck1">
                // <label class="form-check-label" for="exampleCheck1">'.$row["Name"].'</label>
                // <br>';
                array_push($this->allnames,$row["Name"]);
            }
    }
}    

?>