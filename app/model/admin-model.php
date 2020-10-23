<?php

require_once("../app/model/model.php");

class Admin extends model {


    function __construct() {
        $this->dbh = $this->connect();
    }

    function readCoursesSelection(){
        $sql="SELECT Coursecode,Name FROM course;";
        $Result = mysqli_query($this->db->getConn(),$sql);
        echo '<option selected disabled>None selected</option>';
        while($row=$Result->fetch_assoc())
            {

                echo '<option value="'.$row["Coursecode"].'">'.$row["Name"].'</option>';
            }
    }

    function readCourseDetalis(){
        $sql="SELECT * FROM course;";
        $Result = mysqli_query($this->db->getConn(),$sql);

        $instructoslist = '';
        $sql2="SELECT user.Name,user.Title FROM user INNER JOIN courseedducator ON courseedducator.UserID=user.UserID and courseedducator.Primaryeducatorflag=1 ";
        $Result2 = mysqli_query($this->db->getConn(),$sql2);
        while($row2=$Result2->fetch_assoc())
        {
            $instructoslist .= "<li>".$row2["Name"]."</li>";
        }

        $TAlist = '';
        $sql3="SELECT user.Name,user.Title FROM user INNER JOIN courseedducator ON courseedducator.UserID=user.UserID and courseedducator.Assistantflag =1 ";
        $Result3 = mysqli_query($this->db->getConn(),$sql3);
        while($row3=$Result3->fetch_assoc())
        {
            $TAlist .= "<li>".$row3["Name"]."</li>";
        }




        while($row=$Result->fetch_assoc())
        {

            echo '<div id="'.$row["Coursecode"].'" style="display: none;">
            <h5><strong>Course Title</strong></h5><span>'.$row["Name"].'</span>
            <h5><strong>Course Code</strong></h5><span>'.$row["Coursecode"].'</span>
            <h5><strong>Total Grade</strong></h5><span>'.$row["Grade"].'</span>
            <h5><strong>Grade To Pass</strong></h5><span>'.$row["Gradetopass"].'</span>
            <h5><strong>Start Date</strong></h5><span>'.$row["Startdate"].'</span>
            <h5><strong>End Date</strong></h5><span>'.$row["Enddate"].'</span>
            <h5><strong>Course Description</strong></h5>
            <p>'.$row["Description"].'</p>
            <div class="col-md-6">
                <h5><strong>Assigned Proffessors</strong></h5>
                <ul>
                    '.$instructoslist.'
                </ul>
            </div>
            <div class="col-md-6">
                <h5><strong>Assigned TAs</strong></h5>
                <ul>
                '.$TAlist.'
                </ul>
            </div>
            <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">Edit Course</button>

        </div>';
        }
    }

    function readinstructos_publishcourse()
    {
        $instructoslist = '';
        $sql2="SELECT user.Name,user.Title FROM user INNER JOIN courseedducator ON courseedducator.UserID=user.UserID and courseedducator.Primaryeducatorflag=1 ";
        $Result2 = mysqli_query($this->db->getConn(),$sql2);
        while($row2=$Result2->fetch_assoc())
        {
            $instructoslist .= "<li><input type='checkbox' /> ".$row2["Name"]." </li>";
            
        }
        echo ''.$instructoslist.'';
    }

    function readTAs_publishcourse()
    {
        $TAlist = '';
        $sql2="SELECT user.Name,user.Title FROM user INNER JOIN courseedducator ON courseedducator.UserID=user.UserID and courseedducator.Assistantflag=1 ";
        $Result2 = mysqli_query($this->db->getConn(),$sql2);
        while($row2=$Result2->fetch_assoc())
        {
            $TAlist .= "<li><input type='checkbox' /> ".$row2["Name"]." </li>";
            
        }
        echo ''.$TAlist.'';
    }

    function readcourse__suspendsection()
    {
        
        $sql="SELECT Coursecode FROM course;";
        $Result = mysqli_query($this->db->getConn(),$sql);
        while($row=$Result->fetch_assoc())
            {

                echo '<input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">'.$row["Coursecode"].'</label>
                <br>';
            }
    }
}    

?>