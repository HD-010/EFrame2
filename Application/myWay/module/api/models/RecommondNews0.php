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

class RecommondNews0
{
    protected $newsList;

    public function get(){
        $this->setNewsList();

        return $this->newsList;
    }

    //获取新闻列表
    public function setNewsList(){
        $newsList = App::service('Archives')->options('Archives');
        $this->newsList = $newsList->getList();

        return $this;
    }
}