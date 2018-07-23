<?php
namespace yijing\module\api\models;

use EFrame\Helper\T;
use yijing\module\api\models\jiuGong\JiaZi;
/**
 * 十二宫状态
 * @author yx010
 * 使用方法：
   use yijing\module\api\models\ShiErGong;
   $shiErGong = new ShiErGong();
          查询十干在九宫所处的十二宫状态
   $ShiErGongState = $shiErGong->getShiErGongState("bing3", 9);
   
 *
 */
class ShiErGong
{
    /**
     * 生旺死绝名称
     * @param unknown $soc
     */
    private function getMingChen($soc){
        $mingChen = [
            'di4wang4'=>'帝旺',
            'shuai1'=>'衰',
            'bing4'=>'病',
            'si3'=>'死',
            'mu4'=>'墓',
            'jue2'=>'绝',
            'tai1'=>'胎',
            'yang3'=>'养',
            'zhang3sheng1'=>'长生',
            'mu4yu4'=>'沐浴',
            'guan1dai4'=>'冠带',
            'lin2guan1'=>'临官',
        ];
        
        return (array_key_exists($soc,$mingChen) === false) ? '' : $mingChen[$soc];
    }
    
    /**
     * 阳干生旺死绝十二宫顺序，以胎为1
     * @return string[]
     */
    private function getOrdinal2shengWangShiJue(){
        echo "阳干";
        return [
            1=>'tai1',
            2=>'yang3',
            3=>'zhang3sheng1',
            4=>'mu4yu4',
            5=>'guan1dai4',
            6=>'lin2guan1',
            7=>'di4wang4',
            8=>'shuai1',
            9=>'bing4',
            10=>'si3',
            11=>'mu4',
            12=>'jue2',
        ];
    }
    /**
     * 阴干生旺死绝十二宫顺序，以胎为1
     * @return string[]
     */
    private function getOrdinal2shengWangShiJue_ying(){
        echo "阴干";
        return [
            12=>'tai1',
            11=>'yang3',
            10=>'zhang3sheng1',
            9=>'mu4yu4',
            8=>'guan1dai4',
            7=>'lin2guan1',
            6=>'di4wang4',
            5=>'shuai1',
            4=>'bing4',
            3=>'si3',
            2=>'mu4',
            1=>'jue2',
        ];
    }
    
    /**
     * 十天干的胎位对应的地支顺序
     * @param unknown $tianGan
     * @return string|boolean|\EFrame\Helper\unknown
     */
    private function getTianGanTai2diZhiOrdinal($tianGan){
        $ordinal = [
            1=>10,
            2=>9,
            3=>1,
            4=>12,
            5=>1,
            6=>12,
            7=>4,
            8=>3,
            9=>7,
            10=>6,
        ];
        $tianGanOrdinal = JiaZi::getTianGan($tianGan,'index');
        
        return T::arrayValue($tianGanOrdinal, $ordinal);
    }
    
    /**
     * 查询十干在九宫所处的十二宫状态
     * @param unknown $tianGan
     * @param unknown $jiuGong
     * @return NULL[]
     */
    public function getShiErGongState($tianGan,$jiuGong){
        $tianGanOrdinal = JiaZi::getTianGan($tianGan,'index');
        //九宫所藏的地支
        $diZhi = JiaZi::getDiZhi2gong($jiuGong);
        $shiErGongState = [];
        for($i = 0; $i < count($diZhi); $i++){
            //宫中地支序数
            $diZhiOrdinal = JiaZi::getDiZhi($diZhi[$i],'index');
            
            //天干胎位对应的地支序数
            $tianGanTaiOrdinal = $this->getTianGanTai2diZhiOrdinal($tianGan);
            //判断当前天干是否阳干（阳干和阴干运行十二宫的顺序不同）
            $isYangGan = $tianGanOrdinal%2;
            //阴阳干十二种状态的排序 
            $ordinal = $isYangGan ? ($diZhiOrdinal - $tianGanTaiOrdinal + 1)%12 : ($diZhiOrdinal - $tianGanTaiOrdinal)%12;
            if($ordinal < 1) $ordinal += 12;
            $stateFunc = $isYangGan ? 'getOrdinal2shengWangShiJue' : 'getOrdinal2shengWangShiJue_ying';
            
            $shiErGongState[] = $this->$stateFunc()[$ordinal];
        }
        
        return $shiErGongState;
    }
    
    
}

