<?php

/**
 * modelDatad　在于配置视图模型与数据模型的对应关系
 * 如：
 * index 页面名称
 * key　　header_0 :小部件名称
 * value header_0|tid=9|uc=news|ua=arcital :小部件的数据模型名称|typeid=9|url指向的频道名称＝news|url指向的内容页名称=artical
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
        'indexNavication_0'=>'Navication_0',
        //首页商品推荐
        'indexCommodityRecommendation_0'=>'ArticalList_0',
        //关于我们
        'aboutMe_0'=>'ArctypeInfor_0',
        //成功案例
        'succsessCase_0'=>'ArticalList_0|tid=9|uc=news|ua=arcital',
        //最新资讯
        'latestInformation_0'=>'ArticalList_0',
    ],
    //页面名称
    'news' => [
        //页面小部件名称 => '数据模型名称'  数据模型名称与models中的模型名称相应
        'header_2' => 'header_0',
        //页面小部件名称
        'navication_0' => 'navication_3',
        'newsList_0' => 'newsList_0',
        'footer_0'  => 'footer_0'
    ],
];