<?php
namespace yijing\module\api\models\jiuGong;

use EFrame\Helper\T;
use yijing\module\api\models\JiuGong;
use yijing\module\api\models\jiuGong\Gong;

/**
 * 说明：该类中的部份方法被ZhiShi类所依赖
 * @author yx010
 *
 */
class ZhiFu
{
    /**
     * 旬首与六的关系
     * @return array
     */
    public static function getXunSou2liuYi(){
        return [
            'zi3' => 'wu4',
            'xu1' => 'ji3',
            'shen1' => 'geng1',
            'wu3' => 'xin1',
            'chen2' => 'ren2',
            'yin2' => 'gui3',
        ];
    }
    
    /**
     * 获取地盘值符的九宫数，
     * 时柱旬首所在的地盘宫为值符所在的宫，这里返回亥宫的九宫数
     * @param unknown $jiuGong
     * @return integer 
     */
    public static function getZhiFu($jiuGong){
        //六甲值符
        $liuJia = T::arrayValue((JiuGong::$xunSou)['diZhi'],self::getXunSou2liuYi());
        
        //向九宫基本信息写入值符星标识
        return self::getDiPanZhiFuGong($liuJia,$jiuGong);
        
    }
    
    
    /**
     * 获取值符在九宫地盘的宫位
     * @param unknown $find 这是被查询的六甲信息
     * @param unknown $jiuGong 这是九宫信息，当前的九宫具有地盘信息
     * @return string 九星标识
     */
    public static function getDiPanZhiFuGong($find,$jiuGong){
        for($i = 1; $i < 10; $i++ ){
            $gong = 'gong_'.$i;
            //如果当前宫不是值符所在的宫，则继续
            if($jiuGong->$gong->diPanQiYi != $find) continue;
            //如果当前宫是值符所在的宫，
            //则标示当前宫为值标宫
            $jiuGong->$gong->setDiPanZhiFu();
            //返回值符星信息
            return $jiuGong->$gong->diPanJiuXin;
        }
        return false;
    }
}

