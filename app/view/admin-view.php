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
    }

    public function readCoursesSelection()
    {
        $this->model->readCoursesSelection();
    }

    public function readinstructos_publishcourse()
    {
        $this->model->readinstructos_publishcourse();
    }

    public function readTAs_publishcourse()
    {
        $this->model->readTAs_publishcourse();
    }

    public function readcourse__suspendsection()
    {
        $this->model->readcourse__suspendsection();
    }
}    