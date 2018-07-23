<?php
namespace yijing\module\api\models\jiuGong;

use EFrame\Helper\T;

class BaGua
{
    /**
     * 八卦名称
     */
    public static function getMingChen($soc){
        $mingChen = [
            'qian2'=>'乾',
            'dui4'=>'兑',
            'li2'=>'离',
            'zhen4'=>'震',
            'xun4'=>'巽',
            'kan3'=>'坎',
            'gen3'=>'艮',
            'kun1'=>'坤',
        ];
        
        return (array_key_exists($soc,$mingChen) === false) ? '' : $mingChen[$soc];
    }
    
    /**
     * 先天八卦与卦数的对照关系
     */
    public static function getXianTianBaGua2shu($ordinal){
        return [
            1=>'qian2',
            2=>'dui4',
            3=>'li2',
            4=>'zhen4',
            5=>'xun4',
            6=>'kan3',
            7=>'gen3',
            8=>'kun1',
        ];
    }
    
    /**
     * 先天八卦与河图的对照关系
     */
    public static function getXianTianBaGua2heTu($ordinal){
        $xianTianBaGua2heTu = [
            1=>'kun1',
            2=>'xun4',
            3=>'li2',
            4=>'dui4',
            
            6=>'gen3',
            7=>'kan3',
            8=>'zhen4',
            9=>'qian2',
        ];
        
        return (array_key_exists($ordinal,$xianTianBaGua2heTu) === false) ? '' : $xianTianBaGua2heTu[$ordinal];
    }
    
    /**
     * 后天八卦与河图的对照关系
     */
    public static function getHouTianBaGua2heTu($ordinal){
        $houTianBaGua2heTu = [
            1=>'kan3',
            2=>'kun1',
            3=>'zhen4',
            4=>'xun4',
            
            6=>'qian2',
            7=>'dui4',
            8=>'gen3',
            9=>'li2',
        ];
        
        return T::arrayValue($ordinal, $houTianBaGua2heTu,false);
        //return (array_key_exists($ordinal,$houTianBaGua2heTu) === false) ? '' : $houTianBaGua2heTu[$ordinal];
    }
    /**
     * 后天八卦顺序排列关系，以坎卦第一
     */
    public static function getHouTianBaGuaOrdinal($ordinal){
        $houTianBaGua2heTu = [
            1=>'kan3',
            2=>'gen3',
            3=>'zhen4',
            4=>'xun4',
            5=>'li2',
            6=>'kun1',
            7=>'dui4',
            8=>'qian2',
        ];
        
        return T::arrayValue($ordinal, $houTianBaGua2heTu,false);
    }
    
    /**
     * 九宫数与八卦序数的对应关系
     * @param unknown $jiuGongShu 九宫数
     * @return string|boolean|\EFrame\Helper\T
     */
    public static function getHeTu2BaGuaOrdinal($jiuGongShu){
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
        
        return T::arrayValue($jiuGongShu, $relation);
    }
}