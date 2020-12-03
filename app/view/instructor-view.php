<?php
require_once("../app/view/view.php");

class InstructorView extends View
{
    public function output()
    {
    }

    public function readCoursesSelection()
    {
        $this->model->readCoursesSelection();
        echo '<option selected disabled>None selected</option>';
        for($i=0;$i<count($this->model->courses);$i++)
        {
            echo '<option value="'.$this->model->courses[$i]->getCoursecode().'">'.$this->model->courses[$i]->getCoursename().'</option>';
        }
    }

    public function readAssignmentSelection()
    {
        
        $this->model->readAssignmentSelection();
        $coursesofins = $this->model->courses;
        for($i=0;$i<count($coursesofins);$i++)
        {
            $assignmentsname='';
            for($y=0;$y<count($coursesofins[$i]->assignments);$y++)
            {
                $assignmentsname .="<option value='".$coursesofins[$i]->assignments[$y]->getAssignmentid()."'>".$coursesofins[$i]->assignments[$y]->getAssignmentname()."</option>";
            }
            echo'                
            <optgroup label="'.$coursesofins[$i]->getCoursecode().'">
                '.$assignmentsname.'
            </optgroup>
            ';
        }
        
    }

    public function readAssignments()
    {
        $coursesofins = $this->model->courses;
        for($i=0;$i<count($coursesofins);$i++)
        {
            for($y=0;$y<count($coursesofins[$i]->assignments);$y++)
            {
                echo '

                <form id="'.$coursesofins[$i]->assignments[$y]->getAssignmentid().'" style="display:none" role="form">
                    <div class="form-group">
                        <label>Assignment Title</label>
                        <input class="form-control" value="'.$coursesofins[$i]->assignments[$y]->getAssignmentname().'" placeholder="Please enter title" />
                    </div>
                    <!-- Assignment Title -->
                    <div class="form-group">
                        <label>Assignment Description</label>
                        <textarea class="form-control" rows="3">'.$coursesofins[$i]->assignments[$y]->getAssignmentdesc().'</textarea>
                    </div>
                    <!-- Assignment Description -->
                    <div class="form-group">
                        <label>PDF Instructions (Optional)</label>
                        <input type="file" />
                    </div>
                    <!-- PDF instructions -->

                    <div class="form-group">
                        <label>Start Date</label>
                        <input type="date" value="'.$coursesofins[$i]->assignments[$y]->getAssignmentstartdate().'" />
                    </div>

                    <div class="form-group">
                        <label>Cutoff Date</label>
                        <input type="date" value="'.$coursesofins[$i]->assignments[$y]->getAssignmentcutoffdate().'" />
                    </div>

                    <div class="form-group">
                        <label>Total Grade</label>
                        <input type="number" value="'.$coursesofins[$i]->assignments[$y]->getAssignmentgrade().'" />
                    </div>

                    <div class="form-group">
                        <label>Number of Submissions Allowed</label>
                        <input type="number" value="'.$coursesofins[$i]->assignments[$y]->getNbofsubmissions().'" />
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
}