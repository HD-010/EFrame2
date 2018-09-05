<?php

/**
 * modelDatad　在于配置视图模型与数据模型的对应关系
 * 如：
 * index :页面名称。
 * key　　header_0 :小部件名称
 * value header_0|tid=9|... 模块名称及模块参数
 * 当前可用参数：
 * v|c|tid|aid|topid|

 */
return $modelData = [
    //首页页面模块数据
    'index_index'=>[
        //页面小部件名称 => '数据模型名称'  数据模型名称与models中的模型名称相应
        'header_0'=>'Navication_0',
        'sectionAbout_0' => 'ArctypeInfor_0|tid=25',
        //'sectionVideo_0' => 'ArticalList_0|tid=28',
        'sectionCase_0' => 'ArticalList_0|tid=29',
        'sectionMessage_0' => 'ArticalList_0|topid=28',
        'footer_0' => 'Navication_0',
    ],

    //配置搜索模块数据
    'list_search_search' => [
        'header_0' => 'Navication_0',
        'sectionSearch_0' => 'SearchArtical_0',
        'footer_0' => 'Navication_0'
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
        'footer_0' => 'Navication_0',
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
    
    //内容页公司新闻模块数据
    'article_article_gongsixinwen' => [
        'header_1' => 'Navication_0',
        'sectionArticle_0' => 'ArticalArtical_0',
    ],
    
    //内容页行业资讯模块数据
    'article_article_xingyezixun' => [
        'header_1' => 'Navication_0',
        'sectionArticle_0' => 'ArticalArtical_0',
    ], 
    
    //内容页行业资讯模块数据
    'article_image_anlizhanshi' => [
        'header_1' => 'Navication_0',
        'sectionImage_0' => 'ArticalArtical_0',
    ]
  
];