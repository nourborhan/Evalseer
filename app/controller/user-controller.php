<?php

  require_once("../app/controller/Controller.php");

class UserController extends Controller{

    public function login()
    {
        $this->model->login($_POST['username'],$_POST['password']);
    }
}

?>