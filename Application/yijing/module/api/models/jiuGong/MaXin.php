<?php
namespace yijing\module\api\models\jiuGong;

use EFrame\Helper\T;
use yijing\module\api\models\jiuGong;
use yijing\module\api\models\jiuGong\JiaZi;
/**
 * 
 * @author yx010
 *马星是个重要的神煞，无论奇门遁甲、八字命理，还是六壬、紫微等预测术，对马星的查看都是非常重视的。那么，奇门遁甲中的三种马星：驿马、天马、丁马，我们是如何查看的呢？

    1、驿马
    
    马星通常指驿马，驿马的传统含义，古时为传送驿站，传递信息、以马为交通工具，所以将式盘的某种组合成为临驿马，驿马主奔波、走动、外出、旅行、出差、搬家、转职等与移动有关的意象。也就是说事物通常是在一个相对固定的范围、状态下，对这种范围或状态的突破就叫“动”，这种“动”的能量来源之一就是驿马星的加临。现实中交通工具不局限于马，信息源也更是五花八门，导致“动”的因素很多、也很方便，与古代相比之下，马星应该是更加丰富了。鉴于这种情形，古今马星的取法也就有了变化
    
    传统查法：申子辰马在寅，寅午戌马在申，巳酉丑马在亥，亥卯未马在巳。1天1个。
    
    盲派查法：亥卯未与巳酉丑互见，寅午戌与申子辰互见。1天3个。
    
    其它查法：见寅申巳亥就是驿马。对于奇门来说，任何一天都有4个。
    
    再加上日柱、时柱分取，使传统查法和盲派查法的马星数量有所增加，当然，即便把年柱、月柱的马星考虑进来，在奇门遁甲中加临的宫位最多也就是4个（乾、艮、巽、坤），但判断分析马星的作用，便复杂了起来。
    
    2、天马
    
    天马是上界驿马之星，按照起局的月份和用神落宫来确定天马落宫。天马主办事快捷，主迁动出行之事，也主远行不归、失物难寻。
    
    寅申月，用神落离宫（午），为用临天马
    
    卯酉月，用神落坤宫（申），为用临天马
    
    辰戌月，用神落乾宫（戌），为用临天马
    
    巳亥月，用神落坎宫（子），为用临天马
    
    午子月，用神落艮宫（寅），为用临天马
    
    未丑月，用神落巽宫（辰），为用临天马
    
    3、丁马
    
    主要根据日柱旬首来确定丁马落宫。丁马为摇动不安、出行之事。也为妖神、不祥、怪异、忧惊之事。丁马坐日干禄神，主做生意但发福不久。壬癸日用神临丁马主财动、婚动；庚辛日用神临丁马主凶动。
    
    甲子旬，用神落震宫（丁卯），为用临丁马
    
    甲戌旬，用神落艮宫（丁丑），为用临丁马
    
    甲申旬，用神落乾宫（丁亥），为用临丁马
    
    甲午旬，用神落兑宫（丁酉），为用临丁马
    
    甲辰旬，用神落坤宫（丁未），为用临丁马
    
    甲寅旬，用神落巽宫（丁巳），为用临丁马
    
    在时家奇门中，多以时柱和日柱来定驿马（且以时柱取驿马者为多）。在日柱或时柱上按传统查法进行。但建议在寅申巳亥的落宫都暗藏驿马，在断局时要尤其给予关注。特别是当有天马和丁马加临时尤其明显。关于天马和丁马本在六壬中常用，但家传曰“天丁二马入局来，遁甲穿壬铭记怀”，仅做此披露。
 */
class MaXin
{
    /**
     * 驿马:
     * 根据所指定的地支标识符，查找其对应的驿马星对应地支序数
     * @param unknown $str 地支标识符
     * @return integer[]|boolean
     */
    public static function getYiMa2diZhiOrdinal($str){
        $yiMa = [
            3 => [
                'shen1',
                'zi3',
                'chen2'
            ],
            6 => [
                'hai4',
                'mao3',
                'wei4',
            ],
            9 => [
                'yin2',
                'wu3',
                'xu1',
            ],
            12 => [
                'si4',
                'you3',
                'chou3',
            ],
        ];
        foreach($yiMa as $key => $val){
            if(in_array($str, $val) === false) continue;
            return $key;
        }
        
        return false;
    }
    
