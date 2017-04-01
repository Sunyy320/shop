<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html>
<head>
    <script charset="utf-8" src="/shop/Public/js/jquery.min.js?v=01291"></script>
    <script charset="utf-8" src="/shop/Public/js/global.js?v=01291"></script>
    <script charset="utf-8" src="/shop/Public/js/bootstrap.min.js?v=01291"></script>
    <script charset="utf-8" src="/shop/Public/js/template.js?v=01291"></script>
    <script charset="utf-8" src="/shop/Public/js/toastr.min.js"></script>

    <link rel="stylesheet" href="/shop/Public/css/toastr.css">
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
    <title><?php echo ($list["gd_name"]); ?></title>
    <link rel="stylesheet" href="/shop/Public/css/productDetail.css?v=01291">
    <script charset="utf-8" src="/shop/Public/js/TouchSlide.js?v=01291"></script>
    <script charset="utf-8" src="/shop/Public/js/prodDetail.js?v=01291"></script>
    <style type="text/css">
        .details_con li .tb-out-of-stock{
            border: 1px dashed #bbb;
            color:#bbb;
            cursor: not-allowed;
        }
        .no-selected{
            background: #ffe8e8 none repeat scroll 0 0;
            border: 2px solid #be0106;
            margin: -1px;
        }
    </style>
</head>

<body>

<div class="fanhui_cou">
    <div class="fanhui_1"></div>
    <div class="fanhui_ding">顶部</div>
</div>

<header class="header">
    <div class="fix_nav">
        <div style="max-width:768px;margin:0 auto;background:#000;position: relative;">
            <a class="nav-left back-icon" href="javascript:history.back();">返回</a>
            <div class="tit">商品详细</div>
        </div>
    </div>
</header>

<div class="container">
    <div class="row white-bg">
        <div id="slide">
            <div class="hd">
                <ul>
                    <li>1</li></ul>
            </div>
            <div class="bd">
                <div class="tempWrap" style="overflow:hidden; position:relative;">
                    <ul style="width: 3072px; position: relative; overflow: hidden; padding: 0px; margin: 0px; transition-duration: 200ms; transform: translateX(-768px);">
                        <li style="display: table-cell; vertical-align: middle; max-width: 768px;">
                            <a href="#"><img style="max-width:100vw;max-height:80vw;margin:auto;" src="<?php echo ($list["gd_img"]); ?>"></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="row gary-bg">

        <!--商品相关信息-->
        <div class="white-bg p10 details_con">
            <h1 class="item-name" id="gd_name"><?php echo ($list["gd_name"]); ?></h1>
            <ul>
                <li>
                    <label>商城价格：</label>
                    <span class="price">¥<span class="price" id="prodCash"><?php echo ($list["gd_price"]); ?></span></span>
                </li>

                <li>
                    <label>商品简介：</label>
                    <span> <?php echo ($list["gd_des"]); ?></span>
                </li>

                <li>
                    <label>商品分类：</label>
                    <span> <?php echo ($list["gd_categery"]); ?></span>
                </li>

                <li>
                    <label>发布时间：</label>
                    <span> <?php echo (date("Y-m-d H:i",$list["gd_time"])); ?></span>
                </li>

                <li>
                    <label>点赞数：</label>
                    <span> <?php echo ($list["gd_support"]); ?></span>
                    <label style="margin-left: 20px;">浏览量：</label>
                    <span> <?php echo ($list["gd_browse"]); ?></span>
                </li>

                <li>
                    <label>商品主人：</label>
                    <span> <?php echo ($list["per_name"]); ?></span>
                    <label style="margin-left: 20px;">学号：</label>
                    <span> <?php echo ($list["per_studentid"]); ?></span>
                </li>


            </ul>
        </div>
        <!--商品相关信息-->


        <div id="goodsContent" class="goods-content white-bg">

            <div class="hd hd_fav">
                <ul>
                    <li class="on">留言：</li>
                </ul>
            </div>

            <!--留言板发布-->
            <div class="tempWrap" style="overflow:hidden; position:relative;">
                <div style="width: 2304px; position: relative; overflow: hidden; padding: 0px; margin: 0px; transition-duration: 200ms; transform: translateX(0px);" class="bd">

                    <form role="form" class="white-bg p10 details_con row " id="theForm">
                        <input type="hidden" id="mg_to" value="<?php echo ($list["per_studentid"]); ?>">
                        <input type="hidden" id="mg_gdid" value="<?php echo ($list["gd_id"]); ?>">

                        <div class="form-group">

                            <label for="mg_cnt">给主人留言</label>
                            <textarea class="form-control" rows="3" id="mg_cnt" name="mg_cnt" placeholder="给主人留言，询问详细信息" required="true"></textarea>
                        </div>

                        <button type="button" class="btn btn-default" style="float: right"
                        onclick="onMessage()">提交</button>
                    </form>

                </div>
            </div>


            <!--具体内容-->
            <div id="cnt">

                <?php if(is_array($back)): $i = 0; $__LIST__ = $back;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><div class="panel panel-default panel-success">
                        <div class="panel-heading">
                            留言人：<?php echo ($val["per_name"]); ?>&nbsp;&nbsp;&nbsp;&nbsp; <?php echo (date("Y-m-d H:i",$val["mg_time"])); ?>
                        </div>
                        <div class="panel-body">
                            内容：<?php echo ($val["mg_cont"]); ?>

                            <?php if(!empty($val['back'])): ?><div style="margin-top: 10px;">
                                    店家回复：
                                    <?php echo ($val['back']['mg_cont']); ?>
                                </div><?php endif; ?>

                        </div>
                    </div><?php endforeach; endif; else: echo "" ;endif; ?>


            </div>



        </div>
    </div>
