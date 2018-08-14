<?php
namespace EFrame\base;

use \EFrame\base\View;
use \EFrame\Helper\T;

class Control extends View{
    
    /**
     * 将对象以json格式输出
     * @param unknown $data
     */
    public function renderJson($data){
        T::outJson($data);
    }

}
