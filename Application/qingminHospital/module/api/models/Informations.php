<?php
namespace qingminHospital\module\api\models;

use App;
use EFrame\Helper\T;

class Informations
{
    protected $typeid;      
    protected $flag;        //标签
    protected $total;       //文章列表数量
    protected $InforsList; //文件列表
    
    
    
    /**
     * a获取文章列表
     * @return unknown
     */
    public function getInfors(){
        $this->setFlagInfors();
        return $this->InforsList;
    }
    
    //获取特荐文章
    protected function setFlagInfors(){
        //查找顶级栏目（总的有两级）
        $o = [
            [
                "@#_archives" => [
                    "id","typeid","title","title as name","litpic","pubdate",
                ],
            ],
            "WHERE" => [],
            
            "ORDER_BY" => [
                "sortrank",
            ],
            
            "LIMIT" => "0,$this->total"
        ];
        
        //按flag查找
        if($this->flag) $o['WHERE'][] = "flag like '%".$this->flag."%'";
        //按typeid查找
        if($this->typeid) $o['WHERE'][] = "typeid = '".$this->typeid."'";
        
        //执行sql查询信息列表
        //echo App::DB()->selectCommond($o)->showQuery();
        $this->InforsList = App::DB()->selectCommond($o)->query()->fetchAll();
        
        return $this;
        
    }
    
    //设置信息查询参数
    public function setFlag($flag=null,$number=null,$typeid=null){
        $this->flag = $flag;
        $this->total = $number;
        $this->typeid = $typeid;
        
        return $this;
    }
    
    //设置信息查询参数,该方法为setFlag（）的升级
    public function setParams($params){
        $this->flag = T::arrayValue('flag', $params);
        $this->total = T::arrayValue('total', $params);
        $this->typeid = T::arrayValue('typeid', $params);
         
        return $this;
    }
    
}

