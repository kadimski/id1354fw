<?php

namespace Tasty_Recipes\Model;

/**
 * Description of UserCommentToDelete
 */
class UserCommentToDelete
{
    private $username, $commentid, $recipe;

    public function __construct($username, $commentid, $recipe)
    {
        $this->username = $username;
        $this->commentid = $commentid;
        $this->recipe = $recipe;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getCommentid()
    {
        return $this->commentid;
    }

    public function getRecipe()
    {
        return $this->recipe;
    }
}
