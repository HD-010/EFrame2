<?php
namespace EFrame\base;

use \EFrame\base\View;
use \EFrame\Helper\T;

class Error extends View{
    
    /**
     * 定义404页面
     */
    public function error404(){
        echo "<b>:( 你访问的页面不存在!</b>";
        
        //$this->renderPartial($fileName);
    }
}
