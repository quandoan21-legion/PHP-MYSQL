<?php
class Route
{
    private $aRouter;

    public function setRouter($router)
    {
        $this->aRouter = $router;
        return $this;
    }

    public function direct($method, $route)
    {
        // echo '<pre>';
        // var_export($this->aRouter).'<br>';
        // var_export($method).'<br>';
        // var_export($route).'<br>';
        // die;
        if (isset($this->aRouter[$method][$route])) {
            $currentRoute = $this->aRouter[$method][$route];
            $aPasteRoute = explode("@", $currentRoute);
            include "src/Controllers/".$aPasteRoute[0].".php";
            $oControllerIndex = new $aPasteRoute[0];
            $oControllerIndex->{$aPasteRoute[1]}();
        }else {
            echo "404 NOT FOUND";
        }
    }
}
