<?php
namespace qingminHospital\module\api\controls;

use App;
use EFrame\base\Control;
use EFrame\Helper\T;
use qingminHospital\module\api\models\Arctype;
use qingminHospital\module\api\models\ArcContent;
use qingminHospital\module\api\models\ArticalList;
use qingminHospital\module\api\models\ArcList;

class General extends Control
{

    /**
     * 医院概况首页
     */
    public function actionIndex(){
        //返回前端的数据
        $data = array();
        
        //获取栏目名称
        $data["arctype"] = (new Arctype())->getArctype();
        
        
        
        //T::print_pre(App::config());
        //T::print_pre($data);
        return $this->render('index',$data);
    }
    
    /**
     * 
     * 医院简介
     */
    public function actionIntroduction(){
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
            'list' => $articalList->setFlag('a', 10)->getArtical(),
        ];
        
        //医院动态
        $data['newsLeft'] = [
            'serviceType' => [
                'typedir' => '/....',
                'typename' =>'医院动态'
            ],
            'list' => $articalList->setFlag('h', 10)->getArtical(),
        ];
        
        
        //T::print_pre($data);
        
        return $this->render('introduction',$data);
    }
    
    /**
     * 
     * 领导团队
     */
    public function actiongroup(){
        $data = array();
        //获取栏目名称
        $data["arctype"] = (new Arctype())->getArctype();
        return $this->render('group',$data);
    }
    
    /**
     * 
     * 专家介绍
     */
    public function actionExpert(){
        $data = array();
        //获取栏目名称
        $arctype = new Arctype();
        $data["arctype"] = $arctype->getArctype();
        
        //获取栏目列表
        $data['arcContent'] = (new ArcContent())->getContent();
        
        //获取栏目的子栏目
        $data['arctypeSon']= [
            'arctypeCurrent' => [
                'typedir' => $data['arcContent'][0]['typedir'],
                'typename' => $data['arcContent'][0]['typename'],
            ],
            'arctypeSon' => $arctype->setTopId($data['arcContent'][0]['id'])->getArctypeSun(),
        ];

        $data['arcList'] = (new ArcList())->getList();
        
        //获取医院专栏内容
        $articalList = new ArticalList();
        $data['propagandaColumn'] = [
            'serviceType' => [
                'typedir' => '/....',
                'typename' =>'医院专栏'
            ],
            'list' => $articalList->setFlag('a', 10)->getArtical(),
        ];
        
        //医院动态
        $data['newsLeft'] = [
            'serviceType' => [
                'typedir' => '/....',
                'typename' =>'医院动态'
            ],
            'list' => $articalList->setFlag('h', 10)->getArtical(),
        ];
        
        return $this->render('group',$data);
    }
    
}