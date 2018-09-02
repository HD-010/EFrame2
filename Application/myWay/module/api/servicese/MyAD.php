<?php 
namespace myWay\module\api\servicese;

use App;
use EFrame\Helper\T;

/**
 * 广告服务类
 * Class Archives
 * 调用url案例：
 *
 * @package myWay\module\api\servicese
 */
class MyAD{
    protected $myadList;
    protected $typeName;

    /**
     * 获取文章列表
     * 调用文章列表服务需要传入以下参数：
     * tid
     * ps
     * cp
     * flag
     * @return mixed
     */
    public function getList(){
        $this->setList();
        
        return $this->myadList;
    }

    /**
     * 设置参数
     * param = ['typeId'=>7]
     */
    public function setParam($param = []){
        $this->typeName = T::arrayValue('typeName',$param,null);

        return $this;
    }

    /**
     * 查询广告列表
     * @return $this
     */
    protected function setList(){
        $q = [
            [
                "@#_myad" => [
                    "normbody","expbody",
                ],
            ],
        ];

        //添加查询条件

        if($this->typeName) $q['WHERE'][] = "@#_myad.clsid = (select id from @#_myadtype WHERE typename='".$this->typeName."')";
        $q['LIMIT'] = "0,10";
        echo App::DB()->selectCommond($q)->showQuery();
        $res = App::DB()->selectCommond($q)->query()->fetchAll();
        //添加数据状态
        $this->myadList = T::addStatus($res);

        return $this;
    }

}
?>