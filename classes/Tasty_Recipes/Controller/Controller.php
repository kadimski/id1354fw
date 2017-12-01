<?php

namespace Tasty_Recipes\Controller;

use Tasty_Recipes\Model\Signup;
use Tasty_Recipes\Model\Login;
use Tasty_Recipes\Model\Comment;
use Tasty_Recipes\Model\UserComment;
use Tasty_Recipes\Model\UserCommentToDelete;

/**
 * Controller
 */
class Controller
{
    private $signup, $login, $userComment, $comment, $comments, $userCommentToDelete;

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