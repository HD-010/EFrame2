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
     * @param $param  模块参数（modelData携带的参数）
     * @return mixed
     */
    public function get($param=null){
        $this->initParams($param)->setArticalList();
        $this->setArctypeInfor();
        return $this->articalList;
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

