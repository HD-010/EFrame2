<?php 
use EFrame\Helper\T;
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <title>{eyou:global name='web_title' /}</title>
    <meta name="description" content="{eyou:global name='web_description' /}"/>
    <meta name="keywords" content="{eyou:global name='web_keywords' /}"/>
    <meta name="generator" content="eyoucms" data-variable="{eyou:global name='web_eyoucms' /}"/>
    <link href="{eyou:global name='web_cmspath' /}/favicon.ico" rel="shortcut icon" type="image/x-icon"/>
    <link rel="stylesheet" type="text/css" href="{eyou:global name='web_templets_m' /}/skin/css/subpage.css">
    <script src="{eyou:global name='web_templets_m' /}/skin/js/jquery.js"></script>
    <script src="{eyou:global name='web_templets_m' /}/skin/js/nav.js"></script>
    <style>
        .head {
            background: #18284A
        }
        .foot {
            background: #18284A
        }
        .nav {
            background: #18284A
        }
        .nav_color {
            background: #18284A
        }
    </style>
    <script src="{eyou:global name='web_templets_m' /}/skin/js/search.js"></script>
    <script src="{eyou:global name='web_templets_m' /}/skin/js/respond.js"></script>
    <script src="{eyou:global name='web_templets_m' /}/skin/jquery.validator.js"></script>
    <link rel="stylesheet" type="text/css" href="{eyou:global name='web_templets_m' /}/skin/css/master.css">
    <link rel="stylesheet" type="text/css" href="{eyou:global name='web_templets_m' /}/skin/css/swiper.css">
    <script src="{eyou:global name='web_templets_m' /}/skin/js/swipe.js"></script>
    <script src="{eyou:global name='web_templets_m' /}/skin/js/lihe.js"></script>
</head>
<body>
<style>
section{
	margin-top:1em;
}
</style>





<?php 
echo  $this->contents();
?>

</body>
</html>