<?php

namespace Tasty_Recipes\Model;

use Tasty_Recipes\Integration\CommentDatabaseHandler;

/**
 * Description of Comment
 */
class Comment
{
    private $commentDatabaseHandler, $comments, $username, $comment, $recipe;
    
    public function __construct()
    {
        $this->commentDatabaseHandler = new CommentDatabaseHandler();
    }
    
    public function getCommentsFor($recipe)
    {
        $this->comments = $this->commentDatabaseHandler->getComments($recipe);
        return $this->comments;
    }

    public function getUsername()
    {
        return $this->username;
    }
    
    public function getComment()
    {
        return $this->comment;
    }
    
    public function getRecipe()
    {
        return $this->recipe;
    }
}
