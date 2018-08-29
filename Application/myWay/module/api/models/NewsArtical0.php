<?php
/**
 * Created by PhpStorm.
 * User: yx010
 * Date: 2018/8/16
 * Time: 20:49
 */

namespace myWay\module\api\models;

use App;
use EFrame\Helper\T;

/**
 * Class NewsArtical0
 * 新闻内容类
 * @package myWay\module\api\models
 */
class NewsArtical0
{

    protected $typeId;
    protected $newsArtical;

    /**
     * 返回新闻内容
     * @param $param  模块参数（modelData携带的参数）
     * @return mixed
     */
    public function get($param=null){
        $this->initParams($param)->setNewsArtical();

        return $this->newsArtical;
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
     * 获取新闻内容
     * 需要指明typeid的值
     * @return $this
     */
    public function setNewsArtical(){
        $newsArtical = App::service('Archives')->options('Archives');
        $this->newsArtical = $newsArtical->setParam([
            'typeId'=>$this->typeId
        ])->getArtical();

        return $this;
    }

}