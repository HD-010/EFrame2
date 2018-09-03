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
    //首页页面模块数据
    'index_index'=>[
        //页面小部件名称 => '数据模型名称'  数据模型名称与models中的模型名称相应
        'header_0'=>'Navication_0',
        'sectionAbout_0' => 'ArctypeInfor_0|tid=25',
        'sectionVideo_0' => 'ArticalList_0|tid=28',
       
    ],
    
    //列表页关于我们模块数据
    'list_article_guanyuwomen' => [
        'header_1' => 'Navication_0',
    ],

    //列表页服务项目模块数据
    'list_article_fuwuxiangmu' => [
        'header_1' => 'Navication_0',
    ],
    
    //列表页主品中心模块数据
    'list_article_chanpinzhongxin' => [
        'header_1' =>'Navication_0',
    ],
    
    //列表页新闻资讯模块数据
    'list_article_xinwenzixun' => [
        'header_1' =>'Navication_0',
        'sectionNews_0' => 'ArticalList_0',
    ],
    
    //列表页案例展示模块数据
    'list_image_anlizhanshi' => [
        'header_1' =>'Navication_0',
        'case_0' => 'ArticalList_0',
    ],
    
    //列表页联系我们模块数据
    'list_article_lianxiwomen' => [
        'header_1' => 'Navication_0',
    ],
  
];