<?php

namespace Tasty_Recipes\Model;

/**
 * Description of Comment
 */
class Comment
{
    private $username, $comment, $recipe;
    
    public function __construct($username, $comment, $recipe)
    {
        $this->username = $username;
        $this->comment = $comment;
        $this->recipe = $recipe;
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
