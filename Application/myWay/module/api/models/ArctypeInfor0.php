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
    protected $arctypeInfor;

    /**
     * 返回栏目信息内容
     * @return mixed
     */
    public function get(){
        $this->setArctypeInfor();

        return $this->arctypeInfor;
    }

    /**
     * 获取栏目信息内容
     * 需要指明typeid的值
     * @return $this
     */
    protected function setArctypeInfor(){
        //获取栏目id
        $typeId = App::request()->get('tid',8);
        //获取栏目下文章列表
        $serviceName = 'ArctypeInfor|'.$typeId;
        $arctypeInfor = App::service($serviceName)->options($serviceName);
        //设置获取的文章列表
        $this->arctypeInfor = $arctypeInfor->setParam(['typeId'=>$typeId])->getContent();

        return $this;
    }
}