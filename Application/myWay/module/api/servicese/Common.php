<?php
/**
 * Created by PhpStorm.
 * User: yx010
 * Date: 2018/8/29
 * Time: 21:41
 */
namespace myWay\module\api\servicese;

use App;
use EFrame\Helper\T;

class Common
{
    protected $param;

    //解析modelData模块携带的参数
    public function parseModelParam($param){
        //封装参数
        $this->param['tid'] = T::getStrVal('tid',$param);

        //该模块对应栏目的访问地址的参数
        $this->param['lUrl'] = 'index?m=idk2584s&v='.
            T::getStrVal('l',$param,'index').
            '&tid='.$this->param['tid'];

        //该模块对应内容页的访问地址的参数
        $this->param['cUrl'] = 'index?m=idk2584s&v='.
            T::getStrVal('l',$param,'index').
            '&aid=';

        //栏目对应的访问地址的参数
        $this->param['tUrl'] = 'index?m=idk2584s&v=';

        return $this->param;
    }

/*    //解析栏目标识
    //将#@_arctype表中typedir字段中的栏目名称解析出来
    public function parseTypeUrl($arcType){
T::print_pre($arcType);exit;
        return $this->param;
    }*/

}