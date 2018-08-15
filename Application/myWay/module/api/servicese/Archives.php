<?php 
namespace myWay\module\api\servicese;

use App;
use EFrame\Helper\T;

class Archives{
    protected $typeId;              //栏目id
    protected $aid;                 //文章id
    protected $flag;                //文章标签
    protected $articalList;         //文章列表
    protected $artical;             //文章内容
    protected $addonTable;          //付加表
    protected $pageSize;            //分面步长
    protected $currentPage;         //当前页

    /**
     * 获取文章列表
     * @return mixed
     */
    public function getList(){
        //初始化typyid
        $this->typeId = App::request()->get('tid');
        //初始化分页步长
        $this->pageSize = App::request()->get('ps',20);
        //初始化当前页数
        $this->currentPage = App::request()->get('cp',1);
        $this->setList();

        return $this->articalList;
    }

    /**
     * 获取文章内容
     */
    public function getContent(){
        //初始化typeid，用于查找附加表
        $this->typeId = App::request()->get('tid');
        //初始化文章id(如果aid=-1表示aid错误，输入预置错误信息)
        $this->aid = App::request()->get('aid',-1);
        //初始化分页步长
        $this->pageSize = App::request()->get('ps',20);
        //初始化当前页数
        $this->currentPage = App::request()->get('cp',1);

        $this->setContent();
    }

    /**
     * 查询文章列表
     * @return $this
     */
    protected function setList(){
        $q = [
            [
                "@#_archives" => [
                    "*",
                ],
            ],
        ];

        //添加查询条件
        if($this->typeId) $q['WHERE'][] = '@#_archives.typeid = '.$this->typeId;
        if($this->flag) $q['WHERE'][] = '@#_archives.flag like %'.str_replace(',','%',$this->flag).'%';
        $q['LIMIT'] = "($this->currentPage - 1) * $this->pageSize, $this->pageSize";

        $res = App::DB()->selectCommond($q)->query()->fetchAll();
        //添加数据状态
        $this->articalList = T::addStatus($res);

        return $this;
    }


    /**
     * 查询文章内容
     * @return $this
     */
    protected function setContent(){
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
        $q['LIMIT'] = "($this->currentPage - 1) * $this->pageSize, $this->pageSize";
        $res = App::DB()->selectCommond($q)->query()->fetchAll();
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
            'WHERE'=>[
                'id = $this->typeid',
            ]
        ];
        $res = App::DB()->selectCommond($q)->query()->fetchOne();

        $this->addonTable = $res['addtable'];

        return $this;
    }

}
    


?>