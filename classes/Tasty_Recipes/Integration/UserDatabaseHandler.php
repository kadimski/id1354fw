<?php

namespace Tasty_Recipes\Integration;

/**
 * Description of databaseHandler
 */
class UserDatabaseHandler
{
    private $connection;
    
    public function __construct()
    {
        $dbServerName = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "login";

        $this->connection = mysqli_connect($dbServerName, $dbUsername, $dbPassword, $dbName);
    }
    
    public function checkUsernameTaken($username)
    {
        $username = mysqli_real_escape_string($this->connection, $username);
        
        $sql = "SELECT * FROM users WHERE username='$username'";
        $result = mysqli_query($this->connection, $sql);
        return $resultCheck = mysqli_num_rows($result);
    }
    
    public function registerUser($username, $password)
    {       
        $username = mysqli_real_escape_string($this->connection, $username);
        $password = mysqli_real_escape_string($this->connection, $password);

        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password');";
        mysqli_query($this->connection, $sql);
    }
    
    public function checkUsername($username)
    {
        $username = mysqli_real_escape_string($this->connection, $username);
        
        $sql = "SELECT * FROM users WHERE username='$username'";
        $result = mysqli_query($this->connection, $sql);
        
        return $resultCheck = mysqli_num_rows($result);
    }
    
    public function checkPassword($username, $password)
    {
        $sql = "SELECT * FROM users WHERE username='$username'";
        $result = mysqli_query($this->connection, $sql);
        $row = mysqli_fetch_assoc($result);
        
        return $password == $row['password'];
    }

    public function loginUser($username, $password)
    {
        $username = mysqli_real_escape_string($this->connection, $username);
        $password = mysqli_real_escape_string($this->connection, $password);
        
        $sql = "SELECT * FROM users WHERE username='$username'";
        $result = mysqli_query($this->connection, $sql);
        $row = mysqli_fetch_assoc($result);
        
        $_SESSION['id'] = $row['id'];
        $_SESSION['usr'] = $row['username'];
    }
}