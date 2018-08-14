<?php
return [
    'params' => [
        //定义网站根目录
        '@webroot' =>  dirname(__DIR__).'\web',
        //定义app根目录
        '@root' => dirname(__DIR__),    //当前文件所在目录的父目录
        //定义用户视图配置参数路径
        '@viewConfig' => dirname(__DIR__).'\module\api\data',
    ],
];
