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
 * Class ArticalList0
 * 文章列表类
 * @package myWay\module\api\models
 */
class ArticalList0
{
    protected $typeId;          //栏目id
    protected $articalList;     //文章列表

    /**
     * 返回文章列表
     * @return mixed
     */
    public function get(){
        $this->initParams()->setArticalList();
        $this->setArctypeInfor();
        return $this->articalList;
    }

    /**
     * 初始化参数
     */
    protected function initParams(){
        //获取栏目id
        $this->typeId = App::request()->get('tid',8);

        return $this;
    }

    /**
     * 获取文章列表
     * 需要指明typeid的值
     * @return $this
     */
    protected function setArticalList(){
        //获取栏目下文章列表
        $articalList = App::service('Archives')->options('Archives');
        //设置获取的文章列表
        $this->articalList = $articalList->setParam(['typeId'=>$this->typeId])->getList();
        //设置栏目id
        $this->articalList['typeId'] = $this->typeId;

        return $this;
    }

    //设置栏目内容信息
    protected function setArctypeInfor(){
        //获取栏目信息
        $serviceName = 'ArctypeInfor|'.$this->typeId;
        $arctypeInfor = App::service($serviceName)->options($serviceName);
        $arctypeInfor = $arctypeInfor->setParam([
            'typeId' => $this->typeId
        ])->getContent();
        if(!$arctypeInfor['status']) return;
        $this->articalList['arctypeInfor'] = $arctypeInfor['data'];

        return $this;
    }
}

