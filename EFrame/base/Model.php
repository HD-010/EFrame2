<?php
namespace EFrame\base;

use \App;
/**
 * @author yx010
 * Module调用示例：
 * 在控制器中实例化Data模型并用调用updateData()方法：
 * require(App::params('@root').'/api/models/Data.php');
 * $res = App::model('Data')->updateData();
 */
class Model{
    
    
    /**
     * 初如化一个用户module
     * return 初始化的model实例
     */
    public function init($className){
        if(!isset(App::$model->$className)){
            $app = substr(App::params('@root'),strrpos(App::params('@root'),"\\")+1);
            $modelName = "\\$app\\module\\".App::module()."\\models\\".$className;
            eval("\$modelName = \"$modelName\";");
            
            //如果该model不存在，则 实例化 并返回
            return App::$model->$className = new $modelName;
        }
        
        return App::$model->$className;
    }
   
}