<?php
/**
 * 说明：当前配置是一个新模块的开始
 * msn是行业行业唯一标识。结构如：industry首字母+行业代码+｜+子类行业代码
 * pageModel定义了页面模型的组成结构。
 * 如键名index,表示页面名称为index，对应视图views/index.php
 *   键值是一个集合，每一个元素都为组成该页面的一个模型。
 *   如模型“header_0”,对应小部件widgets/行业代码/子行业代码/header_0.php
 *   
 *   关开小部件的数据配置，在modelData/行业代码/子行业代码/  中有介绍
 *   
 */
return $modelConfig = [
    //model首字母+sn => 'industry首字母+行业代码+｜+子类行业代码
    'msn' => 'i_2410|223',         //i当前用户所属行业的模板编号，系统会根据编号加载当前用户可用的视图模块
    //当前用户已配置好的页面模块名称
    'pageModel' => [
        //视图文件名称
        //首页模块名称
        'index_index' => [
            //页面头部
            'header_0',
            //头部广告
            'banner_0',
            //首页导航
            'navication_0',
            //首页商品推荐
            'product_0',
            //关于我们
            'about_0',
            //成功案例
            'case_0',
            //最新资讯
            'message_0',

            'footer_0'
        ],   
    ]


];