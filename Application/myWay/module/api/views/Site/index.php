<?php 
use EFrame\Helper\T;

$industroyCode = T::arrayValue('industroyCode',$data);
if(!is_array($industroyCode)) {
    echo "行业编码有误！";
    return;
}

//根据视图模型名称和模型数据加载视图小部件
for($i = 0; $i < count($data['pagemodel']); $i ++){
    //视图模块名称
    $modelName = T::arrayValue('pagemodel.'.$i,$data,null);
    echo "视图模块名称:$modelName </br>";
    //视图模块数据
    $modelData = T::arrayValue('modelData.'.$modelName,$data,null);
    //返回视图小部件

    $this->renderWidget($industroyCode[0].'\\'.$industroyCode[1].'\\'.$modelName,$modelData);
}



?>
