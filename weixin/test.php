<?php

if (isset($_GET['logToken'])){
    $rand=rand(10000000,99999999);
    $code=$_GET['logToken'];
    $res= postCurl('http://api.ticknet.cn', json_encode(array(
        'appid' => '8',
        'random'  =>  $rand,
        'token' =>  hash('ripemd160', '93nfcab5cffd9eeb' . $rand),
        'action'  => 'CheckToken',
        'logToken'  =>$code
    )));

    $res2=json_decode($res,true);
    $userid=$res2['data']['userid'];



    $rand2=rand(10000000,99999999);
    $res3= postCurl('http://api.ticknet.cn', json_encode(array(
        'appid' => '8',
        'random'  =>  $rand2,
        'token' =>  hash('ripemd160', '93nfcab5cffd9eeb' . $rand2),
        'action'  => 'GetUserInfo',
        'userid'  =>$userid
    )));

    $res4=json_decode($res3,true);

    $name=$res4['data']['name'];
    $college=$res4['data']['college'];
    $class=$res4['data']['class'];
    $photo=$res4['data']['photo'];

    header("Location:http://ticknet4.duapp.com/index.php");

   // echo  $userid."---".$name."---".$college."---".$class."---".$photo;
   /* $con = mysqli_connect("sqld.duapp.com","75eed8005aed4eb5ab87c5fccddf3049","ab64252a901b4ae9bcfd9334247d16a6","PtdvBzudPLzXHgbxhguJ");
    if (mysqli_connect_errno($con)) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }else{
        echo "链接成功";
    }
    mysqli_set_charset($con, "utf8");
    mysqli_close($con);*/


}else{
    $r_url="http://ticknet4.duapp.com/shop/weixin/test.php";
    header("Location:http://api.ticknet.cn?action=AuthLogin&redir_url=".urlencode($r_url));
    die();
}


?>

<?php
 function postCurl($url, $data) {
    //$header = "Content-type: text/html";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    //curl_setopt($ch, CURLOPT_HTTPHEADER, array($header));
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    $response = curl_exec($ch);
    if(curl_errno($ch)){
        print curl_error($ch);
    }
    curl_close($ch);
    return $response;
}


?>