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
 * Class ArticalArtical0
 * 文章内容类
 * @package myWay\module\api\models
 */
class ArticalArtical0
{
    protected $typeId;
    protected $articalArtical;

    /**
     * 返回文章内容
     * @param $param  模块参数（modelData携带的参数）
     * @return mixed
     */
    public function get($param=null){
        $this->initParams($param)->setArticalArtical();

        return $this->articalArtical;
    }
    
    /**
     * 初始化参数
     */
    protected function initParams($param){
        //模块中设置的默认typeid,如果没有设置则使用系统定义的默认值
        $typeId = T::getStrVal('tid',$param,7);
        
        //获取获取url中的栏目id参数，如查没有则采用模块中的设置　的
        $this->typeId = App::request()->get('tid',$typeId);
        
        return $this;
    }

    /**
     * 获取文章内容
     * 需要指明typeid的值
     * @return $this
     */
    public function setArticalArtical(){
        $articalArtical = App::service('Archives')->options('Archives');
        $this->articalArtical = $articalArtical->setParam(['typeId'=>$this->typeId])->getArtical();

        return $this;
    }

}