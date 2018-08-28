<?php
 namespace EFrame\base;

 use EFrame\Helper\T;

 /**
  * Class Service
  * 服务层处理器
  * 项目中服务目录位置：\Application\$app\module\api\servicese
  * 在开发中需要将服务类定义在服务目录中。
  * 定义好的服务类可以通过以下方式调用
  * 调用方法：
  * //查看服务列表
  * App::service($serviceName)->options();
  * //根据服务名称创建服务
  * $service = App::service($serviceName)->options($serviceName);
  * //调用服务中的成员方法
  * $service->method();
  * //如果一个服务不再使用，可将他从服务列表删除
  * $servic->destroy($serviceName);
  *
  * @package EFrame\base
  */
class Service{
    protected $serviceList;      //服务项目列表
    protected $serviceName;      //当前服务名称

    /**
     * 初始化服务名称对旬的服务对象
     * @param $serviceName string 服务名称 格式：service|子服务标识
     * @return $this
     */
   public function init($serviceName){
       if(!is_string($serviceName)) return;
       $this->serviceName = $serviceName;
       if(is_array($this->serviceList) && in_array($serviceName,$this->serviceList)) return $this;
       //初始化服务列表
       $this->serviceList = [];
       //创建一个新的服务对象，并将其加入服务列表
       $this->serviceList[$serviceName] = $this->createService();
       return $this;
   }

    /**
     * 根据项目名称获取service项目对象，如果项目名称不存在，则返回一个空数组
     * @param $optionName 项目名称，如果为null，则打印服务信息
     * @return bool|\EFrame\Helper\unknown|string
     */
   public function options($optionName=null){
       //$optionName如果为真，则返回列表项对象
       if($optionName) return T::arrayValue($optionName,$this->serviceList,[]);
       //如果为null，则打印服务列表信息
       T::print_pre($this->serviceList);
   }

    /**
     * 销毁服务列表中的项
     * @param $optionName
     */
   public function destroy($optionName){
       if($optionName && T::arrayValue($optionName,$this->serviceList,false)){
           unset($this->serviceList,$optionName);
       }
   }

   //创建一个新的服务
    protected function createService(){
        if(!$rootName = \App::rootName()) return;
        //获取服务路径
        $service= (explode('|',$this->serviceName))[0];
        //$serviceName= "\\".$rootName."\\module\\".\App::module()."\\servicese\\".$this->serviceName;
        $serviceName= "\\".$rootName."\\module\\".\App::module()."\\servicese\\".$service;
        eval("\$serviceName = \"$serviceName\";");
        try{
            if(!class_exists($serviceName)) return false;
            $service = new $serviceName;
        }catch(\Exception $e){
            print $e->getMessage();
            return false;
        }

        return $service;
    }


}