<?php
namespace myWay\module\api\models;

use App;
use EFrame\Helper\T;

class Arctype
{
    protected $arctype;         //所有栏目信息
    protected $arctypeTop;      //所有顶级栏目信息
    protected $arctypeSun;      //子栏目信息
    protected $topId;           //顶级id
    
    /**
     * 获取栏目信息（所有栏目信息）
     * 这个是获取栏目信息的入口方法，类中其他方法被该方法直接或间接调用
     */
    public function getArctype(){
        //获取顶级栏目、子栏目并将他们合并
        $this->setArctypeTop()->setArctypeSun()->heBinArctype();
        
        //返回栏目信息
        return $this->arctype;
    }
    
    /**
     * 获取子栏目信息
     * @return unknown
     * 调用该方法前需要调用 Arctype::setTopId();
     */
    public function getArctypeSun(){
        //获取子栏目信息
        $this->setArctypeSun();
        //返回栏目信息
        return $this->arctypeSun;
    }
    
    //获取顶级栏目信息
    protected function setArctypeTop(){
        
        //查找顶级栏目（总的有两级）
        $o = [
            [
                "@#_arctype" => [
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
   
    
    //查询顶级栏目信息子级栏目信息
    protected function setArctypeSun(){
        //设置顶级栏目id
        //$this->setTopId();
        //查找子栏目
        $o = [
            [
                "@#_arctype" => [
                    "id","topid","typename","typedir",
                ],
            ],
            "WHERE" => [
                "topid ".$this->topId,
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
    
    //设置topid
    protected function setTopId($topId=null){
        $this->topId = $topId ? " = ".$topId : " in (select `id` from @#_arctype where topid = '0')";
        
        return $this;
    }
    
    //合并子栏目到顶级栏目
    protected function heBinArctype(){
        //合并子栏目到顶级栏目
        for($i = 0; $i < count($this->arctypeSun); $i++){
            $topid = $this->arctypeSun[$i]['topid'];
            for($j = 0; $j < count($this->arctypeTop); $j ++){
                if(T::arrayValue($j.'.id', $this->arctypeTop) == $topid){
                    $this->arctypeTop[$j]['sun'][] = $this->arctypeSun[$i];
                }
            }
        }
        $this->arctype = $this->arctypeTop;
        
        return $this;
    }
    
    
}

