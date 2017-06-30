<?php

namespace Petry\MVC\Uri;


class Parse implements iParseUri
{
    /**
     * @var string
     */
    private $controller;
    /**
     * @var string
     */
    private $action;
    /**
     * @var array
     */
    private $params;

    /**
     * @var string
     */
    private $router;

    public function __construct(iGet $router)
    {
        $this->router = $router->getParam();
        $this->separate();
    }

    private function separate()
    {
        $partials = explode('/', $this->router);
        $this->controller = array_shift($partials);
        $this->action = array_shift($partials);
        $this->params = $partials;

        $this->controller = (is_null($this->controller)||empty($this->controller)) ? 'index' : $this->controller;
        $this->action = (is_null($this->action)||empty($this->action)) ? 'index' : $this->action;
    }

    public function getController()
    {
        return $this->controller;
    }

    public function getAction()
    {
        return $this->action;
    }

    public function getParams()
    {
        return $this->params;
    }
}