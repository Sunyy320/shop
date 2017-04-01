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
    <link rel="stylesheet" href="/shop/Public/css/order3.css?v=01291">
    
    
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="yes" name="apple-touch-fullscreen">
    <meta content="telephone=no" name="format-detection">
    <meta content="black" name="apple-mobile-web-app-status-bar-style">
    <meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1;user-scalable=no;">
    
    <title>首页</title>
</head>
<body>
<header class="header">
    <div class="fix_nav">
        <div style="max-width:768px;margin:0 auto;height: 44px;position: relative;background:#000000;">
            <form action="/m_search/list" method="get" id="searchform" name="searchform">
                <div class="navbar-search left-search">
                    <input type="text" id="keyword" name="keyword" value="" placeholder="搜索商品" class="form-control">
                </div>
                <div class="nav-right">
                    <input type="button" value="搜索" onclick="searchproduct();" class="img-responsive" style="text-align:center;background:#ccc;border-radius: 5px;border:none;height:34px;vertical-align:middle;clear:both;padding:0px;width:42px;"/>
                </div>
            </form>
        </div>
    </div>
</header>

<div class="container">
    <div class="row">
        <div id="slide">
            <div class="hd">
                <ul><li class="on">1</li><li class="on">2</li><li class="on">3</li></ul>
            </div>
            <div class="bd">
                <div class="tempWrap" style="overflow:hidden; position:relative;">
                    <ul style="width: 3840px; position: relative; overflow: hidden; padding: 0px; margin: 0px; transition-duration: 200ms; transform: translateX(-768px);">
                        <li style="display: table-cell; vertical-align: top; width: 768px;">
                            <a href="http://m.legendshop.cn/m_search/list?categoryId=36" target="_blank">
                                <img src="/shop/Public/img/0da8eb94-0159-4700-a6a5-bc007da5a853.jpg" alt="女包" ppsrc="/shop/Public/img/0da8eb94-0159-4700-a6a5-bc007da5a853.jpg">
                            </a>
                        </li>
                        <li style="display: table-cell; vertical-align: top; width: 768px;">
                            <a href="http://m.legendshop.cn/m_search/list?categoryId=38" target="_blank">
                                <img src="/shop/Public/img/61647775-f5d0-4cfe-b84f-96060eb8e2e3.jpg" alt="女鞋" ppsrc="/shop/Public/img/61647775-f5d0-4cfe-b84f-96060eb8e2e3.jpg">
                            </a>
                        </li>
                        <li style="display: table-cell; vertical-align: top; width: 768px;">
                            <a href="http://m.legendshop.cn/m_search/list?categoryId=38" target="_blank">
                                <img src="/shop/Public/img/efa1dc7b-1375-4876-acae-e344cae7d55c.jpg" alt="服装" ppsrc="/shop/Public/img/efa1dc7b-1375-4876-acae-e344cae7d55c.jpg">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script charset="utf-8" src="/shop/Public/js/TouchSlide.js"></script>

    <script type="text/javascript">

        TouchSlide({
            slideCell:"#slide",
            titCell:".hd ul", //开启自动分页 autoPage:true ，此时设置 titCell 为导航元素包裹层
            mainCell:".bd ul",
            effect:"left",
            autoPlay:true,//自动播放
            autoPage:true, //自动分页
            switchLoad:"_src" //切换加载，真实图片路径为"_src"
        });
    </script>

    <!--热门+分类+发布+交易-->
    <div class="row category">
        <a href="<?php echo U('Index/hotShop');?>" class="col-xs-3">
            <img class="img-responsive" src="/shop/Public/img/icon_rm.png">
            <h4>热门</h4>
        </a>

        <a href="<?php echo U('Index/fenlei');?>" class="col-xs-3">
            <img class="img-responsive" src="/shop/Public/img/icon_tm.png">
            <h4>分类</h4>
        </a>

        <a href="<?php echo U('Deals/postgoods');?>" class="col-xs-3">
            <img class="img-responsive" src="/shop/Public/img/theme.png">
            <h4>发布</h4>
        </a>

        <a href="<?php echo U('Deals/dealTable');?>" class="col-xs-3">
            <img class="img-responsive" src="/shop/Public/img/icon_pp.png">
            <h4>交易</h4>
        </a>

    </div>
    <!--热门+分类+发布+交易-->



    <div class="row">

        <!--服装show-->
        <div class="tb_box">
            <h2 class="tab_tit">
                <a class="more" href="<?php echo U('Index/categery',array('cty'=>'fz'));?>">更多</a>
                服装饰品</h2>

            <div class="tb_type tb_type_even clearfix">
                <a class="tb_floor" href="<?php echo U('Index/goodsInfo');?>?id=<?php echo ($dress[0]['gd_id']); ?>">
                  <img src="<?php echo ($dress[0]['gd_img']); ?>" style="width:100%;">
                </a>

                <a class="th_link" href="<?php echo U('Index/goodsInfo');?>?id=<?php echo ($dress[1]['gd_id']); ?>">
                    <img class="tb_pic" src="<?php echo ($dress[1]['gd_img']); ?>" style="width:100%;">
                </a>

                <a class="th_link tb_last" href="<?php echo U('Index/goodsInfo');?>?id=<?php echo ($dress[2]['gd_id']); ?>">
                    <img class="tb_pic" src="<?php echo ($dress[2]['gd_img']); ?>" style="width:100%;">
                </a>

            </div>
        </div>
        <!--服装show-->


        <!--电器办公-->
        <div class="tb_box">
            <h2 class="tab_tit">
                <a class="more" href="<?php echo U('Index/categery',array('cty'=>'dq'));?>">更多</a>
                电器办公</h2>

            <div class="tb_type tb_type_even clearfix"><a class="tb_floor" href="<?php echo U('Index/goodsInfo');?>?id=<?php echo ($dq[0]['gd_id']); ?>">
                <img src="<?php echo ($dq[0]['gd_img']); ?>" style="width:100%;">
            </a>
                <a class="th_link" href="<?php echo U('Index/goodsInfo');?>?id=<?php echo ($dq[1]['gd_id']); ?>">
                    <img class="tb_pic" src="<?php echo ($dq[1]['gd_img']); ?>" style="width:100%;">
                </a>
                <a class="th_link tb_last" href="<?php echo U('Index/goodsInfo');?>?id=<?php echo ($dq[2]['gd_id']); ?>">
                    <img class="tb_pic" src="<?php echo ($dq[2]['gd_img']); ?>" style="width:100%;">
                </a>
            </div>

        </div>
        <!--电器办公-->

        <!--书籍-->
        <div class="tb_box">
            <h2 class="tab_tit">
                <a class="more" href="<?php echo U('Index/categery',array('cty'=>'sj'));?>">更多</a>
                书籍市场</h2>

            <div class="tb_type clearfix"><a class="tb_floor" href="<?php echo U('Index/goodsInfo');?>?id=<?php echo ($books[0]['gd_id']); ?>">
                <img src="<?php echo ($books[0]['gd_img']); ?>" style="width:100%;">
            </a>
                <a class="th_link" href="<?php echo U('Index/goodsInfo');?>?id=<?php echo ($books[1]['gd_id']); ?>">
                    <img class="tb_pic" src="<?php echo ($books[1]['gd_img']); ?>" style="width:100%;">
                </a>
                <a class="th_link tb_last" href="<?php echo U('Index/goodsInfo');?>?id=<?php echo ($books[2]['gd_id']); ?>">
                    <img class="tb_pic" src="<?php echo ($books[2]['gd_img']); ?>" style="width:100%;">
                </a>
            </div>
        </div>
        <!--书籍-->

        <!--其他-->
        <div class="tb_box">
            <h2 class="tab_tit">
                <a class="more" href="<?php echo U('Index/categery',array('cty'=>'qt'));?>">更多</a>
                解忧杂货</h2>

            <div class="tb_type clearfix"><a class="tb_floor" href="<?php echo U('Index/goodsInfo');?>?id=<?php echo ($others[0]['gd_id']); ?>">
                <img src="<?php echo ($others[0]['gd_img']); ?>" style="width:100%;">
            </a>
                <a class="th_link" href="<?php echo U('Index/goodsInfo');?>?id=<?php echo ($others[1]['gd_id']); ?>">
                    <img class="tb_pic" src="<?php echo ($others[1]['gd_img']); ?>" style="width:100%;">
                </a>
                <a class="th_link tb_last" href="<?php echo U('Index/goodsInfo');?>?id=<?php echo ($others[2]['gd_id']); ?>">
                    <img class="tb_pic" src="<?php echo ($others[2]['gd_img']); ?>" style="width:100%;">
                </a>
            </div>
        </div>
        <!--其他-->


    </div>

</div>

<footer class="footer">
    <div class="foot-con">
        <div class="foot-con_2">
            <a href="<?php echo U('index/index');?>" class="active">
                <i class="navIcon home"></i>
                <span class="text">首页</span>
            </a>


            <a href="<?php echo U('person/index');?>" >
                <i class="navIcon member"></i>
                <span class="text">我的</span>
            </a>
        </div>
    </div>
</footer>

<script type="text/javascript">
    $(document).ready(function(){
        $("#slide img").each(function(){
            var img_src=$(this).attr("_src");
            $(this).attr("src",img_src);
        });
    });

    function searchproduct(){
        var keyword = document.getElementById("keyword").value;
        if(keyword == undefined || keyword==null ||keyword ==""){
            alert("请输入搜索关键字！");
            return false;
        }
        document.getElementById("searchform").submit();
    }
</script>
</body></html>