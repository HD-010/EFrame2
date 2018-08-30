<?php

/**
 * modelDatad　在于配置视图模型与数据模型的对应关系
 * 如：
 * index :页面名称。
 * key　　header_0 :小部件名称
 * value header_0|tid=9|l=news|a=arcital :小部件的数据模型名称|typeid=9|url指向的列表页名称＝news|url指向的内容页名称=artical
 * 如果是文章，'ArticalList_0|tid=9|l=news|a=arcital'表示typeid=9,与该模块相关的列表页名称是news，与该模块相关的内容页名称是arcital
 * 小部件的数据模型名称与models目录中的模型对应
 * |tid=9|ut=news|ua=artical
 */
return $modelData = [
    //页面名称
    'index'=>[
        //页面小部件名称 => '数据模型名称'  数据模型名称与models中的模型名称相应
        'header_0'=>'header_0',
        //页面小部件名称
        //'headerBanner_0' => 'HeaderBanner_0',
        //首页导航
        //'indexNavication_0'=>'Navication_0',
        //首页商品推荐
        'indexCommodityRecommendation_0'=>'ArticalList_0|c=image|v=personAge|tid=11|',
        //关于我们
        //'aboutMe_0'=>'ArctypeInfor_0',
        //成功案例
        //'succsessCase_0'=>'ArticalList_0|tid=9|l=news|a=artical',
        //最新资讯
        //'latestInformation_0'=>'ArticalList_0',
    ],

    
    'xinwenzhongxin' => [
        'header_0' => 'Header_0',
        'indexCommodityRecommendation_0' => 'ArticalList_0|tid=11|l=news|a=artical',
        'indexNavication_0' => 'Navication_0',
        'footer_0' => 'Footer_0',
    ]
];