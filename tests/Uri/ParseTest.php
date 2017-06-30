<?php
/**
 * Created by PhpStorm.
 * User: fernando
 * Date: 06/06/17
 * Time: 18:44
 */

namespace Petry\MVC\Uri;


class ParseTest extends \PHPUnit_Framework_TestCase
{
    public function testMVCParse(){
        $parse = new Parse(new Param(new GetByManual('/api/user/1')));
        $this->assertEquals('api',$parse->getController());
        $this->assertEquals('user',$parse->getAction());
        $this->assertInternalType('array',$parse->getParams());

        $parse = new Parse(new Param(new GetByManual('/api/user/')));
        $this->assertEquals('api',$parse->getController());
        $this->assertEquals('user',$parse->getAction());
        $this->assertInternalType('array',$parse->getParams());

        $parse = new Parse(new Param(new GetByManual('/')));
        $this->assertEquals('index',$parse->getController());
        $this->assertEquals('index',$parse->getAction());
        $this->assertInternalType('array',$parse->getParams());
    }
}