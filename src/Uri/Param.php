<?php

namespace Petry\MVC\Uri;


class Param implements iGet
{

    /**
     * @var string
     */
    private $uri;

    /**
     * Get constructor.
     * @param string $nameParam
     */
    public function __construct(iGet $uri)
    {
        $this->uri = $uri->getParam();
        $this->sanitize();
    }

    private function sanitize()
    {
        $this->uri = (substr($this->uri, -1) == '/') ? substr($this->uri, 0, -1) : $this->uri; // remove barra final
        $this->uri = (substr($this->uri, 0,1) == '/') ? substr($this->uri, 1) : $this->uri; // remove barra inicial
        $this->uri = trim($this->uri);
    }

    public function getParam()
    {
        return $this->uri;
    }
}