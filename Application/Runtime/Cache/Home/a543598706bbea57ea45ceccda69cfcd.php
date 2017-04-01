<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <script charset="utf-8" src="/shop/Public/js/jquery.min.js?v=01291"></script>
    <script charset="utf-8" src="/shop/Public/js/global.js?v=01291"></script>
    <script charset="utf-8" src="/shop/Public/js/bootstrap.min.js?v=01291"></script>
    <script charset="utf-8" src="/shop/Public/js/bootstrap-datetimepicker.js"></script>
    <script charset="utf-8" src="/shop/Public/js/bootstrap-datetimepicker.zh-CN.js"></script>
    <script charset="utf-8" src="/shop/Public/js/template.js?v=01291"></script>


    <link rel="stylesheet" href="/shop/Public/css/bootstrap.css?v=01291">
    <link rel="stylesheet" href="/shop/Public/css/style.css?v=1?v=01291">
    <link rel="stylesheet" href="/shop/Public/css/member.css?v=01291">
    <link rel="stylesheet" href="/shop/Public/css/order3.css?v=01291">
    <link rel="stylesheet" href="/shop/Public/css/bootstrap-datetimepicker.css">




    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="yes" name="apple-touch-fullscreen">
    <meta content="telephone=no" name="format-detection">
    <meta content="black" name="apple-mobile-web-app-status-bar-style">
    <meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1;user-scalable=no;">
    <title>个人信息</title>
    <script charset="utf-8" src="/shop/Public/js/randomimage.js?v=01291"></script>



</head>
<body class="" style="background-color:#fff">
<header class="header">
    <div class="fix_nav">
        <div style="max-width:768px;margin:0 auto;background:#000000;position: relative;">
            <a class="nav-left back-icon" href="javascript:history.back();">返回</a>
            <div class="tit" style="font-size:18px;">个人信息</div>
        </div>
    </div>
</header>


<div class="maincontainer">
    <div class="container itemdetail mini-innner">
        <div class="row">
            <div class="col-md-12 tal mt20">
                <form class="form-horizontal" role="form" id="theForm"  method="post" enctype="multipart/form-data" action="<?php echo U('Deals/saveGoods');?>">

                    <div class="form-group">
                        <label for="gd_name" class="col-sm-2 control-label">学号</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="gd_name" name="gd_name" placeholder="<?php echo ($arr["per_studentid"]); ?>" disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <label  class="col-sm-2 control-label">名字</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control"  name="gd_price" placeholder="<?php echo ($arr["per_name"]); ?>"  disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">专业</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control"  name="gd_price" placeholder="<?php echo ($arr["per_marjor"]); ?>"  disabled>
                        </div>
                    </div>

					 <div class="form-group">
                        <label class="col-sm-2 control-label">班级</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control"  name="gd_price" placeholder="<?php echo ($arr["per_class"]); ?>"  disabled>
                        </div>
                    </div>
					
                </form>


            </div>
        </div>
    </div>
</div>


</body>
</html>