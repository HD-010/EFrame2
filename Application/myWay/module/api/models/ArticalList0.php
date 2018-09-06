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
    protected $param;           //模块参数
    protected $topId;           //文章所在栏目的上一级栏目id
    protected $typeId;          //栏目id
    protected $articalList;     //文章列表
    protected $sw;              //搜索关键字
    protected $flag;            //文章标签
    protected $pageSize;        //分页步长
    protected $currentPage;     //当前页

    /**
     * 返回文章列表
     * @param $param  模块参数（modelData携带的参数）
     * @return mixed
     */
    public function get($param=null){
        $this->initParams($param)->setArticalList();
        $this->setArctypeInfor();
        $this->setParams();
        return $this->articalList;
    }

    /**
     * 初始化参数
     */
    protected function initParams($param){
        //文章所在栏目的上一级栏目id
        $topId = App::request()->get('topid',false);
        $this->topId = T::getStrVal('topid',$param,$topId);
       
        //模块中设置的默认typeid,如果没有设置则使用系统定义的默认值
        $default = $this->topId ? false : 8;
        $typeId = T::getStrVal('tid',$param,$default);
        
        //获取获取url中的栏目id参数，如查没有则采用模块中的设置　的
        $this->typeId = App::request()->get('tid',$typeId);

        //获取获取url中的搜索关键字参数
        $this->sw = App::request()->get('sw');

        //初始化flag
        $this->flag = App::request()->get('flag');
        //初始化分页步长
        $this->pageSize = App::request()->get('ps',20);
        //初始化当前页数
        $this->currentPage = App::request()->get('cp',1);

        //调用公共服务
        $this->param = App::service('Common')->options('Common')->parseModelParam($param);

        return $this;
    }

    //设置param
    protected function setParams(){
        $this->articalList['param'] = $this->param;
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
        $this->articalList = $articalList->setParam([
            'topId' => $this->topId,
            'typeId'=>$this->typeId,
            'searchWord' => $this->sw,
            'flag' => $this->flag,
            'pageSize' => $this->pageSize,
            'currentPage' => $this->currentPage,
        ])->getList();

        return $this;
    }

    //设置栏目内容信息,如果按上级栏目查，则返回上级栏目信息
    protected function setArctypeInfor(){
        //获取栏目信息
        $serviceName = 'ArctypeInfor|'.$this->typeId;
        $arctypeInfor = App::service($serviceName)->options($serviceName);
        $arctypeInfor = $arctypeInfor->setParam([
            'topId' => $this->topId,
            'typeId' => $this->typeId,
        ])->getContent();
        if(!$arctypeInfor['status']) return;
        $this->articalList['arctypeInfor'] = $arctypeInfor['data'];

        return $this;
    }
}

