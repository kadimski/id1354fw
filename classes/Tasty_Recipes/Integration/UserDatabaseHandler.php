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
    
    public function signup($signup, &$status)
    {       
        $username = mysqli_real_escape_string($this->connection, $signup->getUsername());
        $password = mysqli_real_escape_string($this->connection, $signup->getPassword());
        
        // Check empty input
        if(empty($username) || empty($password))
        {
            //header("Location: signup.php?signup=empty");
            //exit();
            $status = 'empty';
        }
        else
        {
            $sql = "SELECT * FROM users WHERE username='$username'";
            $result = mysqli_query($this->connection, $sql);
            $resultCheck = mysqli_num_rows($result);
            
            // Check valid username
            if($resultCheck > 0)
            {
                //header("Location: signup.php?signup=usernametaken");
                //exit();
                $status = 'usernametaken';
            }
            else 
            {
                //Register user
                $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password');";
                mysqli_query($this->connection, $sql);
                $status = 'success';
                //header("Location: ../Login/login.php?signup=success");
                //exit();
            }
        }
    }
    
    public function login($login, &$status)
    {
        $username = mysqli_real_escape_string($this->connection, $login->getUsername());
        $password = mysqli_real_escape_string($this->connection, $login->getPassword());
        
        // Check empty input
        if(empty($username) || empty($password))
        {
            /*header("Location: login.php?login=emptyfields");
            exit();*/
            $status = 'empty';
        }
        else
        {
            $sql = "SELECT * FROM users WHERE username='$username'";
            $result = mysqli_query($this->connection, $sql);
            $resultCheck = mysqli_num_rows($result);
            
            // Check username
            if($resultCheck < 1)
            {
                /*header("Location: login.php?login=wrongusernameorpassword");
                exit();*/
                $status = 'wrong';
            }
            else
            {
                if($row = mysqli_fetch_assoc($result))
                {
                    // Check password
                    if(!($password == $row['password']))
                    {
                        $status = 'wrong';
                    }
                    elseif($password == $row['password'])
                    {
                        $_SESSION['id'] = $row['id'];
                        $_SESSION['usr'] = $row['username'];
                        $status = 'success';
                    }
                }
            }
        }
    }
}