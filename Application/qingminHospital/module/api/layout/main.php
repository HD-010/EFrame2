<?php 
use EFrame\Helper\T;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<!-- Mirrored from www.xcsyy.com/index.asp by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 20 Jul 2018 03:05:00 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=" />
<title>{dede:global.cfg_webname/}</title>
<meta http-equiv="keywords" content="{dede:global.cfg_keywords/}" />
<meta http-equiv="description" content="{dede:global.cfg_description/}"/>
<link rel="stylesheet" type="text/css" href="/css/common.css"/>
<link rel="stylesheet" type="text/css" href="/css/default.css"/>
<script type="text/javascript" language="javascript" src="/js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="/js/common.js"></script>
<script type="text/javascript" src="/js/msclass.js"></script>

<script type="text/javascript" language="javascript" src="/js/jquery.caroufredsel.js"></script>
</head>
<body>
<?php 
    $this->renderWidget('header',$data['arctype']);
    
    echo  $this->contents();
    
    $this->renderWidget('footer');
?>

</body>
</html>