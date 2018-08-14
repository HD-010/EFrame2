 /**
  * Class Service
  * 服务层处理器是一个独立的应用模块，开发时在当前目录定义服务类
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