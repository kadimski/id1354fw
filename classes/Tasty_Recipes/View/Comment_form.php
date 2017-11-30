<?php

namespace Tasty_Recipes\View;

use Id1354fw\View\AbstractRequestHandler;
use Tasty_Recipes\Util\Constants;

/**
 * Description of Comment_form
 */
class Comment_form extends AbstractRequestHandler
{
    private $username, $comment, $recipe;
    
    public function setUsername($username)
    {
        $this->username = $username;
    }
    
    public function setComment($comment)
    {
        $this->comment = $comment;
    }
    
    public function setRecipe($recipe)
    {
        $this->recipe = $recipe;
    }
    
    public function setSendComment($sendComment)
    {
        
    }

    protected function doExecute()
    {
        $controller = $this->session->get(Constants::CONTROLLER_KEY_NAME);
        $controller->setComment($this->username , $this->comment, $this->recipe);
    }
}
