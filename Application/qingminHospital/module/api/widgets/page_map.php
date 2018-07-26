
<div class="rm">
	<div class="ew">
		<div class="clasname" id="mapNme"></div>
		<div class="pos">
			当前您所在的位置：
			        <a href='/api/index/index'>首页</a>
			        ><a id="mapTop" href=''></a>
			        ><a id="mapSun" href=''></a>
		</div>
	</div>
<div class="mc">

<script>
var pageMap = JSON.parse(localStorage.pageMap);
document.getElementById('mapNme').innerHTML = pageMap.sun.text || pageMap.top.text;
document.getElementById('mapTop').innerHTML = pageMap.top.text;
document.getElementById('mapTop').href = pageMap.top.href;
document.getElementById('mapSun').innerHTML = pageMap.sun.text || '';
document.getElementById('mapSun').href = pageMap.sun.href;

</script>