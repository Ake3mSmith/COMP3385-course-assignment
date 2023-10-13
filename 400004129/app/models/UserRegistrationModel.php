<?php
class UserRegistrationModel
{
    private $username;
    private $email;
    private $password;

    public function __construct($username, $email, $password)
    {

        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }
    public function create()
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

        $sql = "INSERT INTO users (username, password, email, role)
        VALUES ('$this->username','$this->password', '$this->email','Research Group Manager')";

        if ($conn->query($sql) !== TRUE) {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
    // You can add methods here for working with tasks data, e.g., add, edit, delete tasks.

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


        $sql = "SELECT username FROM users WHERE username = '$this->username'";
        $result = $conn->query($sql);


        //checking if exact username is already in database
        return $result->num_rows > 0;
    }
}
