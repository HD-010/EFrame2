<?php
namespace qingminhospital\module\api\models;

use App;
use EFrame\Helper\T;

class DownProcess
{
    protected $typeid;      //
    protected $flag;        //标签
    protected $total;       //文章列表数量
    protected $filesList; //文件列表
    
    
    /**
     * a获取文章列表
     * @return unknown
     */
    public function getFilesList(){
        $this->setFlagFiles();
        return $this->filesList;
    }
    
    //获取特荐文章
    protected function setFlagFiles(){
        //查找顶级栏目（总的有两级）
        $o = [
            [
                "@#_archives" => [
                    "id","typeid","title","litpic","pubdate",
                ],
                "@#_addonsoft" => [
                    "softsize","softlinks",
                ],
            ],
            
            "ORDER_BY" => [
                "sortrank",
            ],
            
            "LEFT_JOIN" =>[
                "@#_addonsoft" => " ON @#_archives.id=@#_addonsoft.aid",
            ],
            
            "LIMIT" => "0,$this->total"
        ];
        if($this->flag) $o['WHERE'][] = "@#_archives.flag like '%".$this->flag."%'";
        if($this->typeid) $o['WHERE'][] = "@#_archives.typeid = '".$this->typeid."'";
        
        //echo App::DB()->selectCommond($o)->showQuery();
        $this->filesList = App::DB()->selectCommond($o)->query()->fetchAll();
        
        return $this;
        
    }
    
    /**
     * 设置标记文章参数
     * @param unknown $typeid   类型id
     * @param unknown $flag     flag标签
     * @param unknown $number   获取记录的条数
     * @return \qingminhospital\module\api\models\Personage
     */
    public function setParams($param){
        $this->typeid = T::arrayValue('typeid', $param);
        $this->flag = T::arrayValue('flag', $param);
        $this->total = T::arrayValue('total', $param,25);
        
        return $this;
    }
}

