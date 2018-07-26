<div class="contents">

<p>
	<iframe id="baiduSpFrame" height="420" src="file:///D:/temp/11252/www.xcsyy.com/map.html" frameborder="0" width="700">
	</iframe>
	
	<script type="text/javascript" src="http://api.map.baidu.com/api?v=1.3"></script>
    <div style="width:690px;height:415px;border:1px solid gray" id="container"></div>
    <script type="text/javascript">
    
        var map = new BMap.Map("container");
        
        map.centerAndZoom(new BMap.Point(118.757455,30.957276), 17);  
        map.addControl(new BMap.NavigationControl());  
        var point = new BMap.Point(118.757455,30.957276);
        map.centerAndZoom(point, 17);
        
        var marker = new BMap.Marker(point);  // 创建标注
        map.addOverlay(marker);              // 将标注添加到地图中
        marker.setAnimation(BMAP_ANIMATION_BOUNCE); //跳动的动画
    
    </script>
</p>
<p>
	详细地址：宣城市环城北路15号
</p>
<p>
	乘车路线：市内1路、5路、7路公交车可直达医院
</p>
联系电话：0563-3033505&nbsp;&nbsp; 2020093
</div>


