<?php 
namespace myWay\module\api\servicese;

use App;
use EFrame\Helper\T;

/**
 * 站点信息服务类
 * Class SiteInfor
 * @package myWay\module\api\servicese
 */
class SiteInfor{
    
    /**
     * 获取网站信息
     * @return string[]
     */
    public function getInfor(){
        return [
            'siteName' => '安防监控类网站模板',
            'logo' => '/static/images/system/logo.png',
            'idk' => App::$request->get('m'),
        ];
    }

    

}
    


?>