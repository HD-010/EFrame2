<?php 
namespace qingminHospital\module\api\models;

use App;
use EFrame\Helper\T;

class Archives{
    
    
    //获取普通文章
    public function getArticle(){
        $id = App::request()->get('aid');
        
        $o = [
            [
                "@#_archives" => [
                    'id','writer','pubdate','litpic','keywords','title','description','click'
                ],
                "@#_addonarticle" => [
                    "*",
                ],
            ],
            "LEFT_JOIN" =>[
                "@#_addonarticle" => " ON @#_archives.id = @#_addonarticle.aid",
            ],
            "WHERE" => [
                "@#_archives.id = $id",
            ],
            "LIMIT" => '0,1'
        ];
        $res = App::DB()->selectCommond($o)->query()->fetchAll();
        
        return $res;
    }
    
    //获取图片集
    public function Image(){
        
    }
    
    //获取软件信息
    public function soft(){
        
    }
    
    //获取专题信息
    public function spec(){
        
    }
    
    //获取商品信息
    public function shop(){
        
    }
    
    //获取分类信息
    public function infors(){
        
    }
    
    //获取人物信息
    public function personage(){
        
    }
    
}

?>