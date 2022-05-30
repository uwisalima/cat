<?php

use Facebook\Facebook;

session_start();
require "vendor/autoload.php";


$fb = new \Facebook\Facebook([
  'app_id' => '430791881811610',
  'app_secret' => 'b37a188ca70b4e2a2677cc15212118ad',
  'default_graph_version' => 'v2.10',
]);

$helper = $fb->getRedirectLoginHelper();
$login_url = $helper->getLoginUrl("http://localhost/facebook/facebook_login/dash.php");

try {
    
    $accessToken = $helper->getAccessToken();

    if(isset($accessToken)) {
        $_SESSION['access_token'] = (string) $accessToken;
    }


} catch (Exception $e) {
    print $e->getTraceAsString();
}
