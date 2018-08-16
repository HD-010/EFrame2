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
    protected $articalList;

    /**
     * 返回文章列表
     * @return mixed
     */
    public function get(){
        $this->setArticalList();

        return $this->articalList;
    }

    /**
     * 获取文章列表
     * 需要指明typeid的值
     * @return $this
     */
    protected function setArticalList(){
        $articalList = App::service('Archives')->options('Archives');
        $this->articalList = $articalList->setParam(['typeId'=>6])->getList();

        return $this;
    }
}