<?php
namespace yijing\module\api\models\jiuGong;

class QiYi
{
    public static $diPanQiYi2baGua; //地盘奇仪与后天八卦序数的对应关系（坎卦第一）
    
    /**
     * 设定八卦顺序(坎卦第一，离卦第五)与九宫的关系
     * 通过九宫数获取对应的八卦序数
     * @param unknown $ordinal 九宫数
     * @return mixed
     */
    public static function getBaGua2jiuGong($ordinal){
        //中5宫寄坤二宫，八卦序数为6
        if($ordinal === 5) return 6;
         $baGua2jiuGong = [
             1 => 1,
             2 => 8,
             3 => 3,
             4 => 4,
             5 => 9,
             6 => 2,
             7 => 7,
             8 => 6,
         ];
         
         return array_flip($baGua2jiuGong)[$ordinal];
    }
    
    /**
     * 九宫数与八卦序数的对应关系
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
        
        return $relation[$jiuGongShu];
    }
    
    /**
     * 设置地盘奇仪与八卦序数的关系
     * @param unknown $juGongShu 九宫数
     * @param unknown $diPanQiyi 当前宫位地盘所临的奇仪   
     */
    public static function setDiPanQiYi2baGua($juGongShu,$diPanQiyi){
        if($juGongShu == 5) return;
        
        $baGuaOrdinal = self::getBaGua2jiuGong($juGongShu);
        
        self::$diPanQiYi2baGua[$baGuaOrdinal] = $diPanQiyi;
    }
    
    /**
     * 奇仪名称
     * @param unknown $soc
     */
     public static function getMingChen($soc){
         $qiYi = [
             'wu4' => '戊',
             'ji3' => '己',
             'geng1' => '庚',
             'xin1' => '辛',
             'ren2' => '壬',
             'gui3' => '癸',
             'ding1' => '丁',
             'bing3' => '丙',
             'yi3' => '乙',
         ];
     }
     
     /**
      * 获取阳遁一局地盘奇仪与九宫的对应关系 
      * @param unknown $ordinal
      * @return string
      */
     public static function getYangQiYi2HeTu($ordinal){
         $qiYi = [
            '1' => 'wu4',
            '2' => 'ji3',
            '3' => 'geng1',
            '4' => 'xin1',
            '5' => 'ren2',
            '6' => 'gui3',
            '7' => 'ding1',
            '8' => 'bing3',
            '9' => 'yi3',
         ];
         
         return (array_key_exists($ordinal,$qiYi) === false) ? '' : $qiYi[$ordinal];
     }
     
     /**
      * 获取阴遁一局地盘奇仪与九宫的对应关系 
      * @param unknown $ordinal
      * @return string
      */
     public static function getYinQiYi2HeTu($ordinal){
         $qiYi = [
             '9' => 'wu4',
             '8' => 'ji3',
             '7' => 'geng1',
             '6' => 'xin1',
             '5' => 'ren2',
             '4' => 'gui3',
             '3' => 'ding1',
             '2' => 'bing3',
             '1' => 'yi3', 
         ];
         
         return (array_key_exists($ordinal,$qiYi) === false) ? '' : $qiYi[$ordinal];
     }
     
     
     /**
      * 返回阴遁或阳遁局的地盘奇仪
      * 说明： 这里将阳
      * @param unknown $ordinal 当前九宫序数
      * @param unknown $offset 与初始位置相比，偏移的宫位数（这里是阴遁或阳遁局数）
      * @return unknown
      */
     public static function getDiPanQiYi($ordinal,$offset){
         $juShu = $offset;
         $juGongShu = $ordinal;
         
         $ordinal = ($juShu > 0) ? ($ordinal - $offset + 1) : ($ordinal - abs($offset));
         
         if($ordinal <= 0) $ordinal += 9;
         
         $diPanQiYi = ($juShu > 0) ? self::getYangQiYi2HeTu($ordinal) : self::getYinQiYi2HeTu($ordinal);
         
         //设置地盘奇仪与八卦序数的对应关系
         self::setDiPanQiYi2baGua($juGongShu,$diPanQiYi);
         
         return $diPanQiYi;
     }
     
     /**
      * 返回阴遁或阳遁的天盘奇仪,以地盘奇仪相对八卦顺序为基准，天盘值符临宫的八卦序数减地盘值符临宫的八卦序数为偏离的序数
      * @param unknown $ordinal 九宫数
      * @param unknown $offset 以地盘奇仪相对八卦顺序为基准，天盘值符临宫的八卦序数减地盘值符临宫的八卦序数为偏离的序数
      * @return string 奇仪
      */
     public static function getTianPanQiYi($ordinal,$offset){
         //九宫数
         $juGongShu = $ordinal;
         //对应的八卦序数
         $baGuaOrdinal = self::getBaGua2jiuGong($ordinal);
         //偏离后的八卦序数
         $ordinal = $baGuaOrdinal - $offset;
         if($ordinal <= 0) $ordinal += 8;
         
         return (self::$diPanQiYi2baGua)[$ordinal];
     }
}

