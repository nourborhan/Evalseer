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
            <button class="btn btn-primary" data-toggle="modal" data-target="#myModal'.$row["Coursecode"].'">Edit Course</button>

        </div>
        
        
                                <div class="modal fade" id="myModal'.$row["Coursecode"].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <h4 class="modal-title" id="myModalLabel">Edit Course</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form>
                                                        <div class="form-group">
                                                        <label for="exampleInputEmail1">Course Title</label>
                                                        <input type="text" class="form-control" value="'.$row["Name"].'" placeholder="Enter Course Title">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Course Code</label>
                                                            <input type="text" class="form-control" value="'.$row["Coursecode"].'" placeholder="Enter Course Code">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Course Total Grade</label>
                                                            <input type="number" max="100" value="'.$row["Grade"].'" class="form-control" placeholder="Enter Course Total grade">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Course Pass Grade</label>
                                                            <input type="number" max="100" value="'.$row["Gradetopass"].'" class="form-control" placeholder="Enter Course passing grade">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Course Start Date</label>
                                                            <input type="date" class="form-control" value="'.$row["Startdate"].'"  placeholder="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Course End Date</label>
                                                            <input type="date" class="form-control" value="'.$row["Enddate"].'" placeholder="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Course Description</label>
                                                            <textarea class="form-control" rows="5" id="comment">'.$row["Description"].'</textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <div id="list1" class="dropdown-check-list" tabindex="100">
                                                                <span class="anchor">Assign Proffessors</span>
                                                                <ul class="items">
                                                                    <li><input type="checkbox" checked /> Dr. Hannibal </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div id="list2" class="dropdown-check-list" tabindex="100">
                                                                <span class="anchor">Assign Teaching Assistants</span>
                                                                <ul class="items">
                                                                    <li><input type="checkbox" checked /> Tom Hagen</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </form>                        
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
        
        
        ';
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

    function readInstructors__suspendsection()
    {
        $sql="SELECT Name FROM user WHERE Title='Teaching Assistant' OR Title='instructor' ";
        $Result = mysqli_query($this->db->getConn(),$sql);
        while($row=$Result->fetch_assoc())
            {

                echo '<input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">'.$row["Name"].'</label>
                <br>';
            }
    }
}    

?>