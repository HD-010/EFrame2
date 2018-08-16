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
    protected $newsList;

    /**
     * 返回新闻列表
     * @return mixed
     */
    public function get(){
        $this->setNewsList();

        return $this->newsList;
    }

    /**
     * 获取新闻列表
     * 需要指明typeid的值
     * @return $this
     */
    protected function setNewsList(){
        $newsList = App::service('Archives')->options('Archives');
        $this->newsList = $newsList->setParam(['typeId'=>7])->getList();

        return $this;
    }
}