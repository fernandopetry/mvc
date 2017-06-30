<?php


namespace Petry\MVC\Uri;


class GetByManual implements iGet
{
    /**
     * @var string
     */
    private $param;

    /**
     * GetByManual constructor.
     * @param string $param
     */
    public function __construct($param)
    {
        $this->param = trim($param);
    }


    public function getParam()
    {
        return $this->param;
    }
}
