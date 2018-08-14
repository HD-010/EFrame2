<?php 
namespace qingminhospital\module\api\models;

use App;
use EFrame\Helper\T;

class MyAD {
    protected $banners;

    /**
     * 获取广告
     * @param unknown $tagName 
     * @return \@#\module\api\models\MyAD
     */
    public function setParams($tagName){
        //查找顶级栏目（总的有两级）
        $o = [
            [
                "@#_myad" => [
                    "normbody",
                ],
            ],
            "WHERE" => [
                "tagname='".$tagName."'",
            ],
            
        ];
        $arctypeTop = App::DB()->selectCommond($o)->query()->fetchAll();
        $this->banners = $arctypeTop;
        
        return $this;
        
    }
    
    
    public function getResource(){
        $banner = [];
        for($i = 0; $i < count($this->banners);$i ++){
            $str = $this->banners[$i]['normbody'];
            $str = str_replace('<a href="', '', $str);
            $str = str_replace('"  border="0" /></a>', '', $str);
            $banner[] = explode('"><img src="', $str);
        }
        return $banner;
    }


}



?>