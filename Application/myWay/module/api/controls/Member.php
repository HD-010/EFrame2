<?php
namespace myWay\module\api\controls;

use App;
use EFrame\base\Control;
use EFrame\Helper\T;


/**
 * Class Member
 * 测试地址：http://newway.eframe2.e01.ren/api/member/singIn
 * 参数m:model id 与modelConfig,modelData,modelStyle的文件名称对应
 * 参数v:需要展示的页面名称
 * @package myWay\module\api\controls
 */
class Member extends Control
{
    //注册
    public function actionSingUp(){
        $this->layOut('main_singUp')->render('singUp');
    }
    
    //登录
    public function actionSingIn(){
        $this->layOut('main_singIn')->render('singIn');
    }
    
    //修改密码
    public function actionSingNewPassword(){
        $this->layOut('main_singNewPassword')->render('newPassword');
    }
    
    
}