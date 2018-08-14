<?php
namespace qingminHospital\module\api\controls;

use App;
use EFrame\base\Control;
use EFrame\Helper\T;
use qingminHospital\module\api\models\Arctype;
use qingminHospital\module\api\models\ArcContent;
use qingminHospital\module\api\models\ArticalList;
use qingminHospital\module\api\models\ArcList;
use qingminHospital\module\api\models\MyAD;
use qingminHospital\module\api\models\DownProcess;


class Down extends Control
{

    /**
     * 操作名称以action开头
     */
    function actionIndex(){
        $data = array();
        //获取栏目名称
        $arctype = new Arctype();
        $data["arctype"] = $arctype->getArctype();
        
        //获取栏目内容
        $data['arcContent'] = (new ArcContent())->getContent();
        
        //获取栏目的子栏目
        $data['arctypeSon']= [
            'arctypeCurrent' => [
                'typedir' => $data['arcContent'][0]['typedir'],
                'typename' => $data['arcContent'][0]['typename'],
            ],
            'arctypeSon' => $arctype->setTopId($data['arcContent'][0]['id'])->getArctypeSun(),
        ];
        
        //获取医院专栏内容
        $articalList = new ArticalList();
        $data['propagandaColumn'] = [
            'serviceType' => [
                'typedir' => '/....',
                'typename' =>'医院专栏'
            ],
            'list' => $articalList->setParams('a', 10)->getArtical(),
        ];
        
        //医院动态
        $data['newsLeft'] = [
            'serviceType' => [
                'typedir' => '/....',
                'typename' =>'医院动态'
            ],
            'list' => $articalList->setParams('h', 10)->getArtical(),
        ];
        
        //头部轮播广告
        $data['banner'] = (new MyAD())->setParams('header_banner1')->getResource();
        
        //文件下载
        $data['filesList'] = [
            'typename' => "文件下载",
            'list' => (new DownProcess())->setParams([
                'typeid' => 9,
                'total' => 50,
            ])->getFilesList(),
        ];
        
        //T::print_pre($data);
        //echo __FILE__;
        return $this->render('index',$data);
    }
    
}