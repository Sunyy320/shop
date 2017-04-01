<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <script charset="utf-8" src="/shop/Public/js/jquery.min.js?v=01291"></script>
    <script charset="utf-8" src="/shop/Public/js/global.js?v=01291"></script>
    <script charset="utf-8" src="/shop/Public/js/bootstrap.min.js?v=01291"></script>
    <script charset="utf-8" src="/shop/Public/js/template.js?v=01291"></script>

    <link rel="stylesheet" href="/shop/Public/css/bootstrap.css?v=01291">
    <link rel="stylesheet" href="/shop/Public/css/style.css?v=1?v=01291">
    <link rel="stylesheet" href="/shop/Public/css/member.css?v=01291">
    <link rel="stylesheet" href="/shop/Public/css/order3.css?v=01291"><meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="yes" name="apple-touch-fullscreen">
    <meta content="telephone=no" name="format-detection">
    <meta content="black" name="apple-mobile-web-app-status-bar-style">
    <meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1;user-scalable=no;">
    <script charset="utf-8" src="/shop/Public/js/jquery.form.js?v=01291"></script>
    <script charset="utf-8" src="/shop/Public/js/prodSort.js?v=01291"></script>
    <title>商品列表</title>
</head>
<body>
<div class="fanhui_cou">
    <div class="fanhui_1"></div>
    <div class="fanhui_ding">顶部</div>
</div>
<header class="header">
    <div class="fix_nav">
        <div class="nav_inner">
            <a class="nav-left back-icon" href="javascript:history.back();">返回</a>
            <div class="tit">商品列表</div>
        </div>
    </div>
</header>

<div class="container" id="container2">
    <div class="row">
        <ul class="mod-filter clearfix">
            <div class="white-bg_2 bb1">

                <li id="default" class="active"><a
                        title="默认排序"  href="javascript:void(0);">默认</a></li>
                <li id="buys"  ><a title="点击按销量从高到低排序"
                                   href="javascript:void(0);" >销量
                    <i class='icon_sort'></i>
                </a></li>
                <li id="comments"  ><a title="点击按评论数从高到低排序"
                                       href="javascript:void(0);" >评论数
                    <i class='icon_sort'></i>
                </a></li>
                <li id="cash"  ><a title="点击按价格从高到低排序"
                                   href="javascript:void(0);" >价格
                    <i class='icon_sort'></i>
                </a></li>
            </div>
        </ul>

        <div class="item-list" id="container" rel="2" status="0"><input type="hidden" id="ListTotal" value="1">
            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Index/goodsInfo');?>?id=<?php echo ($val["gd_id"]); ?>">
                    <div class="hproduct clearfix" style="background:#fff;border-top:0px;">
                        <div class="p-pic"><img style="max-height:100px;margin:auto;" class="img-responsive" src="<?php echo ($val["gd_img"]); ?>"></div>
                        <div class="p-info">
                            <p class="p-title"><?php echo ($val["gd_name"]); ?></p>

                            <div >
                                <div style="float: left" class="p-origin">
                                    <em class="price">￥<?php echo ($val["gd_price"]); ?></em>
                                </div>
                   </a>
                                <div style="float: right" class="p-origin">
                                    <a href="#"><img src="/shop/Public/images/sp.jpg" style="height: 30px;"> </a>
                                </div>
                            </div>
                            <!--<p class="p-origin"><em class="price">¥10.00</em></p>-->

                        </div>
                    </div><?php endforeach; endif; else: echo "" ;endif; ?>


        </div>



        <div id="ajax_loading" style="display:none;width:300px;margin: 10px  auto 15px;text-align:center;">
            <img src="/shop/Public/images/loading.gif">
        </div>

    </div>
</div>


<div class="clear"></div>

</body>
</html>