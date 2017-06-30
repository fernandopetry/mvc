<?php

namespace Petry\MVC\Controller;


use Petry\MVC\Uri\UriFacade;

class ControllerFactory
{
    /**
     * @var string
     */
    private $namespace;
    /**
     * @var UriFacade
     */
    private $router;

    /**
     * ControllerFactory constructor.
     * @param UriFacade $router Nome da rota passada na url
     * @param string $namespace Nome do namespace onde ficará os controllers
     */
    public function __construct(UriFacade $router,$namespace='')
    {
        $this->namespace = $namespace;
        $this->router = $router;
        $this->prepareNamespace();
        $this->verify();
    }

    private function prepareNamespace(){
        $this->namespace = trim($this->namespace);
        $this->namespace = (substr($this->namespace, -1) == '/') ? substr($this->namespace, 0, -1) : $this->namespace;// remove barra final
        $this->namespace = (substr($this->namespace, 0,1) == '/') ? substr($this->namespace, 1) : $this->namespace; // remove barra inicial
        $this->namespace = '\\'.$this->namespace.'\\%sController';
        $this->namespace = sprintf($this->namespace, ucfirst($this->router->getController()));
    }

    private function verify(){
        // verifica se a classe existe
        if(!class_exists($this->namespace)){
            throw new \Exception('Class not found! '.$this->namespace);
        }
    }

    public function factory(){
        $controller = new $this->namespace();

        if(!empty($this->router->getParams())){
            return call_user_func_array(array($controller, $this->router->getAction()), $this->router->getParams());
        }

        if (method_exists($controller, $this->router->getAction())) {
            return call_user_func(array($controller, $this->router->getAction()));
        } else {
            throw new \Exception('ControllerFactory: Action not found!');
        }
    }

}