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
        $this->username = htmlentities($username, ENT_QUOTES);
    }

    public function setCommentid($commentid)
    {
        $this->commentid = htmlentities($commentid, ENT_QUOTES);
    }

    public function setRecipe($recipe)
    {
        $this->recipe = htmlentities($recipe, ENT_QUOTES);
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
