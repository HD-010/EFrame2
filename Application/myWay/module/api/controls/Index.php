<?php
namespace myWay\module\api\controls;

use App;
use EFrame\base\Control;
use EFrame\Helper\T;


/**
 * Class Index
 * 测试地址：http://newway.eframe2.e01.ren/api/index/index?m=idk2584s&v=index
 * @package myWay\module\api\controls
 */
class Index extends Control
{

    /**
     * 操作名称以action开头
     */
    function actionIndex(){
        //展示的页面名称
        $page = App::request()->get('v');
        $data = [];

        $userModelView = App::service('UserModelView')->options('UserModelView');
        //用户从事行业代码
        $data['industroyCode'] = $userModelView->getIndustroyCode();
        //用户视图模型配置
        $modelConfig = $userModelView ->parse('modelConfig')->get();
        //用户页面模型与数据模型的对照关系
        $modelData = $userModelView ->parse('modelData')->get();
        //当前页面模型对应的数据模型
        $models = T::arrayValue($page,$modelData);

        //加载数据模型
        $data['modelData'] = [];
        foreach($models as $key => $val){``
            //模型名称
            $modelNmae = str_replace('_','',ucfirst($val));
            //获取视图模型与其对应的数据
            $data['modelData'][$key] = App::model($modelNmae)->get();
        }
        //获取当前页面的视图名称
        $data['pagemodel'] = T::arrayValue('pageModel.'.$page,$modelConfig);

        return $this->render('index',$data);
    }
    
}