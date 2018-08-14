<?php 
namespace qingminhospital\module\api\models;

use App;
use EFrame\Helper\T;

class Personage
{
    protected $typeid;      //
    protected $flag;        //标签
    protected $total;       //文章列表数量
    protected $PersonageList; //文件列表
    
    
    /**
     * a获取文章列表
     * @return unknown
     */
    public function getPersonage(){
        $this->setFlagPersonage();
        return $this->PersonageList;
    }
    
    //获取特荐文章
    protected function setFlagPersonage(){
        //查找顶级栏目（总的有两级）
        $o = [
            [
                "@#_archives" => [
                    "id","typeid","title as name","litpic",
                ],
                "@#_addonpersonage" => [
                    "department","post","qq","introduce",
                ],
            ],
            "WHERE" => [
                "@#_archives.flag like '%".$this->flag."%'",
                "@#_archives.typeid = '".$this->typeid."'",
            ],
            
            "ORDER_BY" => [
                "sortrank",
            ],
            
            "LEFT_JOIN" =>[
                "@#_addonpersonage" => " ON @#_archives.id=@#_addonpersonage.aid",
            ],
            
            "LIMIT" => "0,$this->total"
        ];
  
        $this->PersonageList = App::DB()->selectCommond($o)->query()->fetchAll();
        
        return $this;
        
    }
    
    /**
     * 设置标记文章参数
     * @param unknown $typeid   类型id
     * @param unknown $flag     flag标签
     * @param unknown $number   获取记录的条数
     * @return \qingminhospital\module\api\models\Personage
     */
    public function setParams($typeid,$flag,$number){
        $this->typeid = $typeid;
        $this->flag = $flag;
        $this->total = $number;
        
        return $this;
    }
}

