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
    <link rel="stylesheet" href="/shop/Public/css/order3.css?v=01291"><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="yes" name="apple-touch-fullscreen">
    <meta content="telephone=no" name="format-detection">
    <meta content="black" name="apple-mobile-web-app-status-bar-style">
    <meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1;user-scalable=no;">
    <script charset="utf-8" src="/shop/Public/js/shopCart.js?v=01291"></script>
    <title>留言箱</title>
</head>
<body>
<div class="fanhui_cou">
    <div class="fanhui_1"></div>
    <div class="fanhui_ding">顶部</div>
</div>
<header class="header header_1">
    <div class="fix_nav">
        <div class="nav_inner">
            <a class="nav-left back-icon" href="javascript:history.back();">返回</a>
            <div class="tit">留言箱</div>
        </div>
    </div>
</header>


<div class="container ">
    <div class="row rowcar">
        <ul class="list-group">

            <?php if(is_array($res)): $i = 0; $__LIST__ = $res;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li class="list-group-item hproduct clearfix">
                    <div class="p-pic">
                        <img class="img-responsive" src="<?php echo ($val["gd_img"]); ?>"/></div>

                    <div class="p-info">
                        <p class="p-title">留言人:<?php echo ($val["fromname"]); ?></p>
                        <p class="p-title">内容:<?php echo ($val["mg_cont"]); ?></p>
                        <p class="p-title">时间：<?php echo (date("Y-m-d H:i",$val["mg_time"])); ?></p>
                        <?php if(empty($val['back'])): ?><p class="p-origin">

                                <button type="button" class="btn default" data-toggle="collapse"
                                        data-target="#demo<?php echo ($i); ?>">回复留言
                                </button>

                            <div id="demo<?php echo ($i); ?>" class="collapse" >
                                <form class="form-horizontal" role="form" method="post"
                                action="<?php echo U('Messages/replyMess');?>">

                                    <input type="hidden" name="mg_id" value="<?php echo ($val["mg_id"]); ?>">
                                    <input type="hidden" name="mg_from" value="<?php echo ($val["mg_to"]); ?>">
                                    <input type="hidden" name="mg_to" value="<?php echo ($val["mg_from"]); ?>">
                                    <input type="hidden" name="mg_gdid" value="<?php echo ($val["mg_gdid"]); ?>">

                                    <div class="form-group">
                                        <div class="col-sm-10">
                                            <textarea class="form-control" rows="2" required="true" message="回复" placeholder="快点回答他的问题吧" name="mg_cont" id="mg_cont"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-10">
                                            <button type="submit" class="btn  btn-info" >发送</button>
                                        </div>
                                    </div>
                                </form>


                            </div>


                            </p>

                            <?php else: ?>
                            <div style="margin-top: 10px;">
                                店家回复：
                                <?php echo ($val['back']); ?>
                            </div><?php endif; ?>

                    </div>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>


        </ul>
    </div>
</div>

<div class="clear"></div>
<script type="text/javascript">
    function sendMess(){
        var flag =true;
        var postData={};

        var $obj=$("#mg_cnt");
        if(isBlank($obj.val()) && $obj.attr("required") == "required"){
            toastr.info('请输入回复信息!');
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
                url:"<?php echo U('Messages/replyMess');?>",
                success:function(data){
                    if(data['status']){
                        $obj.val("");
                        toastr.success('回复成功!');
                    }else{
                        toastr.error('回复失败!');
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

</script>
</body></html>