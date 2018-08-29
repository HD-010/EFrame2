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
 * Class NewsList0
 * 新闻列表类
 * @package myWay\module\api\models
 */
class NewsList0
{
    protected $typeId;
    protected $newsList;

    /**
     * 返回新闻列表
     * @return mixed
     */
    public function get($param=null){
        $this->initParams($param)->setArticalList();
        
        $this->setNewsList();

        return $this->newsList;
    }
    
    /**
     * 初始化参数
     */
    protected function initParams($param){
        //模块中设置的默认typeid,如果没有设置则使用系统定义的默认值
        $typeId = T::getStrVal('tid',$param,8);
        
        //获取获取url中的栏目id参数，如查没有则采用模块中的设置　的
        $this->typeId = App::request()->get('tid',$typeId);
        
        return $this;
    }

    /**
     * 获取新闻列表
     * 需要指明typeid的值
     * @return $this
     */
    protected function setNewsList(){
        $newsList = App::service('Archives')->options('Archives');
        $this->newsList = $newsList->setParam(['typeId'=>$this->typeId])->getList();

        return $this;
    }
}