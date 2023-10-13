<?php
include '../models/CreateUserModel.php';

session_start();

class CreateUserController
{
    private $model;
    private $inputUserName;
    private $inputPassword;
    private $hashedPassword;
    private $inputEmail;
    private $inputRole;


    public function __construct()
    {
        $this->inputUserName = $_POST['createUserName'];
        $this->inputEmail = $_POST['createEmail'];
        $this->inputPassword = $_POST['createPassword'];
        $this->hashedPassword = password_hash($this->inputPassword, PASSWORD_DEFAULT);
        $this->inputRole = $_POST['roles'];

        $this->model = new CreateUserModel($this->inputUserName, $this->inputEmail, $this->hashedPassword, $this->inputRole);
    }

    public function createUser()
    {
        $url = '/400004129/app/views/create-user.php';
        // Checking if username field is blank
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Checking if username field is blank
            if ($this->inputUserName === '') {
                $_SESSION["createUserError"] = "Username cannot be blank";

                header('Location:' . $url);
            } else if ($this->model->getUserName() === true) { // checking if username is already in database
                $_SESSION["createUserError"] = "Username is taken";

                header('Location:' . $url);
            } else if ($this->inputEmail === '') {
                $_SESSION["createUserError"] = "Email cannot be blank";

                header('Location:' . $url);
            } else if (!filter_var($this->inputEmail, FILTER_VALIDATE_EMAIL)) { // checking if email is valid
                $_SESSION["createUserError"] = "Invalid Email Format";
                header('Location:' . $url);
            } else if ($this->inputPassword === '') {
                $_SESSION["createUserError"] = "Password cannot be blank";

                header('Location:' . $url);
            } else if (!preg_match('/[A-Z]/', $this->inputPassword)) { //checking if password does not have an upper case character
                $_SESSION["createUserError"] = "Password must have at least one upper case character";

                header('Location:' . $url);
            } else if (!preg_match('/[0-9]/', $this->inputPassword)) {
                $_SESSION["createUserError"] = "Password must have at least one number";

                header('Location:' . $url);
            } else if (strlen($this->inputPassword) < 10) {
                $_SESSION["createUserError"] = "Password must be at least 10 characters long";

                header('Location:' . $url);
            } else {
                $this->model->create();
                header('Location:' . $url);
            }
        }
    }

    public function getHashedPassword()
    {
        return $this->hashedPassword;
    }
}
$registration = new CreateUserController();
$registration->createUser();
