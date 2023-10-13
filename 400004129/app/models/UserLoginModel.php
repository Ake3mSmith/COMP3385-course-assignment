<?php
class UserLoginModel
{

    private $email;
    private $password;

    public function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    public function getRole()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "user_management_system";
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }


        $sql = "SELECT role FROM users WHERE email = '$this->email'";
        $result = $conn->query($sql);


        //checking if hashed password in database matches with passowrd inputted in login view
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $role = $row['role'];
                return $role;
            }
        }
        $conn->close();
    }

    public function getEmail()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "user_management_system";
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }


        $sql = "SELECT email FROM users WHERE email = '$this->email'";
        $result = $conn->query($sql);


        //checking if hashed password in database matches with passowrd inputted in login view
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $email = $row['email'];
                return $email;
            }
        }
        $conn->close();
    }

    public function getUserName()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "user_management_system";
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }


        $sql = "SELECT username FROM users WHERE email = '$this->email'";
        $result = $conn->query($sql);


        //checking if hashed password in database matches with passowrd inputted in login view
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $username = $row['username'];
                return $username;
            }
        }
        $conn->close();
    }

    public function read()
    {

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "user_management_system";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }


        $sql = "SELECT email, password FROM users WHERE email = '$this->email'";
        $result = $conn->query($sql);


        //checking if hashed password in database matches with password entered in login view
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $dbPassword = $row['password'];
                if (password_verify($this->password, $dbPassword)) {
                    return true;
                } else {
                    return false;
                }
            }
        } else {
            return false;
        }

        $conn->close();
    }
}
