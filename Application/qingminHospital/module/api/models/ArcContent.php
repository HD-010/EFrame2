<?php 
namespace qingminhospital\module\api\models;

use App;
use EFrame\Helper\T;


//获取文章列表
class ArcContent
{
    public function getContent(){
        $queryString  = strtolower('/'.App::module().'/'.App::control().'/'.App::action()); 
        //查询栏目内容
        $o = [
            [
                "@#_arctype" => [
                    "id","topid","typename","seotitle","content","typedir",
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