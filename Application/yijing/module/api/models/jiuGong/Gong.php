<?php
namespace yijing\module\api\models\jiuGong;

use yijing\module\api\models\JiuGong;
use yijing\module\api\models\jiuGong\BaGua;
use yijing\module\api\models\jiuGong\BaMen;
use yijing\module\api\models\jiuGong\JiuXin;
use yijing\module\api\models\jiuGong\BaShen;
use yijing\module\api\models\jiuGong\QiYi;

/**
 * 单一宫模型
 * @author yx010
 *
 */
class Gong
{
    
    public $jiuGongShu;     //九宫数
    public $baGua;          //后天卦
    public $xianTianBaGua;  //先天卦
    public $baMen;          //八门
    public $diPanBaMen;     //地盘八门
    public $jiuXin;         //九星
    public $diPanJiuXin;    //地盘九星
    public $baShen;         //八神
    public $diZhi;          //地支
    public $tianPanQiYi;    //天盘奇仪
    public $diPanQiYi;      //地盘奇仪
    public $yiMa ;          //驿马（boolen）
    public $tianMa;         //天马（boolen）
    public $dingMa;         //丁马（boolen）
    public $zhiFu;          //值符（boolen）
    public $diPanZhiFu;     //值符（boolen）
    public $zhiShi;         //值吏（boolen）
    public $diPanZhiShi;    //值吏（boolen）
    public $kongWang;       //空亡（boolen）
    
    /**
     * 初始化九宫地盘的奇门局信息
     * @param unknown $jiuGongShu
     * @return \yijing\module\api\models\Gong
     */
    public function initDiPanGong($jiuGongShu){
        $this->setJiuGongShu($jiuGongShu);
        $this->setBaGua($jiuGongShu);
        $this->setXianTianBaGua($jiuGongShu);
        $this->setDiPanBaMen($jiuGongShu);
        
        $this->setDiPanJiuXin($jiuGongShu);
        $this->setDiZhi($jiuGongShu);
        $this->setDiPanQiYi($jiuGongShu);
        
        return $this;
    }
    
    /**
     * 初始化九宫天盘的奇门局信息
     * @param unknown $jiuGongShu 九宫中的当前宫
     * @param unknown $offset 以地盘奇仪相对八卦顺序为基准，天盘值符临宫的八卦序数减地盘值符临宫的八卦序数为偏移量
     * @return \yijing\module\api\models\Gong
     */
    public function initTianPanGong($jiuGongShu,$offset){
        $this->setTianPanQiYi($jiuGongShu,$offset);
        $this->setJiuXin($jiuGongShu,$offset);
    }
    
    /**
     * 初始化九宫八神的奇门局信息
     * @param unknown $jiuGongShu 九宫中的当前宫
     * @param unknown $offset 坎卦顺序为基准，天盘值符临宫的八卦序数减1为偏离的序数
     * @return \yijing\module\api\models\Gong
     */
    public function initShenPanGong($jiuGongShu,$offset){
        $this->setBaShen($jiuGongShu,$offset);
    }
    
    /**
     * 初始化奇门局的人盘信息
     * @param unknown $jiuGongShu 九宫中的当前宫
     * @param unknown $offset 以地支相对八卦顺序为基准，人盘值使临宫的八卦序数减地盘值使在宫的八卦序数为偏移量
     * @return \yijing\module\api\models\Gong
     */
    public function initRenPan($jiuGongShu,$offset){
        $this->setBaMen($jiuGongShu,$offset);
    }
    
    public function getJiuGongShu()
    {
        return $this->jiuGongShu;
    }

    
    public function setJiuGongShu($jiuGongShu)
    {
        $this->jiuGongShu = $jiuGongShu;
        return $this;
    }

    public function getBaGua()
    {
        return $this->baGua;
    }

    public function setBaGua($jiuGongShu)
    {
        $this->baGua = BaGua::getHouTianBaGua2heTu($jiuGongShu);
        return $this;
    }
    public function getXianTianBaGua()
    {
        return $this->xianTianBaGua;
    }

    public function setXianTianBaGua($jiuGongShu)
    {
        $this->xianTianBaGua = BaGua::getXianTianBaGua2heTu($jiuGongShu);
        return $this;
    }

    public function getBaMen()
    {
        return $this->baMen;
    }
    
    /**
     * 设置人盘八门
     * @param unknown $jiuGongShu
     * @return \yijing\module\api\models\Gong
     */
    public function setBaMen($jiuGongShu,$offset)
    {
        //按九宫数查找值使门在后天八卦顺序排列中的序数
        $ordinal = BaMen::getHeTu2BaMenOrdinal($jiuGongShu);
        //以后天八卦顺序排列，值使门转动的充数差。比如值使门对应的序数为3，转动后为5，那么$offset = 5 - 3
        //$offset = 2;        
        $this->baMen = BaMen::getBaMen($ordinal, $offset);
        return $this;
    }
    
    public function getDiPanBaMen()
    {
        return $this->diPanBaMen;
    }

    /**
     * 设置地盘八门
     * @param unknown $jiuGongShu
     * @return \yijing\module\api\models\Gong
     */
    public function setDiPanBaMen($jiuGongShu)
    {
        $this->diPanBaMen = BaMen::getBaMen2HeTu($jiuGongShu);
        return $this;
    }

    public function getJiuXin()
    {
        return $this->jiuXin;
    }

