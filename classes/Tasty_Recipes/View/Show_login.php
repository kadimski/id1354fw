<?php

namespace Tasty_Recipes\View;

use Id1354fw\View\AbstractRequestHandler;

/**
 * Visar login.php
**/
class Show_login extends AbstractRequestHandler
{ 
    protected function doExecute()
    {
        return 'login';
    }
}
