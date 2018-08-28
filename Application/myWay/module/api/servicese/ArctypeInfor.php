<?php
namespace myWay\module\api\servicese;

use App;
use EFrame\Helper\T;

/**
 * 栏目内容
 * 该服务类获取栏目内容
 * 该类的调用新人服务类的调用规则，方法如下：
 * 
 */
class ArctypeInfor
{
    protected $arctype;         //所有栏目信息
    protected $typeId;          //栏目id
    
    /**
     * 获取栏目信息（所有栏目信息）
     * 这个是获取栏目信息的入口方法，类中其他方法被该方法直接或间接调用
     */
    public function getContent(){
        //获取顶级栏目、子栏目并将他们合并
        $this->setArctype();
        //返回栏目信息
        return $this->arctype;
    }
    
    //设置参数
    public function setParam($param = []){
        //设置栏目id
        $this->typeId = T::arrayValue('typeId', $param,false);
        
        return $this;    
    }
    
    //设置栏目信息
    protected function setArctype(){
        //查找栏目内容信息
        $o = [
            [
                "@#_arctype" => [
                    "*",
                ],
            ],
            "LIMIT" => '0,10'
        ];
        
        //添加查询条件
        if($this->typeId) $o['WHERE'] = "@#_arctype.id='".$this->typeId."'";
        $o['LIMIT'] = '0,1';
        
        //执行查询语句
        $arctype = App::DB()->selectCommond($o)->query()->fetchAll();
        $this->arctype = T::addStatus($arctype);
        
        return $this;
    }
    
    
}

