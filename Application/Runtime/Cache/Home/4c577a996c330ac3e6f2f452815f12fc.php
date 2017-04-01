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
    <title>发布商品</title>
    <script charset="utf-8" src="/shop/Public/js/randomimage.js?v=01291"></script>
    <script type="text/javascript">
        var error = '';
    </script>


</head>
<body class="" style="background-color:#fff">
<header class="header">
    <div class="fix_nav">
        <div style="max-width:768px;margin:0 auto;background:#000000;position: relative;">
            <a class="nav-left back-icon" href="javascript:history.back();">返回</a>
            <div class="tit" style="font-size:18px;">发布商品</div>
        </div>
    </div>
</header>


<div class="maincontainer">
    <div class="container itemdetail mini-innner">
        <div class="row">
            <div class="col-md-12 tal mt20">
                <form class="form-horizontal" role="form" id="theForm"  method="post" enctype="multipart/form-data" action="<?php echo U('Deals/saveGoods');?>">

                    <div class="form-group">
                        <label for="gd_name" class="col-sm-2 control-label">商品名称</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="gd_name" name="gd_name" placeholder="请输入商品名称" required="true" message="商品名称">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="gd_price" class="col-sm-2 control-label">商品价格</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="gd_price" name="gd_price" placeholder="请输入价格" required="true" message="商品价格">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="gd_ctg" class="col-sm-2 control-label">选择分类</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="gd_ctg" name="gd_ctg">
                                <option value="电器办公">电器办公</option>
                                <option value="服装饰品">服装饰品</option>
                                <option value="书籍">书籍</option>
                                <option value="其他">其他</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="gd_ctg" class="col-sm-2 control-label">商品描述</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="2" required="true" message="商品描述" placeholder="给你的商品一些介绍吧" name="gd_des" id="gd_des"></textarea>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">商品图片</label>
                        <div class="col-sm-10" >
                            <label for="doc" style="float:left">
                                <img class="img-thumbnail" id="chooseImage" src="/shop/Public/images/up2.png"
                                     style="width: 130px;height: 130px;"
                                />
                            </label>
                            <input type="text"  value="<?php echo ($config["accessToken"]); ?>" name="accessToken" style="display:none"/>
	                        <input type="text" id="mediaid" value="" name="mediaid" style="display:none"/>
                            <button type="button" class="btn  btn-info btn-xn" id="uploadImage" style="float:left;margin-left:10px;;margin-top:50px;">上传图片</button>
                            
                        </div>
                     </div>


                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="button" class="btn  btn-info btn-block" onclick="checkGoods();" >上传商品</button>
                        </div>
                    </div>

                </form>


            </div>
        </div>
    </div>
</div>






<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script>
 
  wx.config({
    debug: false,
    appId: "<?php echo ($config["appId"]); ?>",
    timestamp: "<?php echo ($config["timestamp"]); ?>",
    nonceStr: "<?php echo ($config["nonceStr"]); ?>",
    signature: "<?php echo ($config["signature"]); ?>",
    jsApiList: [
      // 所有要调用的 API 都要加到这个列表中
		
		'chooseImage',
		'previewImage',
		'uploadImage',
		'downloadImage',
		
    ]
  });
  wx.ready(function () {
    // 在这里调用 API
	
	 
	 
 var images = {
    localId: [],
    serverId: []
  };
  
  document.querySelector('#chooseImage').onclick = function () {
    wx.chooseImage({
	  count:1,
	  sourceType:['album'],
      success: function (res) {
        images.localId = res.localIds;
		//alert("图片地址："+res.localIds[0]);
		
        //alert('You have choosed ' + res.localIds.length + ' images');
		$("#chooseImage").attr('src',res.localIds[0]);
		
		
	
      }
    });
  };

  
 

  // 5.3 上传图片
  document.querySelector('#uploadImage').onclick = function () {
    if (images.localId.length == 0) {
      alert('Please use chooseImage Firstly');
      return;
    }
    var i = 0, length = images.localId.length;
    images.serverId = [];
    function upload() {
      wx.uploadImage({
        localId: images.localId[i],
        success: function (res) {
          i++;
		  //alert('media id：' +res.serverId);
		  
		  
          //alert('Have uploaded：' + i + '/' + length);
          images.serverId.push(res.serverId);
		  $("#mediaid").val(res.serverId);
		  //$("#form").submit();
		  
          if (i < length) {
            upload();
          }
        },
        fail: function (res) {
          alert(JSON.stringify(res));
        }
      });
    }
    upload();
  };

  
  });
</script>



<script type="text/javascript">
    $(document).ready(function () {
        if ("<?php echo I('get.info');?>"=="1"){
             floatNotify.simple("添加商品成功",1500);
        }else if("<?php echo I('get.info');?>"=="2"){
             floatNotify.simple("添加商品失败，请稍后重试",1500);
         }
    });
    var contextPath = '';
    //下面用于图片上传预览功能
    function setImagePreview(avalue) {
        var docObj=document.getElementById("doc");

        var imgObjPreview=document.getElementById("preview");
        if(docObj.files &&docObj.files[0])
        {
            //火狐下，直接设img属性
            imgObjPreview.style.display = 'block';
            imgObjPreview.style.width = '130px';
            imgObjPreview.style.height = '130px';
            //imgObjPreview.src = docObj.files[0].getAsDataURL();

            //火狐7以上版本不能用上面的getAsDataURL()方式获取，需要一下方式
            imgObjPreview.src = window.URL.createObjectURL(docObj.files[0]);
        }
        else
        {
            //IE下，使用滤镜
            docObj.select();
            var imgSrc = document.selection.createRange().text;
            var localImagId = document.getElementById("localImag");
            //必须设置初始大小
            localImagId.style.width = "130px";
            localImagId.style.height = "130px";
            //图片异常的捕捉，防止用户修改后缀来伪造图片
            try{
                localImagId.style.filter="progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale)";
                localImagId.filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = imgSrc;
            }
            catch(e)
            {
                alert("您上传的图片格式不正确，请重新选择!");
                return false;
            }
            imgObjPreview.style.display = 'none';
            document.selection.empty();
        }
        $("#isimg3").val("true");
        return true;
    }


    function checkGoods(){
        var flag =true;
        var postData={};

        $("#theForm").find("input").each(function(){
            var $obj=$(this);
            var message=$obj.attr("message");
            if(isBlank($obj.val()) && $obj.attr("required") == "required"){
                floatNotify.simple(message+'不能为空');
                flag=false;
                return false;
            }
        })

        if(flag){
            $("#theForm").submit();
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

</body>
</html>