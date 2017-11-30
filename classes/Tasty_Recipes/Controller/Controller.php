<?php

namespace Tasty_Recipes\Controller;

use Tasty_Recipes\Model\Signup;
use Tasty_Recipes\Model\Login;
use Tasty_Recipes\Model\Comment;
use Tasty_Recipes\Integration\UserDatabaseHandler;
use Tasty_Recipes\Integration\CommentDatabaseHandler;

/**
 * Controller
 */
class Controller
{
    private /*$userDatabaseHandler,*/ $signup, $login, $comment, $getComments, $setComment, $deleteComment;
    
    /*public function __construct()
    {
        $this->userDatabaseHandler = new UserDatabaseHandler();
    }*/

    public function signup($username, $password, &$status)
    {
        $this->signup = new Signup($username, $password);
        $userDatabaseHandler = new UserDatabaseHandler();
        $userDatabaseHandler->signup($this->signup, $status);
    }
    
    public function login($username, $password, &$status)
    {
        $this->login = new Login($username, $password);
        $userDatabaseHandler = new UserDatabaseHandler();
        $userDatabaseHandler->login($this->login, $status);
    }
    
    /*public function logout()
    {
        this.$logout = new Logout();
    }*/
    
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
        this.$deleteComment = new DeleteComment();
    }
}