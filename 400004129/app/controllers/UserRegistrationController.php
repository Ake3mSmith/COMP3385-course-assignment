<?php
include '../models/UserRegistrationModel.php';
session_start();

class UserRegistrationController
{
    private $model;
    private $inputUserName;
    private $inputPassword;
    private $hashedPassword;
    private $inputEmail;


    public function __construct()
    {
        $this->inputUserName = $_POST['registerUserName'];
        $this->inputEmail = $_POST['registerEmail'];
        $this->inputPassword = $_POST['registerPassword'];
        $this->hashedPassword = password_hash($this->inputPassword, PASSWORD_DEFAULT);

        $this->model = new UserRegistrationModel($this->inputUserName, $this->inputEmail, $this->hashedPassword);
    }

    public function registerUser()
    {

        $url = '/400004129/app/views/user-registration.php';

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Checking if username field is blank
            if ($this->inputUserName === '') {
                $_SESSION["registrationError"] = "Username cannot be blank";

                header('Location:' . $url);
            } else if ($this->model->getUserName() === true) { // checking if username is already in database
                $_SESSION["registrationError"] = "Username is taken";

                header('Location:' . $url);
            } else if ($this->inputEmail === '') {
                $_SESSION["registrationError"] = "Email cannot be blank";

                header('Location:' . $url);
            } else if (!filter_var($this->inputEmail, FILTER_VALIDATE_EMAIL)) { // checking if email is valid
                $_SESSION["registrationError"] = "Invalid Email Format";
                header('Location:' . $url);
            } else if ($this->inputPassword === '') {
                $_SESSION["registrationError"] = "Password cannot be blank";

                header('Location:' . $url);
            } else if (!preg_match('/[A-Z]/', $this->inputPassword)) { //checking if password does not have an upper case character
                $_SESSION["registrationError"] = "Password must have at least one upper case character";

                header('Location:' . $url);
            } else if (!preg_match('/[0-9]/', $this->inputPassword)) {
                $_SESSION["registrationError"] = "Password must have at least one number";

                header('Location:' . $url);
            } else if (strlen($this->inputPassword) < 10) {
                $_SESSION["registrationError"] = "Password must be at least 10 characters long";

                header('Location:' . $url);
            } else {
                $this->model->create();
                $loginUrl = '/400004129/app/views/user-login.php';
                header('Location:' . $loginUrl);
            }
        }
    }

    public function getHashedPassword()
    {
        return $this->hashedPassword;
    }

    public function index()
    {
        header('Location:' . 'views/user-registration.php');
    }
}

$registration = new UserRegistrationController();
$registration->registerUser();
