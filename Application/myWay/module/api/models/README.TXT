
  @author yx010
 　models 在于与servicese层的数据交互
  Model调用示例：
  　在控制器中实例化Data模型并用调用updateData()方法：
  require(App::params('@root').'/api/models/Data.php');
  $res = App::model('Data')->updateData();
