<?php
require_once("../app/view/view.php");

class AdminView extends View
{
    

    public function output()
    {
    }

    public function readCourseDetalis()
    {
        $this->model->readCourseDetalis();

        $det=$this->model->allcoursesdetalis;
               
        $instructoslist = '';
        $TAlist = '';
        for($i=0;$i<count($det);$i++)
        {
            for($y=0;$y<count($det[$i]->assignedinstructorsnames);$y++)
            {
                $instructoslist
                .= "<li>".$det[$i]->assignedinstructorsnames[$y]."</li>";
            }

            for($z=0;$z<count($det[$i]->assignedTAssnames);$z++)
            {
                $TAlist
                .= "<li>".$det[$i]->assignedTAssnames[$z]."</li>";
            }

      
            echo '
                <div id="'.$det[$i]->getCoursecode().'" style="display: none;">
                        <h5><strong>Course Title</strong></h5><span>'.$det[$i]->getCoursename().'</span>
                        <h5><strong>Course Code</strong></h5><span>'.$det[$i]->getCoursecode().'</span>
                        <h5><strong>Total Grade</strong></h5><span>'.$det[$i]->getCoursegrade().'</span>
                        <h5><strong>Grade To Pass</strong></h5><span>'.$det[$i]->getGradetopass().'</span>
                        <h5><strong>Start Date</strong></h5><span>'.$det[$i]->getCoursestartdate().'</span>
                        <h5><strong>End Date</strong></h5><span>'.$det[$i]->getCourseenddate().'</span>
                        <h5><strong>Course Description</strong></h5>
                        <p>'.$det[$i]->getCoursedesc().'</p>
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
                        <br><br>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#myModal'.$det[$i]->getCoursecode().'">Edit Course</button>

        
        
                                <div class="modal fade" id="myModal'.$det[$i]->getCoursecode().'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                                        <input type="text" class="form-control" value="'.$det[$i]->getCoursename().'" placeholder="Enter Course Title">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Course Code</label>
                                                            <input type="text" class="form-control" value="'.$det[$i]->getCoursecode().'" placeholder="Enter Course Code">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Course Total Grade</label>
                                                            <input type="number" max="100" value="'.$det[$i]->getCoursegrade().'" class="form-control" placeholder="Enter Course Total grade">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Course Pass Grade</label>
                                                            <input type="number" max="100" value="'.$det[$i]->getGradetopass().'" class="form-control" placeholder="Enter Course passing grade">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Course Start Date</label>
                                                            <input type="date" class="form-control" value="'.$det[$i]->getCoursestartdate().'"  placeholder="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Course End Date</label>
                                                            <input type="date" class="form-control" value="'.$det[$i]->getCourseenddate().'" placeholder="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Course Description</label>
                                                            <textarea class="form-control" rows="5" id="comment">'.$det[$i]->getCoursedesc().'</textarea>
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

    public function readCoursesSelection()
    {
        $this->model->readCoursesSelection();
        echo '<option selected disabled>None selected</option>';
        for($i=0;$i<count($this->model->allcoursesnames);$i++)
        {
           
            echo '<option value="'.$this->model->allcoursescodes[$i].'">'.$this->model->allcoursesnames[$i].'</option>';
        }
    }

    public function readinstructos_publishcourse()
    {
        $this->model->readinstructos_publishcourse();

        $instructoslist = '';
        for($i=0;$i<count($this->model->allintructorsnames);$i++)
        {
            $instructoslist .= "<li><input name='ins[]' value='".$this->model->allintructorsids[$i]."' type='checkbox' /> ".$this->model->allintructorsnames[$i]." </li>";
        }
        echo $instructoslist;
    }

    public function readTAs_publishcourse()
    {
        $this->model->readTAs_publishcourse();

        $TAlist = '';
        for($i=0;$i<count($this->model->allTAsnames);$i++)
        {
            $TAlist .= "<li><input name='tas[]' value='".$this->model->allTAsids[$i]."' type='checkbox' /> ".$this->model->allTAsnames[$i]." </li>";
        }
        echo $TAlist;
    }

    public function readcourse__suspendsection()
    {
        // $this->model->readcourse__suspendsection();

        for($i=0;$i<count($this->model->allcoursescodes);$i++)
        {
            echo '<input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">'.$this->model->allcoursescodes[$i].'</label>
                    <br>';
        }
    }

    public function readInstructors__suspendsection()
    {
        $this->model->readInstructors__suspendsection();
        
        for($i=0;$i<count($this->model->allnames);$i++)
        {
            echo '<input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">'.$this->model->allnames[$i].'</label>
            <br>';
           
        }

        
    }
}    