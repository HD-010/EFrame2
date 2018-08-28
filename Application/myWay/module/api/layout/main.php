<?php 
use EFrame\Helper\T;
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <title><?=T::arrayValue('siteInfor.siteName', App::$global)?></title>
    <meta name="description" content="description"/>
    <meta name="keywords" content="keywords"/>
    <meta name="generator" content="eyoucms" data-variable="generator"/>
    <link href="/static/images/system/favicon.ico" rel="shortcut icon" type="image/x-icon"/>
    <link rel="stylesheet" type="text/css" href="/static/css/subpage.css" />
    <script src="/static/javascript/jquery.js"></script>
    <script src="/static/javascript/nav.js"></script>
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
    <script src="/static/javascript/search.js"></script>
    <script src="/static/javascript/respond.js"></script>
    <script src="/static/javascript/jquery.validator.js"></script>
    <link rel="stylesheet" type="text/css" href="/static/css/master.css" />
    <link rel="stylesheet" type="text/css" href="/static/css/swiper.css" />
    <script src="/static/javascript/swipe.js"></script>
    <script src="/static/javascript/lihe.js"></script>
</head>
<body>

<?php 
echo  $this->contents();
?>

</body>
</html>