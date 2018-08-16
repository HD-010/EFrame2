<?php
/**
 * Created by PhpStorm.
 * User: yx010
 * Date: 2018/8/16
 * Time: 20:49
 */

namespace myWay\module\api\models;

use App;

/**
 * Class NewsArtical0
 * 新闻内容类
 * @package myWay\module\api\models
 */
class NewsArtical0
{

    protected $newsArtical;

    /**
     * 返回新闻内容
     * @return mixed
     */
    public function get(){
        $this->setNewsArtical();

        return $this->newsArtical;
    }

    /**
     * 获取新闻内容
     * 需要指明typeid的值
     * @return $this
     */
    public function setNewsArtical(){
        $newsArtical = App::service('Archives')->options('Archives');
        $this->newsArtical = $newsArtical->setParam(['typeId'=>7])->getArtical();

        return $this;
    }

}