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
        
        while ($row = mysqli_fetch_assoc($result))
        {
            echo '<form method="POST" action="../Includes/delete_comment.php"><p>' . $row['username'] . ': ' . $row['message'] .
            '<input type="hidden" name="commentid" value="' . $row['commentid'] . '">'
            . '<input type="hidden" name="recipe" value="' . $recipe . '">';
            if (isset($_SESSION['usr']) && $row['username'] == $_SESSION['usr'])
            {
                echo '<input type="submit" name="delete" value="Ta bort kommentar">' . '</p></form>';
            } 
            else
            {
                echo '' . '</p></form>';
            }
        }
    }
}
