<?php 
use EFrame\Helper\T;

$industroyCode = T::arrayValue('industroyCode',$data);
if(!is_array($industroyCode)) {
    echo "行业编码有误！";
    return;
}

//声明视图类型：index,artical,image...  index表示首页，其它与channeltype表中nid一一对应
//默认为index,即展示首页
$pageType = App::request()->get('c','index');

//T::print_pre($data);
//根据视图模型名称和模型数据加载视图小部件
for($i = 0; $i < count($data['pagemodel']); $i ++){
    //视图模块名称
    $modelName = T::arrayValue('pagemodel.'.$i,$data,null);
    //echo "视图模块名称：".$modelName;
//     //视图模块前缀
     $widgetPrefix = App::$global['siteInfor']['widgetsPrefix'];
       //T::print_pre($widgetPrefix);
       //header|footer适用于行业内所有页面，不按页面分类处理
       $widgetsName = preg_match('/header_|footer_/', $modelName) ? $modelName : $widgetPrefix.$modelName;
//     echo "加载的小部件名称：".$widgetsName."<br/>";
//     //视图模块数据
       $modelData = T::arrayValue('modelData.'.$modelName,$data,null);

//     //返回视图小部件
//     //echo $industroyCode[0].'\\'.$industroyCode[1].'\\'.$widgetsName."<br/>";
       $this->renderWidget($industroyCode[0].'/'.$industroyCode[1].'/'.$widgetsName,$modelData);
}



?>
