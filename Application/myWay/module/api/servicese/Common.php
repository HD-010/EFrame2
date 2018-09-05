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

/**
 * 
 * @author Administrator
 *
 */
class Common
{
    protected $param;

    /**
     * 解析modelData模块携带的参数
     * @param unknown $param
     * @return unknown　array
     * 参数说明：
     * m:module 的首字母，把每个用户的网站看作系统中的一个module
     * c:channel　的首字母,把一个类型的事物看作一个channel,与数据表channeltype一一对应
     * v:view 页面名称,每一个 type view 表示一个页面。与$modelConfig['pageModel']中的项对应
     * tid:typeid 栏目id,表示当前视图展示的是该typeid下的内容
     * topid:topid 栏目id,表示当前视图展示的是该topid下级的所有子栏目的内容。topid或topid均用于栏目列表查询，
     *   这两个参数在一个模块中同时只能有一个出现。如果是tid，则查询返回 的数据$data['arctypeInfor']有一条记录；
     *   如果是topid，则查询返回的数据$data['arctypeInfor']有多条记录，索引为0的表示为topid对应的记录
     * aid: 表示当前视图展示的是该aid的内容,与数据表archives中的id一一对应
     * flag: 表示文章标签
     * cp: 当前页码
     * ps: 分页步长
     * sw:搜索关键字
     * 
     * 这些参数可以在$modelData的页面下模块名称后进行配置。需要注意的是，这些参数的值可能来源及优先级如下：
     * url传递 > 模块名称后配置的参数  > 系统给定的默认值
     * 
     * 返回的$param包括以下内容：
     * lUrl：表示从模块内容访问栏目列表页的url地址的参数
     * 结构：'index?m=idk2485s&c=image&v=页面名称&tid=typeid'
     * 分析：从模块内容访问栏目列表页，需要知道该页面所属的频道模型名称(c)，以确定内容属性，进而确定内容的数据格式。
     * 当数据格式确定下来后，便可以使用和数据格式匹配的视图小部件来展示数据
     * aUrl：表示从模块内容访问文章内容页的url地址的参数
     * 结构：'index?m=idk2584s&c=artical&v=@v&aid=@aid'
     * 分析：从模块内容访问文章内容页，需要知道该页面所属的频道模型名称（c），以确定内容属性，进而确定内容的数据格式。
     * tUrl：表示从导航项目访问栏目列表的url地址的参数，用于导航列表的url指向
     * 结构：'index?m=idk2584s&c=soft&v=@v';
     * 分析：从导航项目访问栏目列表，需要知道该项对应的栏目页所属的频道模型名称（c）,以确定内容属性，进而确定内容的数据格式。
     * hUrl：首页访问地址的参数，这个参数是固定不变的
     * 结构：'index?m=idk2584s&v=index'
     * 
     * 注：在该方法中只提供url的相关参数，返回的url不是一个正式的，需要在小部件中处理后可用
     */
    public function parseModelParam($param){
        //module
        $m = T::getStrVal('m', $param,'idk2584s');
        $this->param['m'] = App::request()->get('m',$m);
        //栏目id
        $tid = T::getStrVal('tid',$param);
        $this->param['tid'] = App::request()->get('tid',$tid);
        //页面名称artical view
        $v = App::request()->get('v','index');
        $this->param['v'] = T::getStrVal('v',$param,$v);
        //页面类型
        $c = T::getStrVal('c',$param);
        $this->param['c'] = App::request()->get('c',$c);
        
        //该模块对应栏目的访问地址的参数
        $this->param['lUrl'] = 'index?@m&@c&@v&@tid';
        //表示从模块内容访问文章内容页的url地址的参数
        $this->param['aUrl'] = 'index?@m&@c&@v&@aid';
        //表示从导航项目访问栏目列表的url地址的参数，用于导航列表的url指向
        $this->param['tUrl'] = 'index?@m&@c&@v&@tid';
        //首页访问地址的参数，这个参数是固定不变的
        $this->param['hUrl'] = 'index?@m&v=index';
            
        return $this->param;
    }

    //解析视图前缀
    public function parseVewFrefix(){
        $page = '';
        if(App::request()->get('sw')) $page .= 'list_';
        if(App::request()->get('tid')) $page .= 'list_';
        if(App::request()->get('aid')) $page .= 'article_';
        if(App::request()->get('c')) $page .= App::request()->get('c').'_';
        
        if(!$page) $page .= 'index_';
        
        return $page;
    }
    /**
     * 解析视图名称
     * 视图命名结构如：
     * 页面类型_频道类型_视图名称_同类型编号.php
     */
    public function parseView(){
        return  $this->parseVewFrefix().App::request()->get('v','index');
    }
}