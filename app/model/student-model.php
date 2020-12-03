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
        // and assignmentdetails.Submittedflag='0'
        $sql="SELECT assignments.*,submissions.*,assignments.Grade as assignmentgrade , submissions.UserID as studentid FROM submissions join assignments on submissions.AssignmentID=assignments.AssignmentiD where submissions.UserID='$userid' ";
        $result=mysqli_query($this->db->getConn(),$sql);
        while($row=$result->fetch_assoc())
        {
            $assingment=new Assignment();
            $assingment->setStudentid($row['studentid']);
            $assingment->setCourseid($row['CourseID']);
            $assingment->setAssignmentid($row['AssignmentID']);
            $assingment->setAssignmentgrade($row['assignmentgrade']);
            $assingment->setAssignmenttimecreated($row['Timecreated']);
            $assingment->setNbofsubmissions($row['Numberofsubmissions']);
            $assingment->setAssignmentdesc($row['Assignmentdesc.']);
            $assingment->setAssignmentname($row['Assignmentname']);
            $assingment->setSubmitted($row['Submittedflag']);

            array_push($this->AllAssignments,$assingment);
            
        }

    }

    function getAssigndetails($id)
    {
        
        $sql="select * , assignments.Grade as assignmentgrade,submissions.Grade as submittedgrade from assignments  join submissions on assignments.AssignmentID=submissions.AssignmentID WHERE submissions.AssignmentID='$id'";
        $result=mysqli_query($this->db->getConn(),$sql);
        while($row=$result->fetch_assoc())
        {

            $assingment=new Assignment();
            $assingment->setCourseid($row['CourseID']);
            $assingment->setAssignmentid($row['AssignmentID']);
            $assingment->setAssignmentgrade($row['assignmentgrade']);
            $assingment->setAssignmenttimecreated($row['Timecreated']);
            $assingment->setNbofsubmissions($row['Numberofsubmissions']);
            $assingment->setAssignmentdesc($row['Assignmentdesc.']);
            $assingment->setAssignmentname($row['Assignmentname']);
            $assingment->setFilepath($row['Code_submitted']);
            $assingment->setSubmissiondate($row['Submissiondate']);
            $assingment->setGrade($row['submittedgrade']);
            

            $this->assignmentdetail=$assingment;

            
        }

    }
    
    function getCourseAssignments($userid,$courseid)
    {
        $sql="SELECT *,assignments.Grade as assignmentgrade , submissions.UserID as studentid FROM `submissions` join assignments on submissions.AssignmentID=assignments.AssignmentiD where submissions.UserID='$userid' and submissions.CourseID='$courseid' ";
        $result=mysqli_query($this->db->getConn(),$sql);
        while($row=$result->fetch_assoc())
        {
            $assingment=new Assignment();
            $assingment->setStudentid($row['studentid']);
            $assingment->setCourseid($row['CourseID']);
            $assingment->setAssignmentid($row['AssignmentID']);
            $assingment->setAssignmentgrade($row['assignmentgrade']);
            $assingment->setAssignmenttimecreated($row['Timecreated']);
            $assingment->setNbofsubmissions($row['Numberofsubmissions']);
            $assingment->setAssignmentdesc($row['Assignmentdesc.']);
            $assingment->setAssignmentname($row['Assignmentname']);
            $assingment->setSubmitted($row['Submittedflag']);

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


    function addtodropdown($id)
    {
        $sql="SELECT * from course join studentsenrolled on studentsenrolled.CourseID=course.CourseID where StudentID=$id";
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

    function SubmitAssignment($userid,$assingmentid,$date,$code,$grade)
    {
        $sql="UPDATE submissions
            set Submissiondate='$date',Code_submitted='$code',Submittedflag='0',Grade='$grade'
            where AssignmentID=$assingmentid and UserID=$userid";

        $result=mysqli_query($this->db->getConn(),$sql);

        if($result)
        {
            echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'>
            </script><script> swal('Submitted Successfully','','success');</script>";
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