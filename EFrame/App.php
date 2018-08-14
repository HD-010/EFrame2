<?php
//namespace EFrame;

use \EFrame\base\Base;
use \EFrame\Helper\T;
use \EFrame\base\Error;

require_once('Autoloader.php');
//require_once('base/Base.php');
//require_once('Helper/T.php');

class App{
    public static $config;
    public static $params;
    public static $route;
    public static $request;
    public static $view;
    public static $control;
    public static $model;
    public static $service;
    public static $db;
    public static $user;
    
    public function __construct($config){
        $params = $config['params'];
        unset($config['params']);
        
        //将应用中的参数合并到系统参数中
        self::$params = array_merge(
            require('common/params.php'),
            $params
        );
        
        //将应用中的配置合并到系统配置中
        self::$config = array_merge(
            require('common/config.php'),
            $config
        );
        
        //路由信息集合
        self::$route = Base::route(self::$config['defaultRout']); 
        
        //请求对象
        self::$request = Base::request();   
        
        //用户受权对象
        self::$user = Base::authorize();    
    }
    
    /**
     * 获取应用所在的目录名称
     * 该方法为基础类方法，要求用户在params参数列表中配置应用目录的完整路径
     * 如：'params' => ['@root' => dirname(__DIR__)];
     */
    public static function rootName(){
        if(!$root = self::params('@root')){
            echo "没有设置应用目录参数@root";
        }
        $rootDir = dirname($root);
        return substr($root,strlen($rootDir)+1);
    }
    
    /**
     * 返回当前请求的模型名称
     * @return string
     */
    public static function module(){
        return self::$route['module'];
    }


    /**
     * 根据模块名称返回模块对象
     * @param unknown $modelName
     * 使用说明：
     *  require(App::params('@root').'/api/models/Data.php');

        class Login extends Control
        {
            function reg(){
                $m = App::model('Data')->rightData();
                $this->renderJson($m);
            }
        }
     */
    public static function model($modelName){
        self::$model->init($modelName);
        return self::$model->$modelName;
    }
    
    /**
     * 返回当前请求的控制器名称,如果control为空
     * @return string
     */
    public static function control(){
        //控制器名大写
        return ucfirst(T::arrayValue('control', self::$route,'Index'));
    }

    /**
     * 根据服务名称(类名称)初始化这个服务对象
     * $serviceName string 服务类名称
     * @return object
     */
    public static function service($serviceName){
        //初始化一个服务
        self::$service->init($serviceName);

        return self::$service;
    }
    
    /**
     * 返回当前请求的动作名称
     * @return string
     */
    public static function action(){
        return ucfirst(T::arrayValue('action', self::$route,'index'));
    }
    
    
    /**
     * 返回参数名称对应的值
     * @name string 参数名称
     */
    public static function params($name=null){
        if($name){
            return T::arrayValue($name, self::$params,null);
        }
        return self::$params;
    }
    
    
    /**
     * 返回参数名称对应的值
     * @name string 参数名称
     */
    public static function config($name=null){
        if($name){
            return T::arrayValue($name, self::$config,null);
        }
        return self::$config;
    }
    
    /**
     * 返回请求对象，对象中包括get post
     * @return Request
     */
    public static function request(){
        return self::$request;    
    }
    
    /**
     * 获取当前使用的数据库配置名称
     * @return mixed
     */
    public static function getDBInfo(){
        return self::$db['DBInfo'];
    }
    
    /**
     * 设置当前使用的数据库配置名称
     * @param unknown $configName 数据库配置名称
     */
    public static function setDBInfo($configName){
        self::$db['DBInfo'] = $configName;
    }
    
    /**
     * 返回数据库连接对象
     * @param $configName string 数据库连接配置名称，如“db|db2"等，由config中db配置 的键名决定
     * 默认为 ： 'db'
     */
    public static function DB($configName='db'){
    	if(!is_array(self::$db)){
    	    self::$db = [];
    	}		

        if(!array_key_exists($configName,self::$db)){
            self::$db[$configName] = Base::DB($configName);
            self::setDBInfo($configName);
        }
        
        return self::$db[$configName];
    }
    
    /**
     * 初始化基础模块
     */
    protected static function baseInit(){
        //初始化服务层对象
        self::$service = Base::service();
        //初始化模型对象
        self::$model = Base::model();
        //初始化控制器对象
        self::$control = Base::control();
        //初始化视图对象
        self::$view = Base::view();
    }
    
    /**
     * 路由重定向
     * @param string $uri  格式：'/module/control/action'
     */
    public static function redirect($uri){
        self::$route = Base::redirectRoute($uri);
        self::baseInit();
        if(!is_object(self::$control)) echo "访问路由错误";
        
        //尝试加载404页面
        if(self::load404()) return false;
        
        //加载访问控制器下的操作
        self::$control->{'action'.self::action()}();
    }
    
    /**
     * 执行客户端的请求
     */
    public function run(){
        self::baseInit();
        
        //尝试加载404页面
        if(self::load404()) return false;
        
        //加载访问控制器下的操作
        self::$control->{'action'.self::action()}();
    }
    
    /**
     * 如果访问控制器下的操作不存在，则加载404页面,返回true
     */
    protected function load404(){
        //如果访问控制器下的操作不存在，则加载404页面
        
        if(self::$control === false) {
            (new Error())->error404();
            return true;
        }
    }
    
    
} 
