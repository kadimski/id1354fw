<?php

namespace Tasty_Recipes\Controller;

use Tasty_Recipes\Model\Signup;
use Tasty_Recipes\Model\Login;
use Tasty_Recipes\Model\Comment;
use Tasty_Recipes\Integration\CommentDatabaseHandler;

/**
 * Controller
 */
class Controller
{
    private $signup, $login, $comment;

    public function signup($username, $password, &$status)
    {
        $this->signup = new Signup();
        $this->signup->registerUser($username, $password, $status);
    }
    
    public function login($username, $password, &$status)
    {
        $this->login = new Login();
        $this->login->loginUser($username, $password, $status);
    }

    public function getComments($recipe)
    {
        $commentDatabaseHandler = new CommentDatabaseHandler();
        $commentDatabaseHandler->getComments($recipe);
    }
    
    public function setComment($username, $comment, $recipe)
    {
        $this->comment = new Comment($username, $comment, $recipe);
        $commentDatabaseHandler = new CommentDatabaseHandler;
        $commentDatabaseHandler->setComment($this->comment);
    }
    
    public function deleteComment()
    {
        $this->deleteComment = new DeleteComment();
    }
}