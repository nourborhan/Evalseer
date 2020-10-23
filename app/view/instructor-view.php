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
    }

    public function readAssignmentSelection()
    {
        $this->model->readAssignmentSelection();
    }

    public function readAssignments()
    {
        $this->model->readAssignments();
    }
}