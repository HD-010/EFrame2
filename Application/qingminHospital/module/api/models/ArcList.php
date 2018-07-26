<?php 
namespace qingminHospital\module\api\models;

use App;
use EFrame\Helper\T;


//获取文章列表
class ArcList
{
    public function getList(){
        $queryString  = $_SERVER['REQUEST_URI']; 
        //$str = "select * from qingminhospital_addonpersonage where typeid=(select id from qingminhospital_arctype where typedir = '')";
        //查询栏目内容
        $o = [
            [
                "qingminhospital_archives" => [
                    'litpic'
                ],
                "qingminhospital_addonpersonage" => [
                    "*",
                ],
            ],
            "LEFT_JOIN" =>[
                "qingminhospital_addonpersonage" => " ON qingminhospital_archives.typeid = qingminhospital_addonpersonage.typeid",
            ],
            "WHERE" => [
                "qingminhospital_archives.typeid = (select id from qingminhospital_arctype where typedir = '".$queryString."')",
            ],
            "ORDER_BY" => [
                "qingminhospital_archives.sortrank",
            ],
            
            "LIMIT" => '0,10'
            
        ];
        $content = App::DB()->selectCommond($o)->query()->fetchAll();
        //$content = App::DB()->selectCommond($o)->showQuery();
        
        return $content;
        
        
    }
    
}


?>