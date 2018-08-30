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

/**
 * 导航栏数据，包含顶级栏目和二级栏目信息
 * Class Navication3
 * @param $param  模块参数（modelData携带的参数）
 * @package myWay\module\api\models
 */
class Navication0
{
    protected $param;
    protected $arctype;             //栏目信息

    public function get($param=null){
        $this->initParams($param)->setArctype();
        $this->setParams();

        return $this->arctype;
    }

    /**
     * 初始化参数
     */
    protected function initParams($param){
        //调用公共服务
        $this->param = App::service('Common')->options('Common')->parseModelParam($param);

        return $this;
    }

    //设置param
    protected function setParams(){
        //调用公共服务
        $this->arctype['param'] = $this->param;
    }

    //获取栏目列表的所有信息
    //获取顶级栏目列表信息
    public function setArctype(){
        $arctype = App::service('Arctype')->options('Arctype');
        $this->arctype = $arctype->getArctype();

        return $this;
    }
}