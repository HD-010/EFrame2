<?php
namespace myWay\module\api\controls;

use App;
use EFrame\base\Control;
use EFrame\Helper\T;


/**
 * Class Site
 * 测试地址：http://newway.eframe2.e01.ren/api/site/index?m=idk2584s&v=index
 * 参数m:model id 与modelConfig,modelData,modelStyle的文件名称对应
 * 参数v:需要展示的页面名称
 * @package myWay\module\api\controls
 */
class Site extends Control
{

    /**
     * 操作名称以action开头
     */
    function actionIndex(){
        //展示的页面类型:展示的页面类型分为:index,list,artical等
        $type = App::request()->get('t');
        //展示的页面名称
        $page = App::request()->get('v');
        $data = [];
        
        //网站信息
        $siteInfor = App::service('SiteInfor')->options('SiteInfor');
        App::$global['siteInfor'] = $siteInfor->getInfor();
        //用户视图模块
        $userModelView = App::service('UserModelView')->options('UserModelView');
        //用户从事行业代码
        $data['industroyCode'] = $userModelView->getIndustroyCode();
        //用户视图模型配置
        $modelConfig = $userModelView ->parse('modelConfig')->get();
        //用户页面模型与数据模型的对照关系
        $modelData = $userModelView ->parse('modelData')->get();
        //当前页面模型对应的数据模型
        $models = T::arrayValue($page,$modelData);
        //T::print_pre($models);exit;

        //加载数据模型
        $data['modelData'] = [];
        foreach($models as $key => $val){
            //模型名称
            $modelNmae = str_replace('_','',T::getStrVal(0, $val));
            //获取视图模型与其对应的数据
            //echo "加载的数据模型：$modelNmae";
            $data['modelData'][$key] = App::model($modelNmae)->get($val);
        }
        
        //获取当前页面的视图名称
        $data['pagemodel'] = T::arrayValue('pageModel.'.$page,$modelConfig);
        //T::print_pre($data);exit;
        return $this->render('index',$data);
    }
    
}