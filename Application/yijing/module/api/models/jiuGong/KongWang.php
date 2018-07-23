<?php
namespace yijing\module\api\models\jiuGong;

use EFrame\Helper\T;
use yijing\module\api\models\jiuGong\JiaZi;
use yijing\module\api\models\JiuGong;

/**
 * 查空亡法，默认按日柱查，也可以设置按时柱或月柱
 * @author yx010
 *
 */
class KongWang
{
    
    /**
     * 获取(日柱)旬首的地支
     * @param string $siZhu 四柱名称，可取nianZhu|yueZhu|riZhu|shiZhu
     * @return mixed
     */
    public static function getXunShouDiZhi($siZhu = 'riZhu'){
        //日柱
        $riZhu = JiuGong::${$siZhu};
        //日柱旬首的地支
        return (JiaZi::getXunSou($riZhu))['diZhi'];
    }
    
    /**
     * 获取地支孤位的序数
     */
    public static function getGuWei(){
        $diZhiOrdinal = JiaZi::getDiZhi(self::getXunShouDiZhi(),'index');
        $guWei = [];
        for($i = 0; $i < 2; $i++){
            $diZhiOrdinal -= 1;
            if($diZhiOrdinal < 1 ) $diZhiOrdinal += 12;
            $guWei[] = $diZhiOrdinal;
            
        }
        
        return $guWei;
    }
    
    /**
     * 获取地支虚位的序数
     * @return number
     */
    public static function getXuWei(){
        $guWei = self::getGuWei();
        $xuWei = [];
        for($i = 0; $i < 2; $i++){
            $diZhiOrdinal = ($guWei[$i] + 6) % 12;
            if($diZhiOrdinal === 0) $diZhiOrdinal = 12;
            $xuWei[] = $diZhiOrdinal;
        }
        
        return $xuWei;
    }

    
    /**
     * 设置空亡宫
     * @param unknown $jiuGong 九宫对象
     * @return boolean
     */
    public static function setKongWangGong($jiuGong){
        
        $guWei = $jiuGong::$guWei;
        for($i = 0; $i < count($guWei); $i++){
            $gong = JiaZi::getDiZhi2gongOrdinal($guWei[$i]);
            $jiuGong->{'gong_'.$gong}->setKongWang();
        }
        return true;
    }
}