</div>



<div class="clear"></div>


<script type="text/javascript">
    $(document).ready(function () {
        toastr.options.positionClass = 'toast-bottom-center';
    });
    function onMessage(){
        var flag =true;
        var postData={};

        var $obj=$("#mg_cnt");
        if(isBlank($obj.val()) && $obj.attr("required") == "required"){
            toastr.info('请输入留言信息!');
            flag=false;
            return false;
        }

        if(flag){
            $.ajax({
                type:"POST",
                data:{
                    mg_cnt:$obj.val(),
                    mg_to:$("#mg_to").val(),
                    mg_gdid:$("#mg_gdid").val(),
                },
                url:"<?php echo U('Messages/saveMessages');?>",
                success:function(data){
                    if(data['status']){
                        $obj.val("");
						
                        toastr.success('留言成功!');
                    }else{
                        toastr.error('留言失败!');
                    }

                }
            });

        }
    }


    //方法，判断是否为空
    function isBlank(_value){
        if(_value==null || _value=="" || _value==undefined){
            return true;
        }
        return false;
    }




    //插件：图片轮播
    TouchSlide({
        slideCell:"#slide",
        titCell:".hd ul", //开启自动分页 autoPage:true ，此时设置 titCell 为导航元素包裹层
        mainCell:".bd ul",
        effect:"left",
        autoPlay:false,//自动播放
        autoPage:true, //自动分页
        switchLoad:"_src" //切换加载，真实图片路径为"_src"
    });

    var scrollTop = 0;
    TouchSlide({
        slideCell:"#goodsContent",
        startFun:function(i,c){
            var prodId = $("#prodId").val();
            if(i==1){//规格参数
                var th = jQuery("#goodsContent .bd ul").eq(i);
                if(!th.hasClass('hadGoodsContent')){
                    queryParameter(th,prodId);
                }

                if($(window).scrollTop() > scrollTop){
                    $(window).scrollTop(scrollTop);
                }

            }else if(i==2){//评价
                var th = jQuery("#goodsContent .bd ul").eq(i);

                if(!th.hasClass('hadConments')){
                    queryProdComment(th,prodId);
                }

                if($(window).scrollTop() > scrollTop){
                    $(window).scrollTop(scrollTop);
                }
            }else{
                if(scrollTop == 0){
                    $(window).scrollTop(scrollTop);
                    var hd_fav = $('.hd_fav');
                    var position = hd_fav.position();

                    scrollTop = position.top;
                }
            }
        },
    });

</script>
</body>
</html>