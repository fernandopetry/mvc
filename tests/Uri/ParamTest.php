<?php


namespace Petry\MVC\Uri;


class ParamTest extends \PHPUnit_Framework_TestCase
{
    public function testGenerateStringParamForUri(){
        $param = new Param(new GetByManual('/api/user/'));
        $this->assertEquals('api/user',$param->getParam());

        $param = new Param(new GetByManual('/api/user'));
        $this->assertEquals('api/user',$param->getParam());

        $param = new Param(new GetByManual('api/user/'));
        $this->assertEquals('api/user',$param->getParam());

        $param = new Param(new GetByManual('api/user'));
        $this->assertEquals('api/user',$param->getParam());

        $param = new Param(new GetByManual('  /api/user/  '));
        $this->assertEquals('api/user',$param->getParam());

        $param = new Param(new GetByManual('/'));
        $this->assertEquals('',$param->getParam());
    }
}