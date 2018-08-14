<?php
namespace qingminHospital\module\api\controls;

use App;
use EFrame\base\Control;
use EFrame\Helper\T;
use qingminHospital\module\api\models\Arctype;
use qingminHospital\module\api\models\ArticalList;
use qingminHospital\module\api\models\Informations;
use qingminHospital\module\api\models\Personage;
use qingminHospital\module\api\models\Flink;
use qingminHospital\module\api\models\MyAD;


class Index extends Control
{

    /**
     * 操作名称以action开头
     */
    function actionIndex(){
        
        //返回前端的数据
        $data = array();
        
        //获取栏目名称
        $data["arctype"] = (new Arctype())->getArctype();
        
        $articalList = new ArticalList();
        
        //引用标题推荐
        $data['recommendHeadlines'] = [
            'tyleNmae' => '医院最新发布：',   //分类名称
            'list' => $articalList->setParams('a', 10)->getArtical(),
        ];
        
        //橱窗新闻推荐
        $data['windowNewsrecommendation'] = $articalList->setParams('h', 3)->getArtical();
        
        $informations = new Informations();
        
        //新闻推荐列表
        $data['newsRecommendationList'] = [
            'typename' => '医院新闻',       //类型所属分类名称
            'typehref' => 'articles5a33.html?classid=60', //指向所属栏目的路由
            'list' => $informations->setFlag('h', 11)->getInfors(),
        ];
        
        //最新公告列表
        $data['lateStannouncement'] = [
            'typename' => '最新公告',       //类型所属分类名称
            'typehref' => 'articles5a33.html?classid=60', //指向所属栏目的路由
            'list' => $articalList->setParams('c', 10)->getArtical(),
        ];
        
        //服务项目方阵
        
        
        //带边框标题列表
        $data['aListOfHeadlinesWithABorder'] = [
            'themeimg' => '/images/q10.jpg',       //主题图片
            'list' => $articalList->setParams('c', 8)->getArtical(),
        ];
        
        //专家介绍 
        $personage = new Personage();
        $data['personageIntroduction'] = [
            'typename' => '专家介绍',                         //类目名称
            'typehref' => '/api/general/expert',            //类目列表路由
            'personage' => $personage->setParams('12', 'c', '5')->getPersonage(),
        ];
        
        
        //设备展示
        $data['bottomAdvertision'] = [
            'themeimg' => '/images/as.jpg',       //主题图片
            'list' => $articalList->setParams('', 8, 15)->getArtical()
        ];
        
        //头部轮播广告
        $data['banner'] = (new MyAD())->setParams('header_banner1')->getResource();
        
        
        //友情链接
        $flink = new Flink();
        $data['friendLink'] =[
            'typename' => '友情链接',       //主题图片
            'list' => $flink->setParams(5,6)->getFlink(),
        ];
        
        return $this->render('index',$data);
    }
    
}