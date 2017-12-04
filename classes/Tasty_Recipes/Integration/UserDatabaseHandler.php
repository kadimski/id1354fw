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
        require 'resources/includes/database.php';
        $dbName = "login";

        $this->connection = mysqli_connect($dbServerName, $dbUsername, $dbPassword, $dbName);
    }
    
    public function checkUsernameTaken($username)
    {
        $username = mysqli_real_escape_string($this->connection, $username);
        
        $sql = "SELECT * FROM users WHERE username='$username'";
        $result = mysqli_query($this->connection, $sql);
        return $result;
    }
    
    public function registerUser($userToSignup)
    {       
        $username = mysqli_real_escape_string($this->connection, $userToSignup->getUsername());
        $password = mysqli_real_escape_string($this->connection, $userToSignup->getPassword());
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$hashedPassword');";
        mysqli_query($this->connection, $sql);
    }
    
    public function checkUsername($username)
    {
        $username = mysqli_real_escape_string($this->connection, $username);
        
        $sql = "SELECT * FROM users WHERE username='$username'";
        $result = mysqli_query($this->connection, $sql);
        
        return $result;
    }
    
    public function getPassword($username)
    {
        $sql = "SELECT * FROM users WHERE username='$username'";
        $result = mysqli_query($this->connection, $sql);
        $row = mysqli_fetch_assoc($result);
        
        return $row['password'];
    }

    public function loginUser($userToLogn)
    {
        $username = mysqli_real_escape_string($this->connection, $userToLogn->getUsername());
        $password = mysqli_real_escape_string($this->connection, $userToLogn->getPassword());
        
        $sql = "SELECT * FROM users WHERE username='$username'";
        mysqli_query($this->connection, $sql);
    }
}