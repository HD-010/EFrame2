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
class SearchArtical0
{
    protected $param;           //模块参数
    protected $articalList;     //文章列表
    protected $sw;              //搜索关键字
    protected $pageSize;        //分页步长
    protected $currentPage;     //当前页

    /**
     * 返回文章列表
     * @param $param  模块参数（modelData携带的参数）
     * @return mixed
     */
    public function get($param=null){
        $this->initParams($param)->setArticalList();
        $this->setParams();
        return $this->articalList;
    }

    /**
     * 初始化参数
     */
    protected function initParams($param){
        //获取获取url中的搜索关键字参数
        $this->sw = App::request()->get('sw');

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
            'searchWord' => $this->sw,
            'pageSize' => $this->pageSize,
            'currentPage' => $this->currentPage,
        ])->getSearchList();

        return $this;
    }


}

