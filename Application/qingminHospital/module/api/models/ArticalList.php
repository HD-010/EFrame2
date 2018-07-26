<?php 
namespace qingminHospital\module\api\models;

use App;
use EFrame\Helper\T;


//获取文章列表
class ArticalList
{
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
        //查找顶级栏目（总的有两级）
        $o = [
            [
                "qingminhospital_archives" => [
                    "id","typeid","title as name",
                ],
            ],
            "WHERE" => [
                "flag='".$this->flag."'",
            ],
            
            "ORDER_BY" => [
                "sortrank",
            ],
            
            "LIMIT" => "0,$this->total"
        ];
        $this->articalList = App::DB()->selectCommond($o)->query()->fetchAll();
        
        return $this;
        
    }
    
    //设置标记文章参数
    public function setFlag($flag,$number){
        $this->flag = $flag;
        $this->total = $number;
        
        return $this;
    }
    
}


?>