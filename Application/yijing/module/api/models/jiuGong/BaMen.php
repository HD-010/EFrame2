<?php
namespace yijing\module\api\models\jiuGong;

class BaMen
{
    /**
     * 八门名称
     * @param unknown $soc
     */
    public static function getMingChen($soc){
        $baMen = [
            'kai1' =>'开',
            'xiu1' =>'休',
            'sheng1' =>'生',
            'shang1' =>'伤',
            'du4' =>'杜',
            'jing3' =>'景',
            'si3' =>'死',
            'jing1' =>'惊',
        ];
    }
    
    /**
     * 八门依八卦排列顺序
     * @param unknown $ordinal
     * @param unknown $offset
     * @return \yijing\module\api\models\BaMen
     */
    public static function setBaMen()
    {
        return [
            1 =>'xiu1',
            2 =>'sheng1',
            3 =>'shang1',
            4 =>'du4',
            5 =>'jing3',
            6 =>'si3',
            7 =>'jing1',
            8 =>'kai1',
        ];
    }
    
    /**
     * 九宫数与八门序数的对应关系
     */
    public static function getHeTu2BaMenOrdinal($jiuGongShu){
        $relation = [
            1 => 1,
            2 => 6,
            3 => 3,
            4 => 4,
            //中宫寄坤二宫，对应后天卦序数为6，如果需要寄其他宫，在 这里指定（比如加载配置文件）
            5 => 6,
            6 => 8,
            7 => 7,
            8 => 2,
            9 => 5,
        ];
        
        return $relation[$jiuGongShu];
    }
    
    /**
     * 获取转动后的人盘八门
     * @param integer $ordinal 后天八卦顺序排列的关系，以坎卦第一
     * @param integer $offset
     * @return string|\yijing\module\api\models\BaMen
     */
    public static function getBaMen($ordinal, $offset){
        $baMen = self::setBaMen();
        $ordinal = ($ordinal - $offset);
        if($ordinal < 0) $ordinal +=8;
        $ordinal = $ordinal % 8;
        $ordinal = ($ordinal === 0) ? 8 : $ordinal;
        return (array_key_exists($ordinal,$baMen) === false) ? '' : $baMen[$ordinal];
    }
 
    /**
     * 获取地盘八门与河图的对应关系
     * @param integer $ordinal 九宫数
     * @return string
     */
    public static function getBaMen2HeTu($ordinal){
        $baMen = [
            1 =>'xiu1',
            8 =>'sheng1',
            3 =>'shang1',
            4 =>'du4',
            9 =>'jing3',
            2 =>'si3',
            7 =>'jing1',
            6 =>'kai1',
        ];
        
        return (array_key_exists($ordinal,$baMen) === false) ? '' : $baMen[$ordinal];
    }
    
}