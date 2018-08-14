<?php 
namespace qingminhospital\module\api\models;

use App;
use EFrame\Helper\T;

class Flink
{
    protected $typeid;
    protected $total;
    protected $flink;
    
    public function getFlink(){
        $this->setFlink();
        return $this->flink;
    }
    
    public function setFlink(){
        if($this->typeid) $where[]="typeid='".$this->typeid."'";
        
        $o = [
            [
                "@#_flink" => [
                    "id","typeid","url","msg","logo",
                ],
            ],
            "WHERE" => $where,
            
            "ORDER_BY" => [
                "sortrank",
            ],
            
            "LIMIT" => "0,$this->total"
        ];
        
        $res = App::DB()->selectCommond($o)->query()->fetchAll();
        $this->flink = $res;
    }
    
    /**
     * 设置友情连接参数
     * @param unknown $typeid
     * @param unknown $total
     */
    public function setParams($typeid=null,$total=null){
        $this->typeid = $typeid ? $typeid : 1;
        $this->total = $total ? $total : 1;
        
        return $this;
    }
}