    /**
     * 天马:
     * 根据所指定的地支标识符，查找其对应的天马星对应地支序数
     * @param unknown $str 地支标识符
     * @return integer[]|boolean
     */
    public static function getTianMa2diZhiOrdinal($str){
        $yiMa = [
            1 => [
                'si4',
                'hai4',
            ],
            3 => [
                'zi3',
                'wu3',
            ],
            5 => [
                'chou3',
                'wei4',
            ],
            7 => [
                'yin2',
                'shen1',
            ],
            9 => [
                'mao3',
                'you3',
            ],
            11 => [
                'chen2',
                'xu1',
            ],
        ];
        foreach($yiMa as $key => $val){
            if(in_array($str, $val) === false) continue;
            return $key;
        }
        
        return false;
    }
    
    
    /**
     * 丁马:
     * 主要根据日柱旬首来确定丁马落宫。丁马为摇动不安、出行之事。也为妖神、不祥、怪异、忧惊之事。丁马坐日干禄神，主做生意但发福不久。壬癸日用神临丁马主财动、婚动；庚辛日用神临丁马主凶动。
     * 根据旬首的地支标识符，查找其对应的丁马星对应地支序数
     * @param unknown $str 地支标识符
     * @return integer[]|boolean
     */
    public static function getDingMa2diZhiOrdinal($str){
        $yiMa = [
            2 => [
                'xu1',
            ],
            4 => [
                'zi3',
            ],
            6 => [
                'yin2',
            ],
            8 => [
                'chen2',
            ],
            10 => [
                'wu3',
            ],
            12 => [
                'shen1',
            ],
        ];
        foreach($yiMa as $key => $val){
            if(in_array($str, $val) === false) continue;
            return $key;
        }
        
        return false;
    }
    
    /**
     * 获取驿马星
     * @return \yijing\module\api\models\jiuGong\string[]
     */
    public static function getYiMa(){
        //这里可以通过配置文件实现四柱选择
        $riZhu = JiuGong::$riZhu;
        //驿马星所在地支的序数
        $yiMaOrdinal = self::getYiMa2diZhiOrdinal($riZhu['diZhi']);
        
        return JiaZi::getDiZhi($yiMaOrdinal);
    }
    
    /**
     * 设置驿马宫(以日柱查询)
     * @param unknown $jiuGong 九宫对象
     * @return boolean
     */
    public static function setYiMaGong($jiuGong){
        //这里可以通过配置文件实现四柱选择
        //日柱地支
        $riZhi = ($jiuGong::$riZhu)['diZhi'];
        //驿马星所在地支的序数
        $yiMaOrdinal = self::getYiMa2diZhiOrdinal($riZhi);
        //驿马星所在地支对应的九宫数
        $gong = JiaZi::getDiZhi2gongOrdinal($yiMaOrdinal);
        //设置当前宫为驿马星所在的宫
        $jiuGong->{'gong_'.$gong}->setYiMa();
        
        return true;
    }
    
    /**
     * 获取天马星
     * 天马是上界驿马之星，按照起局的月份和用神落宫来确定天马落宫。天马主办事快捷，主迁动出行之事，也主远行不归、失物难寻。
     * @return \yijing\module\api\models\jiuGong\string[]
     */
    public static function getTianMa(){
        //这里可以通过配置文件实现四柱选择
        $yueZhi = (JiuGong::$yueZhu)['diZhi'];
        //驿马星所在地支的序数
        $tianMaOrdinal = self::getTianMa2diZhiOrdinal($yueZhi);
        
        return JiaZi::getDiZhi($tianMaOrdinal); 
    }
    
    //设置天马星所临的宫
    public static function setTianMaGong($jiuGong){
        //这里可以通过配置文件实现四柱选择
        //日柱地支
        $yueZhu = (JiuGong::$yueZhu);
        //天马星所在地支的序数
        $tianMaOrdinal = self::getTianMa2diZhiOrdinal($yueZhu['diZhi']);
        //天马星所在地支对应的九宫数
        $gong = JiaZi::getDiZhi2gongOrdinal($tianMaOrdinal);
        //设置当前宫为天马星所在的宫
        $jiuGong->{'gong_'.$gong}->setTianMa();
        
        return true;
    }
    /**
     * 获取丁马星
     * 主要根据日柱旬首来确定丁马落宫。丁马为摇动不安、出行之事。也为妖神、不祥、怪异、忧惊之事。丁马坐日干禄神，主做生意但发福不久。壬癸日用神临丁马主财动、婚动；庚辛日用神临丁马主凶动。
     * @return \yijing\module\api\models\jiuGong\string[]
     */
    public static function getDingMa(){
        //这里可以通过配置文件实现四柱选择
        $xunShou = JiaZi::getXunSou(JiuGong::$riZhu);
        //驿马星所在地支的序数
        $dingMaOrdinal = self::getDingMa2diZhiOrdinal($xunShou['diZhi']);
        
        return JiaZi::getDiZhi($dingMaOrdinal); 
    }
    
    //设置丁马星所临之宫
    public static function setDingMaGong($jiuGong){
        //这里可以通过配置文件实现四柱选择
        //这里可以通过配置文件实现四柱选择
        $xunShou = JiaZi::getXunSou($jiuGong::$riZhu);
        //丁马星所在地支的序数
        $dingMaOrdinal = self::getDingMa2diZhiOrdinal($xunShou['diZhi']);
        //丁马星所在地支对应的九宫数
        $gong = JiaZi::getDiZhi2gongOrdinal($dingMaOrdinal);
        //设置当前宫为丁马星所在的宫
        $jiuGong->{'gong_'.$gong}->setDingMa();
        
        return true;
    }
}

