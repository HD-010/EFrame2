<?php
namespace yijing\module\api\models\jiuGong;

class BaShen
{
    /**
     * 八神名称
     * @param unknown $soc
     */
    public static function getMingChen($soc){
        $baSheng = [
            'zhi2Fu2' =>'值符',
            'teng2She2' =>'腾蛇',
            'tai4Ying1' =>'太阴',
            'liu4He2' =>'六合',
            'bai2Hu3' =>'白虎',
            'xuan2Wu3' =>'玄武',
            'jiu3Di4' =>'九地',
            'jiu3Tian1' =>'九天',
        ];
    }
    
    /**
     * 定义阳遁八神依八卦排列顺序如下：
     * @param unknown $ordinal
     * @param unknown $offset
     * @return \yijing\module\api\models\BaMen
     */
    public static function setYangBaShen()
    {
        
        return [
            1 =>'zhi2Fu2',
            2 =>'teng2She2',
            3 =>'tai4Ying1',
            4 =>'liu4He2',
            5 =>'bai2Hu3',
            6 =>'xuan2Wu3',
            7 =>'jiu3Di4',
            8 =>'jiu3Tian1',
        ];
        
    }
    
    /**
     * 定义阴遁八神依八卦排列顺序如下：
     * @param unknown $ordinal
     * @param unknown $offset
     * @return \yijing\module\api\models\BaMen
     */
    public static function setYingBaShen()
    {
        
        return [
            1 =>'zhi2Fu2',
            2 =>'jiu3Tian1',
            3 =>'jiu3Di4',
            4 =>'xuan2Wu3',
            5 =>'bai2Hu3',
            6 =>'liu4He2',
            7 =>'tai4Ying1',
            8 =>'teng2She2',
        ];
        
    }
    
    
    /**
     * 九宫数与八神序数的对应关系
     */
    public static function getHeTu2BaShenOrdinal($jiuGongShu){
        $relation = [
            1 => 1,
            2 => 6,
            3 => 3,
            4 => 4,
            //中宫寄坤二宫，中宫无神，对应后天卦序数为6，如果需要寄其他宫，在 这里指定（比如加载配置文件）
            5 => 6,
            6 => 8,
            7 => 7,
            8 => 2,
            9 => 5,
        ];
        
        return $relation[$jiuGongShu];
    }
    
    /**
     * 获取飞监人间的八神
     * @param integer $ordinal 后天八卦顺序排列的关系，以坎卦第一
     * @param integer $offset 可以为正数和负数，阳遁用正数，阴遁用负数
     * @return string|\yijing\module\api\models\BaMen
     */
    public static function getBaShen($ordinal, $offset){
        $baShen = ($offset < 0) ? self::setYingBaShen() : self::setYangBaShen();
        $ordinal = $ordinal - abs($offset);
        if($ordinal < 0) $ordinal +=8;
        $ordinal = $ordinal % 8;
        $ordinal = ($ordinal === 0) ? 8 : $ordinal;
        
        return (array_key_exists($ordinal,$baShen) === false) ? '' : $baShen[$ordinal];
    }
    
    /**
     * 定义八神飞监前与河图的对应关系
     * @param integer $ordinal 九宫数
     * @return string
     */
    public static function getBaShen2HeTu($ordinal){
        $baShen = [
            1 =>'zhi2Fu2',
            8 =>'teng2She2',
            3 =>'tai4Ying1',
            4 =>'liu4He2',
            9 =>'bai2Hu3',
            2 =>'xuan2Wu3',
            7 =>'jiu3Di4',
            6 =>'jiu3Tian1',
        ];
        
        return (array_key_exists($ordinal,$baShen) === false) ? '' : $baShen[$ordinal];
    }
    
}

