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
        $this->username = htmlentities($username, ENT_QUOTES);
    }
    
    public function setComment($comment)
    {
        $this->comment = htmlentities($comment, ENT_QUOTES);
    }
    
    public function setRecipe($recipe)
    {
        $this->recipe = htmlentities($recipe, ENT_QUOTES);
    }
    
    public function setSendComment($sendComment)
    {
        
    }

    protected function doExecute()
    {
        $controller = $this->session->get(Constants::CONTROLLER_KEY_NAME);
        $controller->setComment($this->username , $this->comment, $this->recipe);
            
        if($this->recipe == 'meatballs')
        {
            $this->session->set(Constants::CONTROLLER_KEY_NAME, $controller);
            $this->addVariable('comments', $controller->getComments($this->recipe));
            return 'meatballs_recipe';
        }
        elseif($this->recipe == 'pancakes')
        {
            $this->session->set(Constants::CONTROLLER_KEY_NAME, $controller);
            $this->addVariable('comments', $controller->getComments($this->recipe));
            return 'pancakes_recipe';
        }
    }
}
