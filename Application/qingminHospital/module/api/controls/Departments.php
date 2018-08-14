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
use qingminHospital\module\api\models\Informations;

class Departments extends Control
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
            'list' => $articalList->setParam(['flag'=>'a', 'total'=>10])->getArtical(),
        ];
        
        //医院动态
        $data['newsLeft'] = [
            'serviceType' => [
                'typedir' => '/....',
                'typename' =>'医院动态'
            ],
            'list' => $articalList->setParam(['flag'=>'h', 'total'=>10])->getArtical(),
        ];
        
        //头部轮播广告
        $data['banner'] = (new MyAD())->setParams('header_banner1')->getResource();
        
        //文章标题列表展示模块
        $data['articalListTtitle']['clumns'] = $arctype->setTopId('3')->getArctypeSun();
        
        //查找多维数组中同所有id的值(这里是栏目id)
        $id = T::implodeArr('id', $data['articalListTtitle']['clumns']);
        $data['articalListTtitle']['arclist'] = $articalList->setParam(['typeid'=>$id])->getArtical();
        
        //T::print_pre(App::config());
        //echo __FILE__;
        return $this->render('index',$data);
    }
    
    /**
     * 职能科室
     * @return unknown
     */
    public function actionFunctional(){
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
        
        //文章内容展示模块
        $data['newsListTitle'] = [
            'typename' => "职能科室",
            'list' => (new Informations())->setParams([
                'typeid'=>16,
                //'flag' => 'p',
                'total' => 50
            ])->getInfors(),
        ];
        

        //echo __FILE__;
        return $this->render('functional',$data);
    }
    
    //临床科室
    public function actionClinical(){
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
        
        //文章内容展示模块
        $data['newsListTitle'] = [
            'typename' => "监床科室",
            'list' => (new Informations())->setParams([
                'typeid'=>17,
                //'flag' => 'p',
                'total' => 50
            ])->getInfors(),
        ];
        
        
        //echo __FILE__;
        return $this->render('clinical',$data);
    }
    
    
    //医技科室
    public function actionTechnology(){
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
        
        //文章内容展示模块
        $data['newsListTitle'] = [
            'typename' => "医技科室",
            'list' => (new Informations())->setParams([
                'typeid'=>18,
                //'flag' => 'p',
                'total' => 50
            ])->getInfors(),
        ];
        
        
        //echo __FILE__;
        return $this->render('technology',$data);
    }
    
}