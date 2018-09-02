<?php
/**
 * Created by PhpStorm.
 * User: yx010
 * Date: 2018/8/12
 * Time: 22:09
 */
namespace myWay\module\api\models;

use App;
use EFrame\Helper\T;

class HeaderBanner0
{
    protected $typeName;
    protected $ADList;

    /**
     * 返回广告列表
     * @param $param  模块参数（modelData携带的参数）
     * @return mixed
     */
    public function get($param){
        $this->initParams($param);
    }

    /**
     * 初始化参数
     */
    protected function initParams($param){
        //模块中设置的默认typeid,如果没有设置则使用系统定义的默认值
        $this->typeName = T::getStrVal('tname',$param,'banner');

        return $this;
    }

    /**
     * 获取广告列表
     * 需要指明typename的值
     * @return $this
     */
    protected function setArticalList(){
        //获取该类型下广告列表
        $MyAD = App::service('MyAD')->options('MyAD');
        //设置获取的广告列表
        $this->ADList = $MyAD->setParam(['typeId'=>$this->typeName])->getList();

        return $this;
    }
}