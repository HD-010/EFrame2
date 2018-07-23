<?php
namespace EFrame\base;

use \App;
use \EFrame\Helper\T;

class Authorize{
    protected $isGuest;
    protected $userInfo;
    
    public function login(){
        @session_start();
        $_SESSION['userInfo'] = App::$request->post();
    }
    
    /**
     * 判断用户是否访客（未登录），是则返回true
     * 通过判断后可以直接使用user对象
     * @return boolean
     */
    public function isGuest(){
        if($sid = \App::$request->get('sid')){
            @session_id($sid);
            @session_start($sid);
        }
          
        if(isset($_SESSION['userInfo'])) {
            $this->userInfo = $_SESSION['userInfo'];
            $this->isGuest = true;
        }
        return $this->isGuest ? false : true;
    }
    
    /**
     * 获取登录用户的信息
     * @param string $key 是登录用户的身份信息，可以使用key1.key2....是形式获取健对应的值
     * @return un
     */
    public function userInfo($key=null){
        if(!is_array($this->userInfo)) $this->userInfo = [];
        if(!$key) return $this->userInfo;
        return T::arrayValue($key, $this->userInfo);
    }
    
    /**
     * 添加用户信息
     * @param unknown $key
     * @param unknown $value
     */
    public function setItem($key,$value){
        $this->userInfo[$key] = $value;
    }
    
    /**
     * 获取登录用户的信息
     * @param string $key 是登录用户的身份信息，可以使用key1.key2....是形式获取健对应的值
     * @return un
     */
    public function getItem($key=null){
        return $this->userInfo($key);
    }
}