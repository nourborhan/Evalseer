<?php

require_once("../app/model/model.php");

class Instructor extends model {


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

    function readAssignmentSelection(){
        $sql="SELECT course.Coursecode,course.CourseID FROM `course` INNER JOIN assignments ON assignments.CourseID=course.CourseID ";
        $Result = mysqli_query($this->db->getConn(),$sql);
        while($row=$Result->fetch_assoc())
            {
                $assignmentsname='';
                $sql2="SELECT assignments.Assignmentname,assignments.AssignmentiD FROM `assignments` WHERE assignments.CourseID=".$row["CourseID"]." ";
                $Result2 = mysqli_query($this->db->getConn(),$sql2);
                while($row2=$Result2->fetch_assoc())
                {
                    $assignmentsname .="<option value='".$row2["AssignmentiD"]."'>".$row2["Assignmentname"]."</option>";
                }

               echo'                <optgroup label="'.$row["Coursecode"].'">
                                        '.$assignmentsname.'
                                    </optgroup>
                                    ';
            }
    }

    function readAssignments(){
        $sql="SELECT * FROM assignments;";
        $Result = mysqli_query($this->db->getConn(),$sql);
        while($row=$Result->fetch_assoc())
            {
                echo '

                <form id="'.$row["AssignmentiD"].'" style="display:none" role="form">
                    <div class="form-group">
                        <label>Assignment Title</label>
                        <input class="form-control" value="'.$row["Assignmentname"].'" placeholder="Please enter title" />
                    </div>
                    <!-- Assignment Title -->
                    <div class="form-group">
                        <label>Assignment Description</label>
                        <textarea class="form-control" rows="3">'.$row["Assignmentdesc."].'</textarea>
                    </div>
                    <!-- Assignment Description -->
                    <div class="form-group">
                        <label>PDF Instructions (Optional)</label>
                        <input type="file" />
                    </div>
                    <!-- PDF instructions -->

                    <div class="form-group">
                        <label>Start Date</label>
                        <input type="date" value="'.$row["Startdate"].'" />
                    </div>

                    <div class="form-group">
                        <label>Cutoff Date</label>
                        <input type="date" value="'.$row["Cutoffdate"].'" />
                    </div>

                    <div class="form-group">
                        <label>Total Grade</label>
                        <input type="number" value="'.$row["Grade"].'" />
                    </div>

                    <div class="form-group">
                        <label>Number of Submissions Allowed</label>
                        <input type="number" value="'.$row["NBofsubmissions"].'" />
                    </div>

                    <div class="form-group">
                        <label>Grading Type</label>
                        <select style="margin-bottom:10px" name="courses" id="Course">
                            <option value="auto">Automatic</option>
                            <option value="hyb">Hybrid</option>
                            <option value="man">Manual</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Grading Criteria</label>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" value="" />Styling
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" value="" />Compliation
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" value="" />Comments
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" value="" />Indentation
                            </label>
                        </div>
                        <!-- Grading Cirteria -->
                        <div class="form-group">
                            <label>First Hint</label>
                            <input class="form-control" placeholder="Mandatory" />

                            <label>Second Hint</label>
                            <input class="form-control" placeholder="Optional" />

                            <label>Third Hint</label>
                            <input class="form-control" placeholder="Optional" />
                        </div>
                        <!-- Hints -->
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" value="" />Hide From Students
                            </label>
                        </div>
                        <button type="submit" class="btn btn-success">Save
                            Assignment</button>
                    </div>
                </form>
                
                ';
            }
    }
}