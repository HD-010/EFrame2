<?php
namespace EFrame\base;

use \App;
use Eframe\Helper\T;

/**
 * @author yx010
 * 该 类被控制器继承
 */
class View{
    private $viewPath;
    private $layoutPath;
    private $main;
    private $data;

    /**
     * @param unknown $fileName
     * @param unknown $data 传到小部件的数据
     */
    public function renderWidget($fileName,$data=null){
        //将传入的数据保存到属性中，供分页器使用
        $this->data = $data;

        //组织小部件路径
        $widgetPath = App::params('@root').'/module/'.App::module().'/widgets/'.$fileName.'.php';
        try{
            if(!is_file($widgetPath)){
                throw new \Exception('视图文件不存在：'.$widgetPath);
            }else{
                require($widgetPath);
            }
        }catch(Exception $e){
            $err['line'] = $e->getLine();
            $err['file'] = $e->getLine();
            $err['msg'] = $e->getMessage();
            return $err;
        }
    }
    
    /**
     * 在布局文件中引入视图内容 
     * 例：
     * $this->contents();
     */
    public function contents(){
        $data = $this->data;
        if(is_file($this->viewPath)){
            require($this->viewPath);
        }
    }

    /**
     * 设置布局文件名称（路径）
     * @param string $main 布局文件名称，如：'/path/name'
     */
    public function layOut($main=null){
        if($main && !preg_match('/^\W/',$main)) $main = '/'.$main;
        //exit($main);
        $this->main = $main;

        return $this;
    }
    
    /**
     * 该方法将视图内容返回到布局
     * @param unknown $fileName
     * @param unknown $data 传到视图的数据
     */
    public function render($fileName,$data=null){
        $this->data = $data;
        
        //这里申明视图文件路径，将后在布局文件中通过调用$this->contents()方法载入视图文件
        $viewPath = App::params('@root').'/module/'.App::module().'/views/'.App::control().'/'.$fileName.'.php';
        $this->viewPath = $viewPath;
        
        //这里声明布局文件路径
        $main = $this->main ? $this->main : '/main';
        $layoutPath = App::params('@root').'/module/'.App::module().'/layout'.$main.'.php';
        $this->layoutPath = $layoutPath;
        
        //这里载入布局文件
        if(is_file($this->layoutPath)){
            require_once($this->layoutPath);
        }
    }
    
    /**
     * 渲染一个 视图名 并且不使用布局。
     */
    public function renderPartial($fileName,$data=null){
        //这里申明视图文件路径
        $viewPath = App::params('@root').'/module/'.App::module().'/views/'.App::control().'/'.$fileName.'.php';
        $this->viewPath = $viewPath;
        
        //这里载入视图文件
        if(is_file($this->viewPath)){
            require($this->viewPath);
        }
    }
    
    /**
     * 渲染一个 视图名 并且不使用布局， 并注入所有注册的JS/CSS脚本和文件，通常使用在响应AJAX网页请求的情况下
     */
    public function renderAjax($fileName,$data=null){
        
        //这里申明视图文件路径
        $viewPath = App::params('@root').'/module/'.App::module().'/views/'.App::control().'/'.$fileName.'.php';
        $this->viewPath = $viewPath;
        
        //这里载入视图文件
        if(!is_file($this->viewPath)) return;
        
        //打开缓冲区
        ob_start();
        
        require($this->viewPath);
        
        //从内存缓存中获取页面代码
        $content = ob_get_contents();
        //清除内存缓存
        ob_flush();
        
        
        //jsonp跨域处理
        if(!$jsonpcallback = App::$request->get('jsonpcallback')){
            echo $content;
            return;
        }
        echo $jsonpcallback."(".json_encode($content).")";
        
    }

    /**
     *  引用分页器
     *  引用分页器说明：
     * 引用位置：需要分页的小部件头部
     * 方式：$this->usePaging();
     */
    public function usePaging(){
        echo (T::arrayValue('status',$this->data)) ? '<script> window.paging = 1 </script>' : '<script> window.paging = -1 </script>';
    }

    /**
     * 调用自动分页器
     */
    public function autoPaging(){
        echo <<<JAVASCRIPT
            <script>
                /* 
                * url 目标url 
                * arg 需要替换的参数名称 
                * arg_val 替换后的参数的值 
                * return url 参数替换后的url 
                */ 
                function changeURLArg(url,arg,arg_val){ 
                    var pattern=arg+'=([^&]*)'; 
                    var replaceText=arg+'='+arg_val; 
                    if(url.match(pattern)){ 
                        var tmp='/('+ arg+'=)([^&]*)/gi'; 
                        tmp=url.replace(eval(tmp),replaceText); 
                        return tmp; 
                    }else{ 
                        if(url.match('[\?]')){ 
                            return url+'&'+replaceText; 
                        }else{ 
                            return url+'?'+replaceText; 
                        } 
                    } 
                    return url+'\\n'+arg+'\\n'+arg_val; 
                } 
                
                /**
                 * 获取url听的参数值
                 */
                function getQueryString(name) {
                    var reg = new RegExp('(^|&)' + name + '=([^&]*)(&|$)', 'i');
                    var r = window.location.search.substr(1).match(reg);
                    if (r != null) {
                        return unescape(r[2]);
                    }
                    return null;
                }
                
                function ScollPostion() {
                    var t, l, w, h, y, vh;
                    if (document.documentElement && document.documentElement.scrollTop) {
                        h = document.documentElement.scrollHeight;
                        y = window.scrollY;
                        vh = document.documentElement.clientHeight;
                    } else if (document.body) {
                        h = document.body.scrollHeight;
                        y = window.scrollY;
                        vh = window.innerHeight;
                    }
                    return {
                        height: h,
                        scrollY: y,
                        viewheight: vh
                    };
                }
                
                
                /**
                 * 简易分页工具
                 * 如果window.paging的值为1,表示当前页面需需要实现分页
                 * 如果为－1，表示当前页面分页出错，返回上一页
                 * 否则不需要分页
                 */
                window.onscroll= function(){
                    if(window.paging == 1){
                        
                        var scrollObj = ScollPostion();
                        var url;
                        var cp = getQueryString('cp');
                        if(cp == 'NaN') cp = 1;
                        cp = parseInt(cp);
                        if(cp > 1 && (scrollObj.top == 0)){
                            sessionStorage.setItem('paging', 1);
                            cp --;
                            url = changeURLArg(location.href,'cp',cp);
                            console.log(url);
                            location.href = url;
                        }
                        
                        if((sessionStorage.getItem('paging') != -1) && (scrollObj.viewheight + scrollObj.scrollY) > (scrollObj.height - 300)){
                            cp ++;
                            url = changeURLArg(location.href,'cp',cp);
                            console.log(url)
                            document.location.href = url;
                        }
                    }
                }
                
                if(window.paging == -1) {
                    sessionStorage.setItem('paging', -1);
                    history.back();
                }
                
            </script>

JAVASCRIPT;
    }
}