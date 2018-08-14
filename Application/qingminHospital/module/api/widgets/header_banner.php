<?php
    use EFrame\Helper\T;
    
    /**
     * banner使用说明：
     * 调用该 小部件需要传入$data参数的格式如测试数据：
     */
    
    //测试数据
    $testdata = [
        [
            'linkarr' => 'href',
            'picarr' => '/uploads/image/20180129/20180129103947344734.jpg',
            'textarr' => '文字描述……。',
        ],
        [
            'linkarr' => 'href',
            'picarr' => '/uploads/image/20180225/20180225144242354235.jpg',
            'textarr' => '文字描述……。',
        ],
        [
            'linkarr' => 'href',
            'picarr' => '/uploads/image/20180327/20180327155023352335.jpg',
            'textarr' => '文字描述……。',
        ],
        [
            'linkarr' => 'href',
            'picarr' => '/uploads/image/20180319/20180319085833373337.jpg',
            'textarr' => '文字描述……。',
        ],
    ] ;
    
    $banner = $data ? $data : [];
    if($data === 'testdata') $banner = $testdata;
    if(empty($banner)) return;
    $rel = App::params('@relImg');
?>

<div class="wp flv1">
    <script language="javascript" type="text/javascript">
    linkarr = new Array();
    picarr = new Array();
    textarr = new Array();
    var swf_width=1000;
    var swf_height=257;
    var files = "";
    var links = "";
    var texts = "";

    //这里设置调用标记
    <?php 
    for($i = 0; $i < count($banner); $i ++):
        $j = $i + 1;
    ?>
        linkarr[<?=$j ?>] = "<?=T::arrayValue('0', $banner[$i]); ?>";
        picarr[<?=$j ?>]  = "http://<?=$rel.T::arrayValue('1', $banner[$i]); ?>";
        textarr[<?=$j ?>]="<?=T::arrayValue('textarr', $banner[$i],''); ?>";
    <?php endfor; ?>
    
    
    for(i=1;i<picarr.length;i++){
        if(files=="") files = picarr[i];
        else files += "|"+picarr[i];
    }
    for(i=1;i<linkarr.length;i++){
        if(links=="") links = linkarr[i];
        else links += "|"+linkarr[i];
    }
    for(i=1;i<textarr.length;i++){
        if(texts=="") texts = textarr[i];
        else texts += "|"+textarr[i];
    }
    document.write('<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="<?=App::params('@webServer')?>/plug/swflash.cab" width="'+ swf_width +'" height="'+ swf_height +'">');
    document.write('<param name="movie" value="<?=App::params('@webServer')?>/plug/bcastr3.swf"><param name="quality" value="high">');
    document.write('<param name="menu" value="false"><param name=wmode value="opaque">');
    document.write('<param name="FlashVars" value="bcastr_file='+files+'&bcastr_link='+links+'&bcastr_config=0xffffff|2|0x8CA2AD|60|0xffffff|0xff9900|0x000033|5|3|1|_blank">');
    document.write('<embed src="<?=App::params('@webServer')?>/plug/bcastr3.swf" wmode="opaque" FlashVars="bcastr_file='+files+'&bcastr_link='+links+'&bcastr_title='+texts+'& menu="false" quality="high" width="'+ swf_width +'" height="'+ swf_height +'" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />'); document.write('</object>');
    </script>
</div>