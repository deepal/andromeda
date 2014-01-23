<?php

require_once 'src/Google_Client.php';
require_once 'src/contrib/Google_Oauth2Service.php';

$client = new Google_Client();
$client->setApplicationName("Andromeda");
$client->setClientId('232040834357.apps.googleusercontent.com');
$client->setClientSecret('vgZSSZXYLF3Kdmcfq8xzWvYH');
$client->setRedirectUri('http://localhost/andromeda/login.php');
$client->setDeveloperKey('AIzaSyBsqxJgY4aMLqnUyXmylMfRLd1a7X-yMhE');
$oauth2 = new Google_Oauth2Service($client);

if (isset($_GET['code'])) {
  $client->authenticate($_GET['code']);
  $_SESSION['token'] = $client->getAccessToken();
  $redirect = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
  header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
  return;
}

if (isset($_SESSION['token'])) {
 $client->setAccessToken($_SESSION['token']);
}

if (isset($_REQUEST['logout'])) {
  unset($_SESSION['token']);
  $client->revokeToken();
}

if ($client->getAccessToken()) {
  $oauthuser = $oauth2->userinfo->get();
  
  	$_SESSION = array();
	$_SESSION['token'] = $client->getAccessToken();
	$_SESSION['oauth_user']=$oauthuser;
	$_SESSION['login']=true;
	$_SESSION['login-type']='oauth';
	$_SESSION['login-provider']='google';
	
	$name = $oauthuser['name'];
	$id = $oauthuser['id'];
	$provider = 'google';
	$email = $oauthuser['email'];
	$profile = $oauthuser['link'];
	$picture = $oauthuser['picture'];
	
	#header('location:home.php');
	
} else {
  $authUrl = $client->createAuthUrl();
}
?>
