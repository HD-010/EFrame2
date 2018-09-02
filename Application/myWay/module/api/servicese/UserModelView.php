<?php
/**
 * 用户视图模型服务
 * 用于处理视图模型数据
 * Created by PhpStorm.
 * User: yx010
 * Date: 2018/8/12
 * Time: 8:56
 * 该类测试地址如：
 * http://newway.eframe2.e01.ren/api/site/index?m=idk2584s
 * 调用方法如：
 *  //获取用户从事行业代码
 *  $userModelView = App::service('UserModelView')->options('UserModelView');
    //用户从事行业代码
    $data['industroyCode'] = $userModelView->getIndustroyCode();
 */
namespace myWay\module\api\servicese;

use App;
use EFrame\Helper\T;

class UserModelView
{
    protected $industroyCode;    //行业代码
    protected $modelConfig;    //用户视图模块配置
    protected $modelStyle;     //用户视图模块的样式表
    protected $modelData;      //用户视图模型与数据模型的对照关系
    protected $parseOption;    //解析项目名称
    protected $viewConfig;     //用户视图配置目录
    protected $modelId;         //视图模块配置文件id
    protected $filePath;        //文件路径

    public function __construct(){
        //初始化用户视图配置目录
        $this->viewConfig = App::params('@viewConfig');
        //初始化用户信息，用以关联视图模块配置文件
        $this->initModelId();
        //初始化用户所属行业代码，视图模块按行业代码分类，这步很重要
        $this->initIndustroyCode();
    }
    /**
     * 解析用户配置文件
     * @param $parseOption 解析项目名称，如：modelConfig｜modelStyle
     * @return $this
     */
    public function parse($parseOption){
        //成员方法名称
        $methodName = 'parse'.ucfirst($parseOption);
        if(method_exists($this,$methodName)) {
            //设置解析项目名称
            $this->parseOption = $parseOption;
            //设置配置文件路径
            $this->filePath = $this->viewConfig
                .'\\'.$parseOption
                .'\\'.$this->getIndustroyCode('TOP')
                .'\\'.$this->getIndustroyCode('SON')
                .'\\u_'.$this->modelId.'.php';
            //调用解析方法
            $this->$methodName();

            return $this;
        }
        echo "$parseOption 解析失败";
    }

    /**
     * 获取用户所有视图模块的配置信息
     * @return mixed
     */
    public function get(){
        return $this->{$this->parseOption};
    }

    /**
     * 获取行业代码
     * 在这里行业代码分二级
     * @param $tag null|top|son  如果是null，返回一个顶级和子级代码的数组；如果是top,返回顶级；son返回子级
     * @return array|string
     */
    public function getIndustroyCode($tag=null){
        if($tag == 'TOP') goto top;
        if($tag == 'SON') goto son;
        if(!$tag) goto all;
        top:
        return T::arrayValue(0,explode('|',$this->industroyCode));
        son:
        return T::arrayValue(1,explode('|',$this->industroyCode));
        all:
        return explode('|',$this->industroyCode);

    }

    /**
     * 初始化用户信息，用以关联视图模块配置文件
     * @return $this
     */
    protected function initModelId(){
        $this->modelId = App::request()->get('m');

        return $this;
    }

    /**
     * 用户视图模块配置文件
     * @return $this
     */
    protected function parseModelConfig(){
        if(is_file($this->filePath)) require_once($this->filePath);
        //T::print_pre($modelConfig);
        $this->modelConfig = $modelConfig;

        return $this;
    }


    /**
     * 用户视图模块样式表
     * @return $this
     */
    protected function parseModelStyle(){
        if(is_file($this->filePath)) require_once($this->filePath);
        //T::print_pre($modelStyle);
        $this->modelStyle = $modelStyle;

        return $this;
    }

    /**
     * 用户视图模块样式表
     * @return $this
     */
    protected function parseModelData(){
        if(is_file($this->filePath)) require_once($this->filePath);
        //T::print_pre($modelStyle);
        $this->modelData = $modelData;

        return $this;
    }

    /**
     * 初始化用户所属行业代码
     */
    protected function initIndustroyCode(){
        //行业代码,例如食品|餐饮美食
        $industroyCode = '2410|223';
        //$industroyCode = '4536|396';
        $this->industroyCode = $industroyCode;
    }
}