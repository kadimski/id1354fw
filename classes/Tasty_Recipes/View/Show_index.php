<?php

namespace Tasty_Recipes\View;

use Id1354fw\View\AbstractRequestHandler;

/**
 *  Visar index.php
 */
class Show_index extends AbstractRequestHandler
{
    protected function doExecute()
    {
        return 'index';
    }
}