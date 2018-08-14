<?php
/**
 * 栏目列表模块3
 * Created by PhpStorm.
 * User: yx010
 * Date: 2018/8/14
 * Time: 19:50
 */

namespace myWay\module\api\models;

use App;
use EFrame\Helper\T;

class Navication3
{
    protected $arctype;             //栏目信息

    public function get(){
        $this->setArctype();
        $this->processDependence();

    }

    //获取栏目列表的所有信息
    //获取顶级栏目列表信息
    public function setArctype(){

        $o = [
            [
                "@#_arctype" => [
                    "id","topid",
                ],
            ],
            "WHERE" => [
                "topid='0'",
            ],

            "ORDER_BY" => [

                "topid, sortrank",
            ],

            "LIMIT" => '0,50'
        ];

        $arctype = App::DB()->selectCommond($o)->query()->fetchAll();

        T::print_pre($arctype);
        $this->arctype = $arctype;

        return $this;
    }

    //处理菜单不同级别的依赖关系
    public function processDependence(){
        $topid = T::implodeArr('id',$this->arctype);


        T::print_pre($topid);
    }

}