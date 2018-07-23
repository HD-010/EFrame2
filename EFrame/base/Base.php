<?php
namespace EFrame\base;

use \App;
use \EFrame\Base\Route;
use \EFrame\Base\View;
use \EFrame\Base\Control;
use \EFrame\Base\Model;
use \EFrame\Base\Block;
use \EFrame\base\Request;
use \EFrame\base\Error;

/**
 * @author yx010
 *
 */
class Base{
    /**
     * 实例化一个route对象
     * @$config array 配置对象
     * @return unknown
     */
    public static function route($defaultRout){
        return (new Route($defaultRout))->parseRoute()->getRoute();
    }
    /**
     * 实例化一个route对象
     * @$uri string 请求资源的uri
     * @return unknown
     */
    public static function redirectRoute($uri){
        return (new Route($uri))->redirectRoute($uri)->getRoute();
    }
    
    /**
     * 实例化一个request对象
     * @return Request
     */
    public static function request(){
        return new Request();
    }
    
    
    /**
     * 实例化一个view对象
     * @param unknown $viewName
     * @return unknown
     */
    public static function view(){
        return new View();
    }
    /**
     * 实例化一个control对象
     * 如果实例化的当前control对象不存在，则将当前control对象调整为Error对象（用于返回404等页面不存在等错误信息）
     * @param unknown $controlName
     * @return unknown
     */
    public static function control(){
        $conName = \App::control();
        
        if(!$rootName = \App::rootName()) return false;
        
        //获取控制器路径
        $controlName= "\\".$rootName."\\module\\".\App::module()."\\controls\\".$conName;
        
        eval("\$controlName = \"$controlName\";");
        
        try{
            if(!class_exists($controlName)) return false;
            $control = new $controlName;
            
        }catch(\Exception $e){
            print $e->getMessage();
            return false;
        }
        return $control;
        
    }
    /**
     * 实例化一个Model对象
     * @param unknown $modelName
     * @return unknown
     */
    public static function model(){
        return new \EFrame\base\Model();
    }
    /**
     * 实例化一个block对象
     * @param unknown $blockName
     * @return unknown
     */
    public static function block(){
        return new \EFrame\base\Block();
    }
    
    public static function authorize(){
        return new \EFrame\base\Authorize();
    }
 
    /**
     * 返回数据库连接对象
     * @param $configName string 数据库连接配置名称，如“db|db2"等，由config中db配置 的键名决定
     */
    public static function DB($configName){
        //连接数据库的配置
        $dbConfig = App::config('DBconfig.'.$configName);
        $dsn = trim($dbConfig['dsn']);
        
        //数据库类型
        $dbConfig['type'] = substr($dsn,0,strpos($dsn,':'));
        
        return self::{$dbConfig['type']}($dbConfig);
    }
    
    /**
     * 实例化mysql_pdo连接对象
     * @param unknown $dbConfig
     * @return unknown
     */
    public static function mysql($dbConfig){
        //数据库类型名称，如：mysql
        $DBModel = ucfirst($dbConfig['type']).'DB';
        //获取控制器路径
        $DBModelName= "\\EFrame\\base\\".$DBModel;
        
        eval("\$DBModelName = \"$DBModelName\";");
        
        return new $DBModelName($dbConfig);
    }
    
    
    
}
