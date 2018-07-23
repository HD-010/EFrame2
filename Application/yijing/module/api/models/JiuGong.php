<?php
namespace yijing\module\api\models;

use EFrame\Helper\T;
use yijing\module\api\models\jiuGong\Gong;
use yijing\module\api\models\jiuGong\BaGua;
use yijing\module\api\models\jiuGong\JiaZi;
use yijing\module\api\models\jiuGong\ZhiFu;
use yijing\module\api\models\jiuGong\ZhiShi;
use yijing\module\api\models\jiuGong\KongWang;
use yijing\module\api\models\jiuGong\MaXin;

/**
 * 九宫模型
 * @author yx010
 * 说明：实例化后的九宫模型具有奇门局完整的九宫信息。
 * 九宫中的任何一宫都是一个独立的对象，该对象由class Gong实例化而来。
 
    九宫的调用案例如下：
    use yijing\module\api\models\JiuGong;
    $obj = [
        'jieQi'   => '立春',
        'juShu'   => '8',
        'nianZhu' => [
            'tianGan' => 'yi3',
            'diZhi' =>'chou3'
        ],
        'yueZhu'  => [
            'tianGan' => 'yi3',
            'diZhi' =>'chou3'
        ],
        'riZhu'   => [
            'tianGan' => 'jia3',
            'diZhi' =>'wu3'
        ],
        'shiZhu'  => [
            'tianGan' => 'yi3',
            'diZhi' =>'chou3'
        ],
    ];
    $jiuGong = new JiuGong($obj);
 
 
 */
class JiuGong
{
    public static $jieQi;       //int二十四节气
    public static $fuTou;       //string符头
    public static $juShu;       //int阴遁（负数）阳遁（正数）局数
    public static $nianZhu;     //array 年柱
    public static $yueZhu;      //array 月柱
    public static $riZhu;       //array 日柱
    public static $shiZhu;      //array 时柱
    public static $xunSou;      //string 旬首(时柱为基准)
    public static $zhiFu;       //string 值符星
    public static $zhiShi;      //string 值使门
    public static $guWei;       //array 孤位
    public static $xuWei;       //array 虚位
    public static $yiMa;        //驿马星
    public static $tianMa;      //天马星
    public static $dingMa;      //丁马星
    
    public $gong_1;     //object
    public $gong_2;     //object
    public $gong_3;     //object
    public $gong_4;     //object
    public $gong_5;     //object
    public $gong_6;     //object
    public $gong_7;     //object
    public $gong_8;     //object
    public $gong_9;     //object
    
    /**
     * 注意：须按时序初始化
     * @param unknown $baseInfor
     * @return boolean|\yijing\module\api\models\JiuGong
     */
    public function __construct($baseInfor){
        //初始化基础信息
        $this->initBaseInfor($baseInfor);
        //初始化九宫地盘信息
        $this->initDiPan();
        //初始化空亡宫(空亡是九宫中的对象，需要实例化九宫对象后初始化空亡)
        if(!$this->initKongWang()) return false;
        //初始化马星
        if(!$this->initMaXing()) return false;
        //初始化值符
        if(!$this->initZhiFu()) return false;
        //初始化值使
        if(!$this->initZhiShi()) return false;
        
        //转动天盘
        $this->roundTianPan();
        //转动神盘
        $this->roundShenPan();
        //转动人盘
        $this->roundRenPan();
        
        return $this;
    }
    
    /**
     * 初始化基础信息
     * @param unknown $baseInfor
     */
    private function initBaseInfor($baseInfor){
        self::$jieQi = T::arrayValue('jieQi', $baseInfor);
        self::$juShu = T::arrayValue('juShu', $baseInfor);
        self::$nianZhu = T::arrayValue('nianZhu', $baseInfor);
        self::$yueZhu = T::arrayValue('yueZhu', $baseInfor);
        self::$riZhu = T::arrayValue('riZhu', $baseInfor);
        self::$shiZhu = T::arrayValue('shiZhu', $baseInfor);
        
        //初始化时柱旬首
        if(!$this->initXunSou(T::arrayValue('shiZhu', $baseInfor))) return false;
        
        //初始化孤虚位
        if(!$this->initGuXu()) return false;
        
        //初始化马星
        if(!$this->initMaXing()) return false;
        
        
        
        
        return true;
    }
    
