<?php

namespace Tasty_Recipes\Integration;

/**
 * Description of CommentDatabaseHandler
 */
class CommentDatabaseHandler
{
    private $connection;
    
    public function __construct()
    {
        $dbServerName = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "comments";

        $this->connection = mysqli_connect($dbServerName, $dbUsername, $dbPassword, $dbName);
    }
    
    public function getComments($recipe)
    {
        $sql_get = "SELECT * FROM comments WHERE recipe = '$recipe'";
        $result = mysqli_query($this->connection, $sql_get);
        $comments = array();
        
        while($row = mysqli_fetch_assoc($result))
        {
            $comments[] = $row;
        }
        
        return $comments;
    }
}
