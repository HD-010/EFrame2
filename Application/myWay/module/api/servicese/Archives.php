<?php 
namespace myWay\module\api\servicese;

use App;
use EFrame\Helper\T;

/**
 * 文章服务类
 * Class Archives
 * 调用url案例：
 * http://newway.eframe2.e01.ren/api/site/index?m=idk2584s&v=index&tid=8&aid=7
 * @package myWay\module\api\servicese
 */
class Archives{
    protected $topId;               //文章所在栏目的上一级栏目id
    protected $typeId;              //栏目id
    protected $aid;                 //文章id
    protected $flag;                //文章标签
    protected $articalList;         //文章列表
    protected $searchList;          //搜索列表
    protected $artical;             //文章内容
    protected $addonTable;          //付加表
    protected $pageSize;            //分面步长
    protected $currentPage;         //当前页
    protected $searchWord;          //搜索关键字
    protected $param;

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
     * 获取搜索文章列表
     * 调用文章列表服务需要传入以下参数：
     * @return mixed
     */
    public function getSearchList(){
        $this->setSearchList();

        return $this->searchList;
    }

    /**
     * 获取文章内容
     * 调用url案例：
     * http://newway.eframe2.e01.ren/api/site/index?m=idk2584s&v=index&tid=8&aid=7
     * 调用文章内容服务需要传入以下参数：
     * 参数：tid　typeid
     * 参数：aid articalid  
     * aid
     */
    public function getArtical(){
        //初始化typeid，用于查找附加表
        //$this->typeId = App::request()->get('tid');
        //初始化文章id(如果aid=-1表示aid错误，输入预置错误信息)
        $this->aid = App::request()->get('aid',-1);
        //查询附加表
        $this->setAddonTable();
        //查询文章内容
        $this->setArtical();

        return $this->artical;
    }

    /**
     * 设置参数
     * param = ['typeId'=>7]
     */
    public function setParam($param = []){
        //文章所在栏目的上一级栏目id
        $this->topId = T::arrayValue('topId',$param,null);
        //文章所在栏目的id
        $this->typeId = T::arrayValue('typeId',$param,null);
        //文章id
        $this->aid = T::arrayValue('articleId',$param,null);
        //搜索关键字
        $this->searchWord = T::arrayValue('searchWord',$param,null);

        $this->flag = T::arrayValue('flag',$param,null);
        $this->pageSize = T::arrayValue('pageSize',$param,null);
        $this->currentPage = T::arrayValue('currentPage',$param,null);

        return $this;
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
                "@#_channeltype" =>[
                    "nid"
                ],
                "@#_arctype" =>[
                    "typedir"
                ],
            ],
        ];

        $q['LEFT_JOIN']["@#_channeltype"] = "ON @#_archives.channel = @#_channeltype.id";
        $q['LEFT_JOIN']["@#_arctype"] = "ON @#_archives.typeid = @#_arctype.id";

        //添加查询条件
        if($this->typeId) $q['WHERE'][] = '@#_archives.typeid = '.$this->typeId;
        if($this->topId) $q['WHERE'][] = '@#_archives.typeid in (select id from @#_arctype where topid='.$this->topId.') or @#_archives.typeid="'.$this->topId.'"';
        if($this->flag) $q['WHERE'][] = '@#_archives.flag like %'.str_replace(',','%',$this->flag).'%';

        //分页开始数据
        $startPage = ($this->currentPage - 1) * $this->pageSize;
        $q['LIMIT'] = "$startPage,$this->pageSize";
        $q['ORDER_BY'] ='typeid,sortrank';
        //echo App::DB()->selectCommond($q)->showQuery()."<br/>";
        $res = App::DB()->selectCommond($q)->query()->fetchAll();
        //添加数据状态
        $this->articalList = T::addStatus($res);

        return $this;
    }

    /**
     * 模糊查询文章列表
     * @return $this
     */
    protected function setSearchList(){
        $q = [
            [
                "@#_archives" => [
                    "*",
                ],
                "@#_channeltype" =>[
                    "nid"
                ],
                "@#_arctype" =>[
                    "typedir"
                ],
            ],
        ];

        $q['LEFT_JOIN']["@#_channeltype"] = "ON @#_archives.channel = @#_channeltype.id";
        $q['LEFT_JOIN']["@#_arctype"] = "ON @#_archives.typeid = @#_arctype.id";

        //添加查询条件
        if($this->searchWord) {
            $searchWord = preg_replace('/\s/','%',$this->searchWord);
            $q['WHERE'][] = "@#_archives.title like '%".$searchWord."%'";
        }
        //分页开始数据
        $startPage = ($this->currentPage - 1) * $this->pageSize;
        $q['LIMIT'] = "$startPage,$this->pageSize";
        $q['ORDER_BY'] ='typeid,sortrank';
        //echo App::DB()->selectCommond($q)->showQuery()."<br/>";
        $res = App::DB()->selectCommond($q)->query()->fetchAll();
        //添加数据状态
        $this->searchList = T::addStatus($res);

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