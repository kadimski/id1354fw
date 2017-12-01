<?php

namespace Tasty_Recipes\View;

use Id1354fw\View\AbstractRequestHandler;
use Tasty_Recipes\Util\Constants;

/**
 * Description of Delete_comment
 */
class Delete_comment extends AbstractRequestHandler
{
    private $username, $commentid, $recipe;

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function setCommentid($commentid)
    {
        $this->commentid = $commentid;
    }

    public function setRecipe($recipe)
    {
        $this->recipe = $recipe;
    }

    public function setDelete($delete)
    {
        
    }

    protected function doExecute()
    {
        $controller = $this->session->get(Constants::CONTROLLER_KEY_NAME);
        $controller->deleteComment($this->username, $this->commentid, $this->recipe);
        
        if ($this->recipe == 'meatballs')
        {
            $this->session->set(Constants::CONTROLLER_KEY_NAME, $controller);
            $this->addVariable('comments', $controller->getComments($this->recipe));
            return 'meatballs_recipe';
        } 
        elseif ($this->recipe == 'pancakes')
        {
            $this->session->set(Constants::CONTROLLER_KEY_NAME, $controller);
            $this->addVariable('comments', $controller->getComments($this->recipe));
            return 'pancakes_recipe';
        }
    }
}
