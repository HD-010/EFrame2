<?php
namespace myWay\module\api\servicese;

use App;
use EFrame\Helper\T;

/**
 * 栏目信息
 * 该服务类获取栏目信息，当前限顶级栏目和子栏目两级
 * 该类的调用新人服务类的调用规则，方法如下：
 * //获取Arctype服务
 * $arctype = App::service('Arctype')->options('Arctype');
 * //调用Arctype服务中的getArctype()方法
 * $this->arctype = $arctype->getArctype();
 * Class Arctype
 * @package myWay\module\api\servicese
 */
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

    /**
     * 设置topid 如果topid = null,则取所有顶级栏目的子栏目。否则则指定栏目的所有子栏目
     * @param null $topId
     * @return $this
     */
    public function setTopId($topId=null){
        $this->topId = $topId ? " = ".$topId : " in (select `id` from @#_arctype where topid = '0')";

        return $this;
    }

    /**
     * 获取顶级栏目信息
     * @return $this
     */
    protected function setArctypeTop(){
        
        //查找顶级栏目（总的有两级）
        $o = [
            [
                "@#_arctype" => [
                    "id","topid","typename","typedir",
                ],
                "@#_channeltype" =>[
                    "nid","typename as nname","maintable","addtable",
                ]
            ],
            "WHERE" => [
                "@#_arctype.topid='0'",
            ],
            "LEFT_JOIN" => [
                "@#_channeltype" => "ON @#_channeltype.id=@#_arctype.channeltype",
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


    /**
     * 获取子级栏目信息
     * @return $this
     */
    protected function setArctypeSun(){
        //设置顶级栏目id
        //$this->setTopId();
        //查找子栏目
        $o = [
            [
                "@#_arctype" => [
                    "id","topid","typename","typedir",
                ],
                "@#_channeltype" =>[
                    "nid","typename as nname","maintable","addtable",
                ]
            ],
            "WHERE" => [
                "@#_arctype.topid ".$this->topId,
            ],
            "LEFT_JOIN" => [
                "@#_channeltype" => "ON @#_channeltype.id=@#_arctype.channeltype",
            ],
            "ORDER_BY" => [
                "@#_arctype.topid",
            ],
            
        ];
     
        $arctypeSun = App::DB()->selectCommond($o)->query()->fetchAll();
        //T::print_pre($sunArctype);
        $this->arctypeSun = $arctypeSun;

        return $this;
    }

    /**
     * 合并子栏目到顶级栏目
     * @return $this
     */
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

