<?php
include '../models/UserLoginModel.php';

session_start();
class UserLoginController
{
    private $model;

    public function __construct()
    {
        $this->model = new UserLoginModel($_POST['emailinput'], $_POST['passwordinput']);
    }

    public function loginUser()
    {
        if ($this->model->read() === false) {
            $_SESSION["loginError"] = "Invalid Email/Password";
            $url = '/400004129/app/views/user-login.php';
            header('Location:' . $url);
        } else {
            $_SESSION["role"] = $this->model->getRole();
            $_SESSION["email"] = $this->model->getEmail();
            $_SESSION["username"] = $this->model->getUserName();
            $url = '/400004129/app/views/dashboard.php';
            header('Location:' . $url);
        }
    }
}
$obj1 = new UserLoginController();
$obj1->loginUser();
