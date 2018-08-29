<?php
/**
 * Created by PhpStorm.
 * User: yx010
 * Date: 2018/8/16
 * Time: 7:11
 */

namespace myWay\module\api\models;

use App;
use EFrame\Helper\T;

/**
 * Class ArctypeInfor0
 * 栏目信息内容
 * @package myWay\module\api\models
 */
class ArctypeInfor0
{
    protected $typeId;          //栏目id
    protected $arctypeInfor;

    /**
     * 返回栏目信息内容
     * @param $param  模块参数（modelData携带的参数）
     * @return mixed
     */
    public function get($param=null){
        $this->initParams($param)->setArctypeInfor();

        return $this->arctypeInfor;
    }
    
    /**
     * 初始化参数
     */
    protected function initParams($param){
        //模块中设置的默认typeid,如果没有设置则使用系统定义的默认值
        $typeId = T::getStrVal('tid=',$param,8);
        
        //获取获取url中的栏目id参数，如查没有则采用模块中的设置　的
        $this->typeId = App::request()->get('tid',$typeId);
        
        return $this;
    }
    

    /**
     * 获取栏目信息内容
     * 需要指明typeid的值
     * @return $this
     */
    protected function setArctypeInfor(){
        //获取栏目下文章列表
        $serviceName = 'ArctypeInfor|'.$this->typeId;
        $arctypeInfor = App::service($serviceName)->options($serviceName);
        //设置获取的文章列表
        $this->arctypeInfor = $arctypeInfor->setParam(['typeId'=>$this->typeId])->getContent();

        return $this;
    }
}