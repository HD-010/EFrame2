<?php
/**
 * 栏目列表模块3
 * Created by PhpStorm.
 * User: yx010
 * Date: 2018/8/14
 * Time: 19:50
 */

namespace myWay\module\api\models;

use App;
use EFrame\Helper\T;

class Navication3
{
    protected $arctype;             //栏目信息

    public function get(){
        $this->setArctype();

        return $this->arctype;
    }

    //获取栏目列表的所有信息
    //获取顶级栏目列表信息
    public function setArctype(){
        $arctype = App::service('Arctype')->options('Arctype');
        $this->arctype = $arctype->getArctype();

        return $this;
    }


}