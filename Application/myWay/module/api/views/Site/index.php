<?php 
use EFrame\Helper\T;

$industroyCode = T::arrayValue('industroyCode',$data);
if(!is_array($industroyCode)) {
    echo "行业编码有误！";
    return;
}

$page = App::request()->get('v');

//根据视图模型名称和模型数据加载视图小部件
for($i = 0; $i < count($data['pagemodel']); $i ++){
    //视图模块名称
    $modelName = T::arrayValue('pagemodel.'.$i,$data,null);
    //header|footer适用于行业内所有页面，不按页面分类处理
    $widgetsName = preg_match('/header|footer/', $modelName) ? $modelName : $page.'_'.$modelName;
    //视图模块数据
    $modelData = T::arrayValue('modelData.'.$modelName,$data,null);
    //返回视图小部件
    $this->renderWidget($industroyCode[0].'\\'.$industroyCode[1].'\\'.$widgetsName,$modelData);
}



?>
