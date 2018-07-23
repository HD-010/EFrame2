<?php
namespace yijing\module\api\models\jiuGong;

class JiuXin
{
    /**
     * 九星名称
     * @param unknown $soc
     */
    public static function getMingChen($soc){
        $jiuXin = [
            'peng2' =>'篷',
            'ren4' =>'任',
            'chong1' =>'冲',
            'fu3' =>'辅',
            'ying1' =>'英',
            'rui4' =>'芮',
            'zhu4' =>'柱',
            'xin1' =>'心',
            'qin2' => '禽'
        ];
    }
    
    /**
     * 九星依八卦转动的顺序,0不纳入转动的星宿
     * @param unknown $ordinal
     * @param unknown $offset
     * @return \yijing\module\api\models\BaMen
     */
    public static function setJiuXin()
    {
        return [
            0 => 'qin2',
            1 =>'peng2',
            2 =>'ren4',
            3 =>'chong1',
            4 =>'fu3',
            5 =>'ying1',
            6 =>'rui4',
            7 =>'zhu4',
            8 =>'xin1',
        ];
    }
    
    /**
     * 九宫数与九星序数的对应关系
     */
    public static function getHeTu2JiuXinOrdinal($jiuGongShu){
        $relation = [
            1 => 1,
            2 => 6,
            3 => 3,
            4 => 4,
            5 => 0,
            6 => 8,
            7 => 7,
            8 => 2,
            9 => 5,
        ];
        
        return $relation[$jiuGongShu];
    }
    
    
    /**
     * 获取转动后的天盘九星
     * @param integer $ordinal 后天八卦顺序排列的关系，以坎卦第一
     * @param integer $offset
     * @return string|\yijing\module\api\models\BaMen
     */
    public static function getJiuXin($ordinal, $offset){
        $jiuXin = self::setJiuXin();
        $ordinal = ($ordinal - $offset);
        if($ordinal < 0) $ordinal +=8;
        $ordinal = $ordinal % 8;
        $ordinal = ($ordinal === 0) ? 8 : $ordinal;
        
        return (array_key_exists($ordinal,$jiuXin) === false) ? '' : $jiuXin[$ordinal];
    }
    
    
    /**
     * 获取地盘九星与河图的对应关系
     * @param integer $ordinal 九宫数
     * @return string
     */
    public static function getJiuXin2HeTu($ordinal){
        $jiuXin = [
            1 =>'peng2',
            8 =>'ren4',
            3 =>'chong1',
            4 =>'fu3',
            5 => 'qin2',
            9 =>'ying1',
            2 =>'rui4',
            7 =>'zhu4',
            6 =>'xin1',
        ];
        return (array_key_exists($ordinal,$jiuXin) === false) ? '' : $jiuXin[$ordinal];
    }
}