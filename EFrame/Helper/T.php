<?php
namespace EFrame\Helper;

class T
{
    /**
     * 格式化输出输入内容
     * @param unknown $data
     */
    public static function print_pre($data){
        echo "<pre>".print_r($data,1)."</pre>";
    }
    
    /**
     * @author 弘德誉曦
     * 以链式键名获取多维数组的值
     * @param unknown $key
     * @param unknown $array
     * @param unknown $default
     * @return string|string|boolean|unknown
     */
    public static function arrayValue($key,$array,$default=null){
        $arr = $array;
        $keys = explode('.', $key);
        $error = '错误：不成以数组的形式访问字符串';
        //$error = false;
        $value = $default;
    
        if(!is_array($arr)) return $error;
        foreach ($keys as $val) {
            if (! is_array($arr)) {
                return $error;
            }
            $arr = array_key_exists($val, $arr) ? $arr[$val] : false;
            $value = $arr;
        }
        return $value ? $value : $default;
    }

    /**
     * 获取限定长度的字符串,如果字符长度大于指定的长度截取限定长度以的字符，乘于的用...表示
     * @param $str 可以是字符串，也可以是以.连接的key
     * @param $array 如果是数组，则$str必须是以.连接的key
     * @param $len  表示截取字符串的长度
     * @return string
     */
    public static function limitStr($len,$str,$array=null){
        if(is_array($array)) $str = self::arrayValue($str,$array,'');
        if(is_array($str)) return false;
        return strlen($str) > $len ? mb_substr($str,0,$len).'...' : $str;
    }
    
    
    /**
     * 为数据添加status状态标识
     * @param unknown $data
     */
    public static function addStatus($data){
        if(empty($data)) return ['status' => 0];
        return array(
            'status' => 1,
            'data' => $data
        );
    }
    
    
    
    
    /**
     * 返回json数据格式
     * 
     * @param unknown $data
     * 
     * return json
     */
    public static function outJson($data){
         echo json_encode($data);
    }
    
    /**
     * @author 弘德誉曦
     * 查找多维数组中同一层级的所有相同键名的值
     *
     * @param string $key     查找的键名
     * @param array $array   被查找的多维数组
     * @param string $limter  字串分隔符
     * return string|array
     */
    public static function implodeArr($key,$array,$limter=null){
        $data = $limter ? '' : [];
        if(!is_array($array)) return "";
        foreach($array as $k => $v){
            if(!is_array($v)) return "";
            if(array_key_exists($key,$v)){
                if($limter){
                    $data .= $limter . $v[$key];
                }else{
                    $data[] = $v[$key];
                }
    
            }else{
                if($limter){
                    $data .= $this->implodeArr($key,$v,$limter);
                }else{
                    $data = array_merge($data,$this->implodeArr($key,$v,$limter));
                }
            }
        }
        return $data;
    }

    /**
     * 获取固定格式字符串中的字符串
     * @param unknown $find 需要查找的字符或返回索引对应的值
     * 如果$find为正整数则返回相当索引的值,如果$find是负整数，则返回到数第$find个元素
     * @param unknown $search　被查找的字符，格式如：ArticalList_0|tid=9|ut=news|ua=arcital　或　{cmspath}/a/guanyuwomen/qiyewenhua
     * @param $default 如果没有找到相应的值，则返回默认值
     */
    public static function getStrVal($find,$search,$default=null){
        $strArr = preg_split('/\||\//',$search);
        //返回当前索引对应的值
        
        if(is_int($find)) {
            //如果$find为正整数则返回相当索引的值
            if($find > -1) return self::arrayValue($find, $strArr,$default);
            //如果$find是负整数，则返回到数第$find个元素
            if($find < 0) return self::arrayValue(count($strArr) + $find, $strArr,$default);
            
        }
        //查找匹配字符串内部表示的值
        $find .= '=';
        foreach($strArr as $str){
            $pos = strpos($str,$find);
            
            if($pos !== false) {
                $start = $pos + strlen($find);
                return substr($str,$start);
            }
        }
        
        return $default ?  $default : false;
        
    }
    
    
    /**
     * 按健名把字符串中的占位符替换为健名=值，并返回替换后的字串
     * @param array $replace　　如　[t=>'list',v=>'index']
     * @param unknown $str　　如：'index?m=idk2584s&t=@t&v=@v'
     * @return unknown|mixed  如：　'index?m=idk2584s&t=list&v=index'
     * 
     * 注：大该方法中如果参数没有完全替换，则会报错，提示无效url
     */
    public static function replaceToVal($str,$replace=[]){
        $str = $str;
        foreach($replace as $key => $val){
            $str = str_replace('@'.$key, $key.'='.$val, $str);
        }
        
        return $str;
    }
    
    /**
     * 在一个多维数组findArray中，以key＝＝val为条件查找findKey，并返回找到的值
     * @param unknown $array
     * 结构如：
     * [
     *  key,            
     *  val,
     *  findKey,
     *  findArray
     * ]
     */
    public static function lookAbout($array){
        $findArray = $array[3];
        $res = '';
        if(is_array($findArray)){
            $key = $array[0];
            $val = $array[1];
            $findKey = $array[2];
            
            foreach($findArray as $k=>$v){
                //echo $k . "===" .$key ."|||". $v."==".$val."<br/>";
                if(is_array($v)){
                    $res = self::lookAbout([
                        $key,
                        $val,
                        $findKey,
                        $v
                    ]);
                }elseif($k == trim($key) && $v == trim($val) ){
                    $res = $findArray[$findKey];
                    
                    break;
                }
            }
        }
        
        return $res;
        
    }
    
}