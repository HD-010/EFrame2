<?php 
namespace qingminhospital\module\api\models;

use App;
use EFrame\Helper\T;


//获取文章列表
class ArticalList
{
    protected $typeid;
    protected $flag;        //标签
    protected $total;       //文章列表数量
    protected $articalList; //文件列表
    
    public function getArticalList(){
        $queryString  = $_SERVER['REQUEST_URI']; 
        T::print_pre($queryString);
        
    }
    
    
    /**
     * a获取文章列表
     * @return unknown
     */
    public function getArtical(){
        $this->setFlagArtical();
        return $this->articalList;
    }
    
    //获取特荐文章
    protected function setFlagArtical(){
        if($this->flag) $where[] = "flag like '%".$this->flag."%'";
        $where[] = is_array($this->typeid) ? "typeid in ('".implode($this->typeid, "','")."')" : "typeid='".$this->typeid."'";
        //T::print_pre($where);
        
        //查找顶级栏目（总的有两级）
        $o = [
            [
                "@#_archives" => [
                    "id","typeid","title as name","litpic",
                ],
            ],
            "WHERE" => $where,
            
            "ORDER_BY" => [
                "sortrank",
            ],
            
        ];
        if($this->total) $o['LIMIT'] = "0,$this->total";
        
        //echo App::DB()->selectCommond($o)->showQuery().'<br/>';
        $this->articalList = App::DB()->selectCommond($o)->query()->fetchAll();
        
        return $this;
        
    }
    
    /**
     * 设置标记文章参数
     * @param unknown $flag
     * @param unknown $number
     * @param unknown $typeid
     * @return \qingminhospital\module\api\models\ArticalList
     */
    public function setParams($flag=null,$number=null,$typeid=null){
        $this->flag = $flag;
        $this->total = $number;
        $this->typeid = $typeid;
        
        return $this;
    }
    /**
     * 设置标记文章参数
     * @param unknown $flag
     * @param unknown $number
     * @param unknown $typeid
     * @return \qingminhospital\module\api\models\ArticalList
     */
    public function setParam($parmArr){
        $this->flag = T::arrayValue('flag', $parmArr);
        $this->total = T::arrayValue('total', $parmArr);
        $this->typeid = T::arrayValue('typeid', $parmArr);
        
        return $this;
    }
    
    
    
    
}


?>