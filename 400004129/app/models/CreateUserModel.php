<?php
class CreateUserModel
{
    private $username;
    private $email;
    private $password;
    private $role;

    public function __construct($username, $email, $password, $role)
    {

        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
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
        VALUES ('$this->username','$this->password', '$this->email','$this->role')";

        if ($conn->query($sql) === TRUE) {
            echo "User created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
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


        $sql = "SELECT username FROM users WHERE username = '$this->username'";
        $result = $conn->query($sql);


        //checking if exact username is already in database
        return $result->num_rows > 0;
    }
}