    /**
     * 初始化旬首（四柱旬首的查找都可用此方法）
     * @param array $ganZhi 干支的数组
     * @return boolean 初始化失败返回false
     */
    private function initXunSou($ganZhi){
        if(!is_array($ganZhi)) return false;
        self::$xunSou = JiaZi::getXunSou($ganZhi);
        return true;
    }
    
    /**
     * 初始化值符
     */
    private function initZhiFu(){
        if(self::$zhiFu = ZhiFu::getZhiFu($this)) return true;
    }
    
    /**
     * 初始化值使
     */
    private function initZhiShi(){
        if(self::$zhiShi = ZhiShi::getZhiShi($this)) return true;
    }
    
    /**
     * 初始化孤虚位
     */
    private function initGuXu(){
        self::$guWei = KongWang::getGuWei();
        self::$xuWei = KongWang::getXuWei();
        if(self::$guWei && self::$xuWei) return true;
    }
    
    /**
     * 初始化空亡宫
     */
    private function initKongWang(){
        if(KongWang::setKongWangGong($this)) return true;
    }
    
    /**
     * 初始化马星
     * 这里的马星包括驿马星，天马星，丁马星
     */
    private function initMaXing(){
        self::$yiMa = MaXin::getYiMa();
        self::$tianMa = MaXin::getTianMa();
        self::$dingMa = MaXin::getDingMa();
        if(self::$yiMa && self::$tianMa && self::$dingMa) return true;
    }
    /**
     * 初始化马星宫
     * 这里的马星包括驿马星，天马星，丁马星
     */
    private function initMaXingGong(){
        if(MaXin::setYiMaGong($this) &&
            MaXin::setTianMaGong($this) &&
            MaXin::setDingMaGong($this)
            ) return true;
    }
    
    
    
    private function initBaMen($offset){
        //初始化九宫天盘信息
        for($i = 1; $i <= 9; $i ++){
            $gong = 'gong_'.$i;
            if(!is_object($this->$gong)) continue;
            $this->$gong->initRenPan($i,$offset);
        }
    }
    
    /**
     * 初始化九宫八神信息
     *  @param integer $offset 以地盘奇仪相对八卦顺序为基准，天盘值符临宫的八卦序数减地盘值符临宫的八卦序数为偏离的序数
     */
    private function initBaShen($offset){
        //初始化九宫天盘信息
        for($i = 1; $i <= 9; $i ++){
            $gong = 'gong_'.$i;
            if(!is_object($this->$gong)) continue;
            $this->$gong->initShenPanGong($i,$offset);
        }
    }
    
    /**
     * 初始化九宫天盘信息
     *  @param integer $offset 以地盘奇仪相对八卦顺序为基准，天盘值符临宫的八卦序数减地盘值符临宫的八卦序数为偏离的序数
     */
    private function initTianPan($offset){
        //初始化九宫天盘信息
        for($i = 1; $i <= 9; $i ++){
            $gong = 'gong_'.$i;
            if(!is_object($this->$gong)) continue;
            $this->$gong->initTianPanGong($i,$offset);
        }
    }
    
    /**
     * 初始化九宫地盘信息
     */
    private function initDiPan(){
        //初始化九宫地盘信息
        for($i = 1; $i <= 9; $i ++){
            $gong = 'gong_'.$i;
            if(is_object($this->$gong)) continue;
            $this->$gong = (new Gong())->initDiPanGong($i);
        }
    }
    
    /**
     * 设置当前宫是值符所临之宫
     * @param unknown $jiuGongShu
     */
    private function isZhiFu($jiuGongShu)
    {
        $this->{"gong_".$jiuGongShu}->setZhiFu();
    }
    
    /**
     * 设置当前宫是值使所临之宫
     * @param unknown $jiuGongShu
     */
    private function isZhiShi($jiuGongShu)
    {
        $this->{"gong_".$jiuGongShu}->setZhiShi();
    }
    
