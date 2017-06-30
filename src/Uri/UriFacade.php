<?php

namespace Petry\MVC\Uri;


class UriFacade
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
    private $paramName;

    /**
     * UriModel constructor.
     * @param string $paramName
     */
    public function __construct($paramName = 'router')
    {
        $this->paramName = $paramName;

        $uri = new GetByURI($this->paramName);
        $param = new Param($uri);
        $parse = new Parse($param);

        $this->controller = $parse->getController(); // Controller
        $this->action = $parse->getAction(); // Action
        $this->params = $parse->getParams(); // Params
    }

    /**
     * @return string
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * @return string
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @return array
     */
    public function getParams()
    {
        return $this->params;
    }


}