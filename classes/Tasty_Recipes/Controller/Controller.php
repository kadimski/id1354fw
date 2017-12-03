<?php

namespace Tasty_Recipes\Controller;

use Tasty_Recipes\Model\Signup;
use Tasty_Recipes\Model\Login;
use Tasty_Recipes\Model\Comment;
use Tasty_Recipes\Model\User;
use Tasty_Recipes\Model\UserComment;
use Tasty_Recipes\Model\UserCommentToDelete;

/**
 * Controller
 */
class Controller
{
    private $signup, $login, $userToSignup, $userToLogin, $userComment, $comment, $comments, $userCommentToDelete;

    public function signup($username, $password, &$status)
    {
        $this->signup = new Signup();
        $this->userToSignup = new User($username, $password);
        $this->signup->registerUser($this->userToSignup, $status);
    }
    
    public function login($username, $password, &$status)
    {
        $this->login = new Login();
        $this->userToLogin = new User($username, $password);
        $this->login->loginUser($this->userToLogin, $status);
    }

    public function getComments($recipe)
    {
        $this->comment = new Comment();
        $this->comments = $this->comment->getCommentsFor($recipe);
        return $this->comments;
    }
    
    public function setComment($username, $comment, $recipe)
    {
        $this->userComment = new UserComment($username, $comment, $recipe);
        $this->comment = new Comment();
        $this->comment->setComment($this->userComment);
    }
    
    public function deleteComment($username, $commentid, $recipe)
    {
        $this->userCommentToDelete = new UserCommentToDelete($username, $commentid, $recipe);
        $this->comment = new Comment();
        $this->comment->deleteComment($this->userCommentToDelete);
    }
}