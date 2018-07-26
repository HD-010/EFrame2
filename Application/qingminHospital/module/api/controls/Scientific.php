<?php
namespace qingminHospital\module\api\controls;

use App;
use EFrame\base\Control;
use EFrame\Helper\T;
use qingminHospital\module\api\models\Arctype;
use qingminHospital\module\api\models\ArticalList;

class Scientific extends Control
{

    /**
     * 操作名称以action开头
     */
    function actionIndex(){
        //返回前端的数据
        $data = array();
        
        //获取栏目名称
        $data["arctype"] = (new Arctype())->getArctype();
        
        //T::print_pre(App::config());
        //T::print_pre($data);
        //echo __FILE__;
        return $this->render('index',$data);
    }
    
    function actionManage(){
        //返回前端的数据
        $data = array();
        
        //获取栏目名称
        $data["articalList"] = (new ArticalList())->getArticalList();
        
        //T::print_pre(App::config());
        T::print_pre($data);
        //echo __FILE__;
        //return $this->render('index',$data);
    }
    
}