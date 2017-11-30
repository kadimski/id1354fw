<?php

namespace Tasty_Recipes\View;

use Id1354fw\View\AbstractRequestHandler;
use Tasty_Recipes\Controller\Controller;
use Tasty_Recipes\Util\Constants;

/**
 *   Omdirigerar till första sidan om något går fel
 */
class DefaultRequestHandler extends AbstractRequestHandler
{
    protected function doExecute()
    {
        $this->session->restart();
        $this->session->set(Constants::CONTROLLER_KEY_NAME , new Controller());
        \header("Location: /Tasty_Recipes/View/show_index");
    }
}
