<?php 
namespace qingminHospital\module\api\models;

use App;
use EFrame\Helper\T;


//获取文章列表
class ArcContent
{
    public function getContent(){
        $queryString  = $_SERVER['REQUEST_URI']; 
        
        //查询栏目内容
        $o = [
            [
                "qingminhospital_arctype" => [
                    "id","topid","typename","content","typedir",
                ],
            ],
            "WHERE" => [
                "typedir = '".$queryString."'",
            ],
            
            "LIMIT" => '0,1'
            
        ];
        $content = App::DB()->selectCommond($o)->query()->fetchAll();
        
        return $content;
        
        
    }
    
}


?>