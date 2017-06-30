<?php
/**
 * Created by PhpStorm.
 * User: fernando
 * Date: 06/06/17
 * Time: 23:31
 */

namespace Petry\Test\Controller;


class TestController
{
    public function index(){
        echo "Controller Index";
    }
    public function user($param1=false,$param2=false){
        echo "Controller User";
        var_dump($param1,$param2);
    }
}