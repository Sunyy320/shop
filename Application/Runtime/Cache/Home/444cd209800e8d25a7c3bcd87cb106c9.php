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
    <title>会员中心</title>
    <script type="text/javascript">
        $(document).ready(function(){
            var attr = parseInt($(".member_m_pic_1").height());
            var attr3 = parseInt($(".member_m_z_1").height());
            var h = attr - attr3;
            var clientWidth=document.body.clientWidth;
            $(".member_mp_t_img img").css("width",clientWidth*0.3);
            $(".member_mp_t_img img").css("height",clientWidth*0.3);

            handleUserPic();
        });

        function handleUserPic(){
            var th = $(".member_m_pic").outerHeight(true);
            if(th<60){
                setTimeout("handleUserPic",500);
            }else{
                $(".member_m_pic .img-circle").css("height",th*0.9);
                $(".member_m_pic .img-circle").css("width",th*0.9);
            }

        }
    </script>
</head>
<body>

<div class="maincontainer">
    <div class="container" style="max-width:768px;margin:0 auto;">
        <div class="row">
            <a href="/p/userInfo">
                <div class="member_top member_top_1">
                    <div class="member_top_bg">
                        <img  src="/shop/Public/images/member_bg.png">
                    </div>
                    <div class="member_m_pic member_m_pic_1">
                        <img class="img-circle" src="<?php echo ($arr["per_img"]); ?>">
                    </div>
                    <div  class="member_m_z member_m_z_1">
                        <div class="member_m_x">姓名：<?php echo ($arr["per_name"]); ?></div>
                    </div>
                    <div class="member_m_r">
                    </div>

                </div></a>


            <div class="member_mp_img" data-toggle="modal" data-target="#myModalmin" data-title="我的名片" data-tpl="mp"><img src="/shop/Public/images/member_mp_img.png"></div>


            <div class="list-group mb10">
                <a href="#" class="list-group-item tip">
                    <div class="list_group_img">
                        <img src="/shop/Public/images/member_img16.png"></div>
                    我的交易
                    <span class="gary pull-right">查看全部</span>
                </a>


                <div class="list-group-item p0 clearfix">
                    <div class="col-xs-3 p0">
                        <a class="order_tab_link" href="<?php echo U('Deals/dealTable');?>">
                            <em class="order_img">
                                <img src="/shop/Public/images/order_bg_3.png"></em>我的交易

                        </a>
                    </div>

                    <div class="col-xs-3 p0">
                        <a class="order_tab_link" href="<?php echo U('Deals/dealTable');?>">
                            <em class="order_img">
                                <img src="/shop/Public/images/order_bg.png"></em>我的交易
                        </a>
                    </div>

                    <div class="col-xs-3 p0">
                        <a class="order_tab_link" href="<?php echo U('Deals/dealTable');?>">
                            <em class="order_img">
                                <img src="/shop/Public/images/order_bg_2.png"></em>我的交易
                        </a>
                    </div>


                    <div class="col-xs-3 p0">
                        <a class="order_tab_link" href="<?php echo U('Deals/postgoods');?>">
                            <em class="order_img">
                                <img src="/shop/Public/images/order_bg_1.png"></em>发布商品
                        </a>
                    </div>

                </div>


            </div>


            <div class="list-group mb10 member_list_group clearfix">

                <a href="<?php echo U('Person/perInfo');?>" class="list-group-item col-xs-4">
                    <div class="m_img"><img src="/shop/Public/images/order_bg_8.png"></div>
                    <p class="m_name">个人信息</p>
                    <span class="red">&nbsp;&nbsp;</span>
                </a>


                <a href="#" class="list-group-item col-xs-4">
                    <div class="m_img"><img src="/shop/Public/images/order_bg_5.png"></div>
                    <p class="m_name">我的收藏</p>
                    <span class="red">0</span>
                </a>



                <a href="<?php echo U('Messages/messInfo');?>" class="list-group-item col-xs-4">
                    <div class="m_img"><img src="/shop/Public/images/order_bg_4.png"></div>
                    <p class="m_name">留言箱</p>
                    <span class="red">&nbsp;&nbsp;</span>
                </a>

                <a href="#" class="list-group-item col-xs-4">
                    <div class="m_img"><img src="/shop/Public/images/order_bg_7.png"></div>
                    <p class="m_name">系统消息</p>
                    <span class="red">&nbsp;&nbsp;</span>
                </a>

            </div>

            <div class="list-group mb10">
                <a href="" class="list-group-item tip">
                    <div class="list_group_img"><img src="/shop/Public/images/order_bg_10.png"></div>
                    常见问题
                </a>
                <a href="" class="list-group-item tip">
                    <div class="list_group_img"><img src="/shop/Public/images/order_bg_9.png"></div>
                    意见反馈
                </a>
            </div>

        </div>
    </div>


    <div style="display: none;" class="modal fade" id="myModalmin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="form-horizontal" role="form" data-method="formAjax">
                    <div class="modal-header member_tc_top">
                        <button type="button" class="close member_tc_xx" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myModalLabel">&nbsp;&nbsp;</h4>
                    </div>
                    <div style="overflow:hidden;width: 100%;padding-top: 20px;">
                        <div style="">
                            <div class="member_mp_t_img" >
                                <img src="/shop/Public/images/noavatar.png">
                            </div>
                            <div class="member_mp_t_m">萧雅哲</div>
                            <div class="member_mp_t_m_m">
                                <img src="/shop/Public/img/a909bfc1-cada-4008-81c0-556ff86aace1.jpg">
                            </div>
                            <div class="member_mp_t_tit">用微信扫一扫二维码，成为我的粉丝</div>
                        </div>
                    </div>
                    <div style="height:60px;"></div>
                </form>
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="foot-con">
            <div class="foot-con_2">
                <a href="<?php echo U('index/main');?>">
                    <i class="navIcon home"></i>
                    <span class="text">首页</span>
                </a>

                <a href="<?php echo U('person/index');?>" class="active">
                    <i class="navIcon member"></i>
                    <span class="text">我的</span>
                </a>
            </div>
        </div>
    </footer>
</div>
</body>
</html>