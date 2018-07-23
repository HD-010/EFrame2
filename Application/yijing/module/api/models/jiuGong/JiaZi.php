<?php
namespace yijing\module\api\models\jiuGong;

use EFrame\Helper\T;
use yijing\module\api\models\JiuGong\BaGua;

class JiaZi
{
    /**
     * 根据键名返回天干名称
     * @param unknown $soc
     * @return string|boolean|\EFrame\Helper\unknown
     */
    public static function getTianGanMingChen($soc){
        $mengChen = [
            'jia3'=> '甲',
            'yi3' => '乙',
            'bing3'=> '丙',
            'ding1'=> '丁',
            'wu4' => '戊',
            'ji3' => '己',
            'geng1'=> '庚',
            'xin1'=> '辛',
            'ren2'=> '壬',
            'gui3' =>'癸',
        ];
        
        return T::arrayValue($soc, $mengChen);
    }
    /**
     * 根据键名返回地支名称
     * @param unknown $soc
     * @return string|boolean|\EFrame\Helper\unknown
     */
    public static function getDiZhiMingChen($soc){
        $mengChen = [
            'zi3'=> '子',
            'chou3' => '丑',
            'yin2'=> '寅',
            'mao3'=> '卯',
            'chen2' => '辰',
            'si4' => '巳',
            'wu3'=> '午',
            'wei4'=> '未',
            'shen1'=> '申',
            'you3' =>'酉',
            'xu1' =>'戌',
            'hai4' =>'亥',
        ];
        
        return T::arrayValue($soc, $mengChen);
    }
    
    /**
     * 返回天干序数或者返回天干标识符
     * 如果
     * @param unknown $find
     * @param unknown $tag 如果为"index"，返回$find对应的索;否则返回$find对应的值
     * @return string[]
     */
    public static function getTianGan($find,$tag=null){
        $tianGan = [
            1 => 'jia3',
            2 => 'yi3',
            3 => 'bing3',
            4 => 'ding1',
            5 => 'wu4',
            6 => 'ji3',
            7 => 'geng1',
            8 => 'xin1',
            9 => 'ren2',
            10 => 'gui3',
        ];
        
        if($tag === 'index') return T::arrayValue($find, array_flip($tianGan));
        return T::arrayValue($find, $tianGan);
    }

    /**
     * 返回地支序数或者返回地支标识符
     * 如果
     * @param unknown $find
     * @param unknown $tag 如果为"index"，返回$find对应的索引;否则返回$find对应的值
     * @return string[]
     */
    public static function getDiZhi($find,$tag=null){
        $diZhi = [
            1 =>  'zi3',
            2 =>  'chou3',
            3 =>  'yin2',
            4 =>  'mao3',
            5 =>  'chen2',
            6 =>  'si4' ,
            7 =>  'wu3',
            8 =>  'wei4',
            9 =>  'shen1',
            10 => 'you3' ,
            11 => 'xu1' ,
            12 => 'hai4',  
        ];
        
        if($tag === 'index') return T::arrayValue($find, array_flip($diZhi));
        return T::arrayValue($find, $diZhi);
    }
    
    //获取地支对应的九宫数
    public static function getDiZhi2gongOrdinal($diZhiOrdinal){
        $ordinal = [
            1=>1,
            2=>8,
            3=>8,
            4=>3,
            5=>4,
            6=>4,
            7=>9,
            8=>2,
            9=>2,
            10=>7,
            11=>6,
            12=>6,
        ];
        
        return T::arrayValue($diZhiOrdinal, $ordinal);
    }
    
    /**
     * 根据转入的干支组合获取询首
     * @param array $ganZhi
     * @return array 返回旬首数组
     */
    public static function getXunSou($ganZhi){
        $tianGan = $ganZhi['tianGan'];
        $diZhi = $ganZhi['diZhi'];
        
        $tianGanOrdinal = self::getTianGan($tianGan,'index');
        
        $diZhiOrdinal = self::getDiZhi($diZhi,'index');
        $diZhiOrdinal = $diZhiOrdinal - $tianGanOrdinal + 1;
        if($diZhiOrdinal < 1) $diZhiOrdinal += 12;
        
        //旬首
        $xunSou = [
            'tianGan' => self::getTianGan(1),
            'diZhi'   => self::getDiZhi($diZhiOrdinal),
        ];
        
        return $xunSou;
    }
    
    /**
     * 返回九宫藏地支的标识符
     * @param integer $ordinal 九宫数
     * @return array 地支
     */
    public static function getDiZhi2gong($ordinal){
        $baGuanOrdinal = BaGua::getHeTu2BaGuaOrdinal($ordinal);
        
        //八卦序数为奇数
        if($baGuanOrdinal%2){
            return [
                self::getDiZhi($baGuanOrdinal + ($baGuanOrdinal-1)/2),
            ];
        }
        //八卦序数为偶数
        else{
            return [
                self::getDiZhi($baGuanOrdinal + ($baGuanOrdinal-2)/2),
                self::getDiZhi($baGuanOrdinal + ($baGuanOrdinal-2)/2 +1),
            ];
        }
    }
    
    
    
}

