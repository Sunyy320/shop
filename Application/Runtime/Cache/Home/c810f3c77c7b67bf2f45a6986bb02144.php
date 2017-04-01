<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
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
    <title>分类</title>
    <script charset="utf-8" src="/shop/Public/js/category.js?v=01291"></script>
</head>
<body>
<header class="header">
    <div class="fix_nav">
        <div class="nav_inner">
            <a class="nav-left back-icon" href="javascript:history.go(-1);">返回</a>
            <div class="tit">分类</div>
            <div class="sousuo" id="sousou"><img src="/shop/Public/images/sou.png"></div>
        </div>
    </div>
</header>
<div style="overflow: hidden;position: fixed;width: 100%;z-index: 10000;top:0px;">
    <div class="order_top_count" style="display:none;">
        <div class="order_top">
            <div class="order_a_l">
                <div id="nav-left_ll"><img src="/shop/Public/images/order_top_l.png"></div>
            </div>
            <div class="order_sou">
                <form action="/m_search/list" method="get" id="searchform" name="searchform">
                    <input name="keyword" id="keyword" placeholder="搜索商品" type="text" value="">
                    <span class="pro_sou" style="cursor: pointer;" onclick="searchproduct();"><img src="/shop/Public/images/Search.png"></span>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="container">
    <div class="row" id="row_5">
        <div class="sort-arat" style="margin-top: 10px;">
            <ul>
                <li>
                    <a href="<?php echo U('Index/categery',array('cty'=>'fz'));?>">
                        <img  style="width:initial;height:100px;" src="/shop/Public/img/9cb5861c-5ff8-42b8-8c9b-0f6b4a53cde9.jpg" >
                        <div style="width:90%;white-space: nowrap;text-overflow: ellipsis;overflow:hidden;text-align:center;margin: auto;">服装饰品</div>
                    </a>

                </li>

                <li>
                    <a href="<?php echo U('Index/categery',array('cty'=>'qt'));?>">
                        <img alt="图片大小为100*100" style="width:initial;height:100px;" src="/shop/Public/img/65bd9fc8-7f5e-4dba-b083-0c05b1bc9b96.jpg" >
                        <div style="width:90%;white-space: nowrap;text-overflow: ellipsis;overflow:hidden;text-align:center;margin: auto;">杂货商店</div>
                    </a>
                </li>

                <li>
                    <a href="<?php echo U('Index/categery',array('cty'=>'dq'));?>">
                        <img alt="图片大小为100*100" style="width:initial;height:100px;" src="/shop/Public/img/5832cb9d816ab.jpg" >
                        <div style="width:90%;white-space: nowrap;text-overflow: ellipsis;overflow:hidden;text-align:center;margin: auto;">电器办公</div>
                    </a>
                </li>

                <li>
                    <a href="<?php echo U('Index/categery',array('cty'=>'sj'));?>">
                        <img alt="图片大小为100*100" style="width:initial;height:100px;" src="/shop/Public/img/5832e293807d5.jpg" >
                        <div style="width:90%;white-space: nowrap;text-overflow: ellipsis;overflow:hidden;text-align:center;margin: auto;">书籍市场</div>
                    </a>
                </li>


        </div>


    </div>
</div>


</body>
</html>