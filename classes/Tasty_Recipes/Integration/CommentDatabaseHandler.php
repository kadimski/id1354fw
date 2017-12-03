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
        require 'resources/includes/database.php';
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
    
    public function setComment($userComment)
    {
        $username = $userComment->getUsername();
        $comment = $userComment->getComment();
        $recipe = $userComment->getRecipe();

        $sql_instruction = "INSERT INTO comments (username, message, recipe) VALUES('$username', '$comment', '$recipe')";
        mysqli_query($this->connection, $sql_instruction);
    }
    
    public function getCommentAuthor($commentid)
    {
        $sql = "SELECT username FROM comments WHERE commentid = '$commentid'";
        $result = mysqli_query($this->connection, $sql);
        $row = mysqli_fetch_assoc($result);
        
        return $row['username'];
    }
    
    public function deleteComment($userCommentToDelete)
    {
        $cid = $userCommentToDelete->getCommentid();

        $sql = "DELETE FROM comments WHERE commentid = '$cid'";
        mysqli_query($this->connection, $sql);
    }
}
