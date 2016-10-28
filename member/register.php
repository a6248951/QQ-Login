<?php 
require 'config.inc.php';
require '../common.inc.php';
require AJ_ROOT.'/module/'.$module.'/register.inc.php';
//回调页面做QQ授权处理
//1,QQ授权CODE
$appid = '101346137'; 
$appkey = 'eb5252e19ed87a0b4ca3ae6a566e28b7';
$redirect_uri = 'http://geijiachina.com/member/register.php';
$redirect_uri=urlencode($redirect_uri);
//2,获取token ，从而获取access_token,用于获取续期token
$url = "https://graph.qq.com/oauth2.0/token?grant_type=authorization_code&client_id=101346137&client_secret=eb5252e19ed87a0b4ca3ae6a566e28b7&code=".$_GET['code']."&redirect_uri=".$redirect_uri."";
$str=file_get_contents($url);
//3,3，获取续期token
$str = strstr($str,'sh_token='); 
$str_num = strlen($str);
$str = substr($str,9,$str_num-1);
$urlpp="https://graph.qq.com/oauth2.0/token?grant_type=refresh_token&client_id=101346137&client_secret=eb5252e19ed87a0b4ca3ae6a566e28b7&refresh_token=".$str."";
$str1=file_get_contents($urlpp);
//4,获取openid
$b= (strpos($str1,"="));
$c= (strpos($str1,"&"));
$d = substr($str1,$b+1,$c-1); 
$e = substr($d,0,-12);
$urlww = "https://graph.qq.com/oauth2.0/me?access_token=".$e."";
$strww=file_get_contents($urlww);
$lpos = strpos($strww, "(");
$rpos = strrpos($strww, ")");
$response = substr($strww, $lpos + 1, $rpos - $lpos -1);
$user = json_decode($response,true);
$urlff = "https://graph.qq.com/user/get_user_info?access_token=".$e."&oauth_consumer_key=101346137&openid=".$user['openid']."";
$strff=file_get_contents($urlff);
$data = json_decode($strff,true);
var_dump($user['openid']);
echo "<br/>";
var_dump($data['nickname']);
echo "<br/>";




?>
