<?php
require_once("../app/view/view.php");

class StudentView extends View
{
    

    public function output()
    {
        $var=$this->model->getAllAssignments();

        for($i=0;$i<count($var);$i++)
        {
            if($var[$i]->getSubmitted()==0)
            {
                echo        '<div class="timeline__item">
                                <a href="Assignment.php?id='.$var[$i]->getAssignmentid().'">
                                
                                <div class="timeline__content img-bg-02">
                                    <h2>'.$var[$i]->getAssignmentname().'</h2>
                                    <p>Grade: '.$var[$i]->getAssignmentgrade().'%</p>
                                    <p>'.substr($var[$i]->getAssignmentdesc(),0,200).'...'.'</p>
                                </div>
                                </a>
                            </div>';
            }
            else
            {
                echo        '<div class="timeline__item">
                                
                                <div class="timeline__content img-bg-02">
                                    <h2>'.$var[$i]->getAssignmentname().'</h2>
                                    <p>Grade: '.$var[$i]->getAssignmentgrade().'</p><br>
                                    <p>'.substr($var[$i]->getAssignmentdesc(),0,200).'...'.'</p>
                                </div>
                      
                            </div>';

            }
        }
        
    }

    public function outputscriptinindex()
    {
        $var=$this->model->getAllAssignments();
        $total=count($var);

        if($total<4)
        {
            echo "<script>
                    timeline(document.querySelectorAll('.timeline'), {
                        forceVerticalMode: 700,
                        mode: 'horizontal',
                        verticalStartPosition: 'left',
                        startIndex:0,
                        visibleItems: ".$total."
                    });
                </script>";
        }
        else
        {
            echo "<script>
                    timeline(document.querySelectorAll('.timeline'), {
                        forceVerticalMode: 700,
                        mode: 'horizontal',
                        verticalStartPosition: 'left',
                        startIndex:0,
                        visibleItems: 4
                    });
                </script>";
        }
    }

    public function dropdown()
    {
        $courses=$this->model->getAllCourses();

        foreach($courses as $var)
        {
            echo ($var->getActive()==1)?'<a class="dropdown-item" href="course.php?id='.$var->getCourseid().'">'.$var->getCoursecode().'</a>':"";
        }
    }

    public function coursedetails()
    {
        $course=$this->model->getCoursedetails();

        echo '  <div class="post-date">
                    <span class="day">30</span>
                    <span class="month">Nov</span>
                </div>
                <div class="meta-info-blog">
                    <span><i class="fa fa-calendar"></i> <a href="#">'.$course->getCoursestartdate().'</a> </span>
                    <span><i class="fa fa-tag"></i>  <a href="#">News</a> </span>
                    <span><i class="fa fa-comments"></i> <a href="#">12 students</a></span>
                </div>
                <div class="blog-title">
                    <h2>'.$course->getCoursename().'</h2>
                    <h4>'.$course->getCoursecode().'</h4>
                </div>
                <div class="blog-desc">
                    <p>'.$course->getCoursedesc().'</p>
                </div>';
    }

    public function outputcourseinstructors()
    {
        $instructors=$this->model->getCourseinstructors();

        foreach ($instructors as $inst)
        {
            echo '  <div class="blog-author">
                        <div class="author-bio">
                            <h3 class="author_name">'.$inst->getInstructorname().'</h3>
                            <h5>'.$inst->getInstructortitle().'</h5>
                            <p class="author_det">
                                '.$inst->getInstructorbio().'
                            </p>
                        </div>
                        <div class="author-desc">
                            <img src="images/avatar-01.jpg" alt="about author">
                        </div>
                    </div>';
        }
    }

    public function outputcourseassignments()
    {
        $var=$this->model->getCourseAllAssignments();

        for($i=0;$i<count($var);$i++)
        {
            if($var[$i]->getSubmitted()==0)
            {
                echo        '<div class="timeline__item">
                                <a href="Assignment.php?id='.$var[$i]->getAssignmentid().'">
                                
                                <div class="timeline__content img-bg-02">
                                    <h2>'.$var[$i]->getAssignmentname().'</h2>
                                    <p>Grade: '.$var[$i]->getAssignmentgrade().'</p>
                                    <p>'.substr($var[$i]->getAssignmentdesc(),0,200).'...'.'</p>
                                </div>
                                </a>
                            </div>';
            }
            else
            {
                echo        '<div class="timeline__item">
                                
                                <div class="timeline__content img-bg-02">
                                    <h2>'.$var[$i]->getAssignmentname().'</h2>
                                    <p>Grade: '.$var[$i]->getAssignmentgrade().'</p><br>
                                    <p>'.substr($var[$i]->getAssignmentdesc(),0,200).'...'.'</p>
                                </div>
                      
                            </div>';

            }   
        }
    }

    public function outputscriptincourse()
    {
        $var=$this->model->getCourseAllAssignments();
        $total=count($var);

        if($total<4)
        {
            echo "<script>
                    timeline(document.querySelectorAll('.timeline'), {
                        forceVerticalMode: 700,
                        mode: 'horizontal',
                        verticalStartPosition: 'left',
                        startIndex:0,
                        visibleItems: ".$total."
                    });
                </script>";
        }
        else
        {
            echo "<script>
                    timeline(document.querySelectorAll('.timeline'), {
                        forceVerticalMode: 700,
                        mode: 'horizontal',
                        verticalStartPosition: 'left',
                        startIndex:0,
                        visibleItems: 4
                    });
                </script>";
        }
    }


   
    
}    