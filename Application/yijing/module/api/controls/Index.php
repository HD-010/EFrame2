<?php
namespace yijing\module\api\controls;

use App;
use EFrame\base\Control;
use yijing\module\api\models\JiuGong;
use yijing\module\api\models\ShiErGong;
use EFrame\Helper\T;

class Index extends Control
{

    /**
     * 操作名称以action开头
     */
    function actionIndex(){
        
        
        $o = [
            [
                "dedecms_channeltype" => [
                    "*",
                ],
            ],
            
            "LIMIT" => '0,1'
        ];
        
        
        //$sql = App::DB()->queryR($o);
        $res = App::DB()->selectCommond($o)->query()->fetchAll();
        //T::print_pre($res);
        return $this->render('index',$res);
    }
    
    function actionTest(){
        $obj = [
            'jieQi'   => '立春',
            'juShu'   => '8',
            'nianZhu' => [
                'tianGan' => 'yi3',
                'diZhi' =>'chou3'
            ],
            'yueZhu'  => [
                'tianGan' => 'yi3',
                'diZhi' =>'chou3'
            ],
            'riZhu'   => [
                'tianGan' => 'jia3',
                'diZhi' =>'wu3'
            ],
            'shiZhu'  => [
                'tianGan' => 'yi3',
                'diZhi' =>'chou3'
            ],
        ];
        $jiuGong = new JiuGong($obj);
        
        echo "<pre>".print_r($jiuGong,1)."</pre>";
        
        echo "<br/>值符星：";
        var_dump(JiuGong::$zhiFu);
        echo "<br/>值使门：";
        var_dump(JiuGong::$zhiShi);
        echo "<br/>孤位：";
        var_dump(JiuGong::$guWei);
        echo "<br/>虚位：";
        var_dump(JiuGong::$xuWei);
        echo "<br/>驿马星：";
        var_dump(JiuGong::$yiMa);
        echo "<br/>天马星：";
        var_dump(JiuGong::$tianMa);
        echo "<br/>丁马星：";
        var_dump(JiuGong::$dingMa);
        echo "<br/>十二宫状态：";
        
        $shiErGong = new ShiErGong();
        $ShiErGongState = $shiErGong->getShiErGongState("ren2", 3);
        print_r($ShiErGongState);
        
    }
}