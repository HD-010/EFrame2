<?php 
namespace qingminhospital\module\api\models;

use App;
use EFrame\Helper\T;


//获取文章列表
class ArcList
{
    public function getList(){
        $queryString  = $_SERVER['REQUEST_URI']; 
        //$str = "select * from @#_addonpersonage where typeid=(select id from @#_arctype where typedir = '')";
        //查询栏目内容
        $o = [
            [
                "@#_archives" => [
                    'litpic'
                ],
                "@#_addonpersonage" => [
                    "*",
                ],
            ],
            "LEFT_JOIN" =>[
                "@#_addonpersonage" => " ON @#_archives.typeid = @#_addonpersonage.typeid",
            ],
            "WHERE" => [
                "@#_archives.typeid = (select id from @#_arctype where typedir = '".$queryString."')",
            ],
            "ORDER_BY" => [
                "@#_archives.sortrank",
            ],
            
            "LIMIT" => '0,10'
            
        ];
        $content = App::DB()->selectCommond($o)->query()->fetchAll();
        //$content = App::DB()->selectCommond($o)->showQuery();
        
        return $content;
        
        
    }
    
    
}


?>