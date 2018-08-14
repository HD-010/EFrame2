<?php 
use EFrame\Helper\T;
?>
<!DOCTYPE HTML>
<html>
<head>
    <script type="text/javascript">
        function allowDrop(ev)
        {
            ev.preventDefault();
        }

        function drag(ev)
        {
            ev.dataTransfer.setData("Text",ev.target.id);
        }

        function drop(ev)
        {
            ev.preventDefault();
            var data=ev.dataTransfer.getData("Text");
            ev.target.appendChild(document.getElementById(data));
        }
    </script>
</head>
<body>

<div id="div1" style="border:1px solid darkred;height:50px;" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
<div id="div2" style="border:1px solid darkred;height:50px;" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
<img id="drag1" src="http://www.w3school.com.cn/i/eg_dragdrop_w3school.gif" draggable="true" ondragstart="drag(event)" width="336" height="69" />
<img id="drag2" src="http://www.w3school.com.cn/i/eg_dragdrop_w3school.gif" draggable="true" ondragstart="drag(event)" width="336" height="69" />


<?php 


echo  $this->contents();


?>

</body>
</html>