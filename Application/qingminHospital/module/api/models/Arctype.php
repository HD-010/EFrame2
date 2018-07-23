<?php
namespace qingminHospital\module\api\models;

use App;
use EFrame\Helper\T;

class Arctype
{
    protected $arctype;         //所有栏目信息
    protected $arctypeTop;      //所有顶级栏目信息
    protected $arctypeSun;      //子栏目信息
    
    
    /**
     * 获取栏目信息（所有栏目信息）
     * 这个是获取栏目信息的入口方法，类中其他方法被该方法直接或间接调用
     */
    public function getArctype(){
        //获取顶级栏目、子栏目并将他们合并
        $this->getArctypeTop()->getArctypeSun()->heBinArctype();
        
        //返回栏目信息
        return $this->arctype;
    }
    
    //获取顶级栏目信息
    public function getArctypeTop(){
        
        //查找顶级栏目（总的有两级）
        $o = [
            [
                "dedecms_arctype" => [
                    "id","topid","typename","typedir",
                ],
            ],
            "WHERE" => [
                "topid='0'",
            ],
            
            "ORDER_BY" => [
                "sortrank",
            ],
            
            "LIMIT" => '0,10'
        ];
        $arctypeTop = App::DB()->selectCommond($o)->query()->fetchAll();
        //T::print_pre(arctype);
        $this->arctypeTop = $arctypeTop;
        
        return $this;
    }
   
    
    //获取子级栏目信息
    public function getArctypeSun(){
        
        //查找子栏目
        $o = [
            [
                "dedecms_arctype" => [
                    "id","topid","typename","typedir",
                ],
            ],
            "WHERE" => [
                "topid in (select `id` from dedecms_arctype where topid = '0')",
            ],
            
            "ORDER_BY" => [
                "topid",
            ],
            
        ];
        $arctypeSun = App::DB()->selectCommond($o)->query()->fetchAll();
        //T::print_pre($sunArctype);
        $this->arctypeSun = $arctypeSun;

        return $this;
    }
    
    //合并子栏目到顶级栏目
    public function heBinArctype(){
        //合并子栏目到顶级栏目
        for($i = 0; $i < count($this->arctypeSun); $i++){
            $topid = $this->arctypeSun[$i]['topid'];
            $this->arctypeTop[$topid]['sun'][] = $this->arctypeSun[$i];
        }
        $this->arctype = $this->arctypeTop;
        
        return $this;
    }
    
    
}

