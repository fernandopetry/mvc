<?php


namespace Petry\MVC\Uri;


class GetByURI implements iGet
{
    /**
     * @var string
     */
    private $param;
    /**
     * @var string
     */
    private $paramName;

    /**
     * GetByURI constructor.
     * @param string $paramName
     */
    public function __construct($paramName='router')
    {
        $this->paramName = $paramName;
        $this->prepare();
    }

    private function prepare(){
        //$this->param = filter_input(INPUT_GET, $this->paramName);
        $this->param = (isset($_GET[$this->paramName]) ? $_GET[$this->paramName] : null;
    }

    public function getParam()
    {
        return $this->param;
    }
}