    /**
     * 转动天盘九星
     * @param unknown $jiuGongShu
     * @param unknown $offset 以后天八卦顺序排列，值使门转动的充数差。比如值使门对应的序数为3，转动后为5，那么$offset = 5 - 3
     * @return \yijing\module\api\models\Gong
     */
    public function setJiuXin($jiuGongShu,$offset)
    {
        //按九宫数查找值符星在后天八卦顺序排列中的序数
        $ordinal = JiuXin::getHeTu2JiuXinOrdinal($jiuGongShu);
        //以后天八卦顺序排列，值使门转动的充数差。比如值使门对应的序数为3，转动后为5，那么$offset = 5 - 3
        //$offset = 2; 
        
        $this->jiuXin = JiuXin::getJiuXin($ordinal, $offset);
        return $this;
    }
    
    public function getDiPanJiuXin()
    {
        return $this->jiuXin;
    }
    
    /**
     * 设置地盘九星
     * @param unknown $jiuGongShu
     * @return \yijing\module\api\models\Gong
     */
    public function setDiPanJiuXin($jiuGongShu)
    {
        $this->diPanJiuXin = JiuXin::getJiuXin2HeTu($jiuGongShu);
        return $this;
    }
    
    /**
     * 设置飞临人门的八神
     * @param unknown $jiuGongShu
     * @param unknown $offset
     * @return \yijing\module\api\models\Gong
     */
    public function setBaShen($jiuGongShu,$offset)
    {
        //按九宫数查找值符星在后天八卦顺序排列中的序数
        $ordinal = BaShen::getHeTu2BaShenOrdinal($jiuGongShu);
        //以后天八卦顺序排列，值符转动的序数差。比如值使门对应的序数为3，转动后为5，那么$offset = 5 - 3
        $offset = 1; 
        $this->baShen = BaShen::getBaShen($ordinal, $offset);
        return $this;
    }
    

    public function getDiZhi()
    {
        return $this->diZhi;
    }

    public function setDiZhi($jiuGongShu)
    {
        $this->diZhi = JiaZi::getDiZhi2gong($jiuGongShu);
        return $this;
    }

    public function getTianPanQiYi()
    {
        return $this->tianPanQiYi;
    }

    /**
     * 设置天盘奇仪,以地盘奇仪相对八卦顺序为基准，天盘值符临宫的八卦序数减地盘值符临宫的八卦序数为偏离的序数
     * @param unknown $jiuGongShu 表示九宫中的当前宫
     * @param unknown $offset 以地盘奇仪相对八卦顺序为基准，天盘值符临宫的八卦序数减地盘值符临宫的八卦序数为偏离的序数
     * @return \yijing\module\api\models\jiuGong\Gong
     */
    public function setTianPanQiYi($jiuGongShu,$offset)
    {
        //九宫数
        $ordinal = $jiuGongShu;
        //以地盘奇仪相对八卦顺序为基准，天盘值符临宫的八卦序数减地盘值符临宫的八卦序数为偏离的序数
        //$offset = 7;
        $this->tianPanQiYi = QiYi::getTianPanQiYi($ordinal, $offset);
        return $this;
    }

    public function getDiPanQiYi()
    {
        return $this->diPanQiYi;
    }

    /**
     * 设置地盘奇仪
     * @param unknown $jiuGongShu
     * @return \yijing\module\api\models\jiuGong\Gong
     */
    public function setDiPanQiYi($jiuGongShu)
    {
        $juShu = JiuGong::$juShu;
        
        $this->diPanQiYi = QiYi::getDiPanQiYi($jiuGongShu, $juShu);
        return $this;
    }

    public function getYiMa()
    {
        return $this->yiMa;
    }

    public function setYiMa()
    {
        $this->yiMa = true;
        return $this;
    }

    public function getTianMa()
    {
        return $this->tianMa;
    }

    public function setTianMa()
    {
        $this->tianMa = true;
        return $this;
    }
    
    public function getDingMa()
    {
        return $this->dingMa;
    }

    public function setDingMa()
    {
        $this->dingMa = true;
        return $this;
    }

    public function getZhiFu()
    {
        return $this->zhiFu;
    }

    /**
     * 设置当前宫是值符所在的宫
     * @return \yijing\module\api\models\jiuGong\Gong
     */
    public function setZhiFu()
    {
        $this->zhiFu = true;
        return $this;
    }
    
    public function getDiPanZhiFu()
    {
        return $this->diPanZhiFu;
    }

    /**
     * 设置当前宫是值符所在的宫
     * @return \yijing\module\api\models\jiuGong\Gong
     */
    public function setDiPanZhiFu()
    {
        $this->diPanZhiFu = true;
        return $this;
    }
    
    

    public function getZhiShi()
    {
        return $this->zhiShi;
    }

    /**
     * 设置当前宫是值使所在的宫
     * @return \yijing\module\api\models\jiuGong\Gong
     */
    public function setZhiShi()
    {
        $this->zhiShi = true;
        return $this;
    }
    
    public function getDiPanZhiShi()
    {
        return $this->diPanZhiShi;
    }

    /**
     * 设置当前宫是值使所在的宫
     * @return \yijing\module\api\models\jiuGong\Gong
     */
    public function setDiPanZhiShi()
    {
        $this->diPanZhiShi = true;
        return $this;
    }
    
    public function getKongWang()
    {
        return $this->kongWang;
    }
    
    /**
     * 标识当前宫空亡
     * @return \yijing\module\api\models\jiuGong\Gong
     */
    public function setKongWang()
    {
        $this->kongWang = true;
        return $this;
    }
 
    
    
}