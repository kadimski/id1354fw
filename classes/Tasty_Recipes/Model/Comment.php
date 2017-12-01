<?php

namespace Tasty_Recipes\Model;

use Tasty_Recipes\Integration\CommentDatabaseHandler;

/**
 * Description of Comment
 */
class Comment
{
    private $commentDatabaseHandler, $comments, $userComment, $userCommentToDelete;
    
    public function __construct()
    {
        $this->commentDatabaseHandler = new CommentDatabaseHandler();
    }
    
    public function getCommentsFor($recipe)
    {
        $this->comments = $this->commentDatabaseHandler->getComments($recipe);
        return $this->comments;
    }
    
    public function setComment($userComment)
    {
        $this->userComment = $userComment;
        $this->commentDatabaseHandler->setComment($this->userComment);
    }
    
    public function deleteComment($userCommentToDelete)
    {
        $this->userCommentToDelete = $userCommentToDelete;
        $commentauthor = $this->commentDatabaseHandler->getCommentAuthor($this->userCommentToDelete->getCommentid());
        
        if($commentauthor == $this->userCommentToDelete->getUsername())
        {
            $this->commentDatabaseHandler->deleteComment($this->userCommentToDelete);
        }
    }
}
