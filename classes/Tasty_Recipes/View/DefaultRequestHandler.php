<?php

namespace Tasty_Recipes\View;

use Id1354fw\View\AbstractRequestHandler;

/**
 *   Omdirigerar till första sidan om något går fel
 */
class DefaultRequestHandler extends AbstractRequestHandler
{
    protected function doExecute()
    {
        \header("Location: /Tasty_Recipes/View/show_index");
    }
}
