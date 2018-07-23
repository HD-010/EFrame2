<?php
return [
    'params' => [
        //定义网站根目录
        '@webroot' =>  dirname(__DIR__).'\web',
        //定义app根目录
        '@root' => dirname(__DIR__),    //当前文件所在目录的父目录
        //web服务器地址
        '@webServer' => "http://e01.ren:8383",
        
    ],
];
