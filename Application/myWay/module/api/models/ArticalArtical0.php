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
 * Class ArticalArtical0
 * 文章内容类
 * @package myWay\module\api\models
 */
class ArticalArtical0
{

    protected $articalArtical;

    /**
     * 返回文章内容
     * @return mixed
     */
    public function get(){
        $this->setArticalArtical();

        return $this->articalArtical;
    }

    /**
     * 获取文章内容
     * 需要指明typeid的值
     * @return $this
     */
    public function setArticalArtical(){
        $articalArtical = App::service('Archives')->options('Archives');
        $this->articalArtical = $articalArtical->setParam(['typeId'=>7])->getArtical();

        return $this;
    }

}