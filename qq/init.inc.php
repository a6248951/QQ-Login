<?php
defined('IN_AIJIACMS') or exit('Access Denied');
$OAUTH = cache_read('oauth.php');
$site = 'qq';
$OAUTH[$site]['enable'] or dheader($MODULE[1]['linkurl']);
$session = new dsession();
define('QQ_ID','101346137');
define('QQ_SECRET', 'eb5252e19ed87a0b4ca3ae6a566e28b7');
define('QQ_CALLBACK', 'http://geijiachina.com/member/register.php');
define('QQ_CONNECT_URL', 'https://graph.qq.com/oauth2.0/authorize');
define('QQ_TOKEN_URL', 'https://graph.qq.com/oauth2.0/token');
define('QQ_ME_URL', 'https://graph.qq.com/oauth2.0/me');
define('QQ_USERINFO_URL', 'https://graph.qq.com/user/get_user_info');
?>
