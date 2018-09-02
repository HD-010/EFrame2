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
        
        return $this->articalList;
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
     * 查询文章列表
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
        if($this->typeId) $q['WHERE'][] = "@#_madd.clsid = (select id from @#_myadtype WHERE typename='".$this->typeMame."')";
        $q['LIMIT'] = "0,10";

        $res = App::DB()->selectCommond($q)->query()->fetchAll();
        //添加数据状态
        $this->myadList = T::addStatus($res);

        return $this;
    }


    /**
     * 查询文章内容
     * @return $this
     */
    protected function setArtical(){
        $q = [
            [
                "@#_archives" => [
                    'id','writer','pubdate','litpic','keywords','title','description','click'
                ],
                $this->addonTable => [
                    "*",
                ],
            ],
            "LEFT_JOIN" =>[
                $this->addonTable => " ON @#_archives.id = ".$this->addonTable . ".aid",
            ],
        ];

        if($this->aid) $q['WHERE'][] = "@#_archives.id = $this->aid";


        //echo App::DB()->selectCommond($q)->showQuery();exit;
        $res = App::DB()->selectCommond($q)->query()->fetch(1);
        $this->artical = T::addStatus($res);

        return $this;
    }

    /**
     * 查询附加表
     * @return $this
     */
    protected function setAddonTable(){
        $q = [
            [
                '@#_channeltype' => [
                    'addtable'
                ],
            ],
        ];
        //组织查询条件
        if($this->typeId) $q['WHERE'][] =  "id = (SELECT channel from @#_archives WHERE typeid = $this->typeId LIMIT 1)";
        $q['LIMIT'] = '0,1';
        //执行查询语句
        $res = App::DB()->selectCommond($q)->query()->fetch();
        //T::print_pre($res);
        $this->addonTable = $res['addtable'];

        return $this;
    }

}
?>