    /**
     * 转动天盘@param integer $offset 以地盘奇仪相对八卦顺序为基准，天盘值符临宫的八卦序数减地盘值符临宫的八卦序数为偏离的序数
     */
    private function roundTianPan()
    {
        //获取时干
        $value = self::$shiZhu['tianGan'];
        //如果时干为甲，则根据时时柱的地支找到其对应的六仪
        if($value === 'jia3') $value = ZhiFu::getXunSou2liuYi(self::$shiZhu['diZhi']);
        
        //查找时干在哪一宫（值符加时干）
        $shiGanGong = $this->searchGongAttribute('diPanQiYi', $value);
        
        //查找值符在哪一宫（值符加时干）
        $zhiFuGong = $this->searchGongAttribute('diPanZhiFu', true);
        
        //计算值符加时干需要偏移的八卦序数
        $offset = BaGua::getHeTu2BaGuaOrdinal($shiGanGong) - BaGua::getHeTu2BaGuaOrdinal($zhiFuGong);
        if($offset < 0) $offset += 8;  
        
        //标识天盘值符宫信息
        $this->isZhiFu($shiGanGong);
        
        //初始化九宫天盘信息
        $this->initTianPan($offset);
    }
    
    /**
     * 转动神盘（八神值符跟随九星值符）
     * $offset可以为正数和负数，阳遁用正数，阴遁用负数
     */
    private function roundShenPan()
    {
        //获取时干
        $value = self::$shiZhu['tianGan'];
        //如果时干为甲，则根据时时柱的地支找到其对应的六仪
        if($value === 'jia3') $value = ZhiFu::getXunSou2liuYi(self::$shiZhu['diZhi']);
        
        //查找时干在哪一宫（值符加时干）
        $shiGanGong = $this->searchGongAttribute('diPanQiYi', $value);
        
        //计算值符加时干需要偏移的八卦序数,$offset可以为正数和负数，阳遁用正数，阴遁用负数
        $offset = BaGua::getHeTu2BaGuaOrdinal($shiGanGong) - 1;
        
        //初始化九宫八神信息,这里根据节气，如果是阴遁，则 $offset*(－1)
        $this->initBaShen($offset);
    }
    
    //转动人盘
    private function roundRenPan()
    {
        //获取时支
        $value = self::$shiZhu['diZhi'];
        //查找时支在哪一宫（值使加时支）
        $shiZhiGong = $this->searchGongAttribute('diZhi', $value);
        //查找值使在地盘哪一宫（值使加时支）
        $zhiShiGong = $this->searchGongAttribute('diPanZhiShi', true);
        //计算值使加时干需要偏移的八卦序数
        $offset = BaGua::getHeTu2BaGuaOrdinal($shiZhiGong) - BaGua::getHeTu2BaGuaOrdinal($zhiShiGong);
        if($offset < 0) $offset += 8;  
        
        //标识人盘值使宫信息
        $this->isZhiShi($shiZhiGong);
        //初始化九宫人盘信息
        $this->initBaMen($offset);
    }
    
    public function getGong_1()
    {
        return $this->gong_1;
    }

    public function getGong_2()
    {
        return $this->gong_2;
    }

    public function getGong_3()
    {
        return $this->gong_3;
    }

    public function getGong_4()
    {
        return $this->gong_4;
    }

    public function getGong_5()
    {
        return $this->gong_5;
    }

    public function getGong_6()
    {
        return $this->gong_6;
    }

    public function getGong_7()
    {
        return $this->gong_7;
    }

    public function getGong_8()
    {
        return $this->gong_8;
    }

    public function getGong_9()
    {
        return $this->gong_9;
    }
    
    /**
     * 查找九宫中各个元素的值
     * @param integer $ordinal 九宫数
     * @param string $attribute 属性名称，是class Gong 中的成员属性名称
     */
    public function getGongAttribute($ordinal,$attribute)
    {
        return $this->{"gong_".$ordinal}->$attribute;
    }
    
    
    /**
     * 定位要查找的元素在哪一宫
     * @param string $attribute 属性名称，是class Gong 中的成员属性名称
     * @param string $value 要进行对比的值
     * @return number|boolean 查找成功返回九宫数，失败返回false
     */
    public function searchGongAttribute($attribute,$value)
    {
        for($i = 1; $i < 10; $i ++){
            $temp = $this->getGongAttribute($i, $attribute);
            if(is_array($temp) && in_array($attribute, $temp) === false){
                return $i;
            }else if($temp === $value){
                return $i;
            }
        }
        return false;
    }
    
    
}