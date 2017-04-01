<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
 
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <script charset="utf-8" src="/shop/Public/js/jquery.min.js?v=01291"></script>
  
  
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="yes" name="apple-touch-fullscreen">
    <meta content="telephone=no" name="format-detection">
    <meta content="black" name="apple-mobile-web-app-status-bar-style">
    <meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1;user-scalable=no;">
	

  <title></title>
</head>
<body>
 
 
   <h3 id="menu-image">Images接口</h3>
      <form action="<?php echo U('Deals/test');?>" method="post" id="form">
	      <input type="text"  value="<?php echo ($config["accessToken"]); ?>" name="accessToken"/>
	      <input type="text" id="mediaid" value="" name="mediaid"/>
	  </form>
	  
      <img id="img2" src="https://www.baidu.com/img/bd_logo1.png"  style="width:300px;height:300px;"/><br/><br/>
	  
      <button class="btn btn_primary" id="chooseImage">chooseImage</button>
      <br/><br/>
	 
	  
      <button class="btn btn_primary" id="uploadImage">uploadImage</button>
      <br/><br/>
	  
      
	  
</body>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script>
 
  wx.config({
    debug: true,
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
		alert("图片地址："+res.localIds[0]);
		
        alert('You have choosed ' + res.localIds.length + ' images');
		$("#img2").attr('src',res.localIds[0]);
		
		
	
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
		  
		  
          alert('Have uploaded：' + i + '/' + length);
          images.serverId.push(res.serverId);
		  $("#mediaid").val(res.serverId);
		  $("#form").submit();
		  
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
</html>