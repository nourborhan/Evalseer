<?php

require_once("../app/model/user-model.php");
require_once("../app/model/Assignmentclass.php");
require_once("../app/model/courseclass.php");

class Student extends User{

    protected $AllAssignments=array();
    protected $CourseAssignments=array();
    protected $AllCourses=array();
    protected $coursedetails;
    protected $assignmentdetail;
    protected $courseinstructors=array();
    
    function __construct()
    {
        $this->dbh=$this->connect();
    }

    function getAssignments($userid)
    {
        
        $sql="SELECT assignments.*,assignmentdetails.*,assignments.Grade as assignmentgrade , assignmentdetails.UserID as studentid FROM assignmentdetails join assignments on assignmentdetails.AssignmentID=assignments.AssignmentiD where assignmentdetails.UserID='$userid' and assignmentdetails.Submittedflag='0'";
        $result=mysqli_query($this->db->getConn(),$sql);
        while($row=$result->fetch_assoc())
        {
            
            $assingment=new Assignment();
            $assingment->setStudentid($row['studentid']);
            $assingment->setCourseid($row['CourseID']);
            $assingment->setAssignmentid($row['AssignmentID']);
            $assingment->setAssignmentgrade($row['assignmentgrade']);
            $assingment->setAssignmenttimecreated($row['Timecreated']);
            $assingment->setNbofsubmissions($row['NBofsubmissions']);
            $assingment->setAssignmentdesc($row['Assignmentdesc.']);
            $assingment->setAssignmentname($row['Assignmentname']);

            array_push($this->AllAssignments,$assingment);
            
        }

    }

    function getAssigndetails($id)
    {
        
        $sql="SELECT * from assignments where AssignmentiD='$id'";
        $result=mysqli_query($this->db->getConn(),$sql);
        while($row=$result->fetch_assoc())
        {
            
            $assingment=new Assignment();
            $assingment->setCourseid($row['CourseID']);
            $assingment->setAssignmentid($row['AssignmentiD']);
            $assingment->setAssignmentgrade($row['Grade']);
            $assingment->setAssignmenttimecreated($row['Timecreated']);
            $assingment->setNbofsubmissions($row['NBofsubmissions']);
            $assingment->setAssignmentdesc($row['Assignmentdesc.']);
            $assingment->setAssignmentname($row['Assignmentname']);

            $this->assignmentdetail=$assingment;
            
        }

    }
    
    function getCourseAssignments($userid,$courseid)
    {
        $sql="SELECT *,assignments.Grade as assignmentgrade , assignmentdetails.UserID as studentid FROM `assignmentdetails` join assignments on assignmentdetails.AssignmentID=assignments.AssignmentiD where assignmentdetails.UserID='$userid' and assignmentdetails.CourseID='$courseid' and assignmentdetails.Submittedflag='0'";
        $result=mysqli_query($this->db->getConn(),$sql);
        while($row=$result->fetch_assoc())
        {
            $assingment=new Assignment();
            $assingment->setStudentid($row['studentid']);
            $assingment->setCourseid($row['CourseID']);
            $assingment->setAssignmentid($row['AssignmentID']);
            $assingment->setAssignmentgrade($row['assignmentgrade']);
            $assingment->setAssignmenttimecreated($row['Timecreated']);
            $assingment->setNbofsubmissions($row['NBofsubmissions']);
            $assingment->setAssignmentdesc($row['Assignmentdesc.']);
            $assingment->setAssignmentname($row['Assignmentname']);

            array_push($this->CourseAssignments,$assingment);
        }

    }

    function getcourseinfo($courseid)
    {
        $sql="select * from course where CourseID=$courseid";
        $result=mysqli_query($this->db->getConn(),$sql);
        while($row=$result->fetch_assoc())
        {
            $course=new Course();
            
            $course->setCoursedesc($row['Description']);
            $course->setCoursename($row['Name']);
            $course->setCoursecode($row['Coursecode']);
            $course->setCoursestartdate($row['Startdate']);
            $this->coursedetails=$course;
        }
    }

    function getcourseinsts($courseid)
    {
        $sql="SELECT *,course.Name as coursename , user.Name as instructorname FROM `course` join courseedducator on course.CourseID=courseedducator.CourseID join user on user.UserID=courseedducator.UserID join role on user.RoleID=role.RoleID where course.CourseID=$courseid";
        $result=mysqli_query($this->db->getConn(),$sql);
        while($row=$result->fetch_assoc())
        {
            $course=new Course();
            
            $course->setInstructorname($row['instructorname']);
            $course->setInstructortitle($row['Title']);
            $course->setInstructorbio($row['Bio']);
            
            array_push($this->courseinstructors,$course);
        }
    }


    function addtodropdown()
    {
        $sql="SELECT * from course";
        $result=mysqli_query($this->db->getConn(),$sql);
        while($row=$result->fetch_assoc())
        {
            $course=new Course();
            $course->setCourseid($row['CourseID']);
            $course->setCoursecode($row['Coursecode']);
            $course->setActive($row['Active']);
            array_push($this->AllCourses,$course);
        }
    }

    /**
     * Get the value of AllAssignments
     */ 
    public function getAllAssignments()
    {
        return $this->AllAssignments;
    }

    /**
     * Get the value of CourseAssignments
     */ 
    public function getCourseAllAssignments()
    {
        return $this->CourseAssignments;
    }

    /**
     * Get the value of AllCourses
     */ 
    public function getAllCourses()
    {
        return $this->AllCourses;
    }

    /**
     * Get the value of coursedetails
     */ 
    public function getCoursedetails()
    {
        return $this->coursedetails;
    }

    /**
     * Get the value of courseinstructors
     */ 
    public function getCourseinstructors()
    {
        return $this->courseinstructors;
    }

    
    

    

    /**
     * Get the value of assignmentdetail
     */ 
    public function getAssignmentdetail()
    {
        return $this->assignmentdetail;
    }
}

?>