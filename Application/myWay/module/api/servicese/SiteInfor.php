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
    protected $sysConfig;
    
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
    
    /**
     * 获取系统配置信息
     */
    public function getSysConfig(){
        return $this->setSysConfig()->sysConfig;
    }

    /**
     * 查询系统配置信息
     * @return \myWay\module\api\servicese\SiteInfor
     */
    protected function setSysConfig(){
        $q = [
            [
                "@#_sysconfig" => [
                    "*",
                ],
            ],
        ];
        
        $res = App::DB()->selectCommond($q)->query()->fetchAll();
        //添加数据状态
        $this->sysConfig = T::addStatus($res);
        
        return $this;
    }

}
    


?>