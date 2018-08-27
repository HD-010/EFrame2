<?php

/**
 * modelDatad　在于配置视图模型与数据模型的对应关系
 * 如：
 * index 页面名称
 * key　　header_0 :小部件名称
 * value header_0 :小部件的数据模型名称
 * 小部件的数据模型名称与models目录中的模型对应
 * 
 */
return $modelData = [
    //页面名称
    'index'=>[
        //页面小部件名称 => '数据模型名称'  数据模型名称与models中的模型名称相应
        'header_0'=>'header_0',
        //页面小部件名称
        'navication_0' => 'navication_3',
        'NewsList_0'=>'NewsList_0',
        'ArticalList_0'=>'ArticalList_0',
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