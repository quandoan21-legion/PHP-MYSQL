<?php

namespace Basic\Core;
// use Basic\Controller\HomeController as HomeController;
class Router
{
    private $aRouter;

    public function setRouter($router)
    {
        $this->aRouter = $router;
        return $this;
    }

    public function direct($method, $route)
    {
        if (isset($this->aRouter[$method][$route])) {
            
            $currentRoute = $this->aRouter[$method][$route];
            $aPasteRoute = explode("@", $currentRoute);
            include "src/Controllers/".$aPasteRoute[0].".php";
            $routeController = "Basic\Controllers\\" . $aPasteRoute[0];
            
            $oControllerIndex = new $routeController;
            $oControllerIndex->{$aPasteRoute[1]}();
        }else {
            echo "404 not found";
        }
    }
}
