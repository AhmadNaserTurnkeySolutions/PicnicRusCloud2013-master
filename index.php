<?php
/**
 * Copyright 2011 Facebook, Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may
 * not use this file except in compliance with the License. You may obtain
 * a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations
 * under the License.
 */

include 'fb/facebook.php';
//require 'base_facebook.php';
include("arrayViewer.php");
   

// Create our Application instance (replace this with your appId and secret).
$facebook = new Facebook(array(
  'appId'  => '150935011737790',
  'secret' => 'b33686e71a114dca877384b44af81fc2',
  'cookie' =>true
));
//$t=$facebook->getAccessToken();
//$facebook->setAccessToken($t);//'AAACEdEose0cBAFZBlCDQQdtzAsIcibUCN5VXUzMZBAAxt8sPbkZCxPGWpwkpM5sAP8dstJteRrGCM4ui5W75ukUr666tcgubuJtLLx70bX8D6K8rKNr');


//$facebook->setAccessToken('AAACEdEose0cBAKKGFHM8hz7v7gWzdZARzR46qHt9au0jZBsRJOhHWAVNWMynCgEKvZANVl4D2bg5ILOdOBXT213agwwqdj9vuPcZBzdQUIJMgGmncWBT');
// Get User ID
$user = $facebook->getUser();

// We may or may not have this data based on whether the user is logged in.
//
// If we have a $user id here, it means we know the user is logged into
// Facebook, but we don't know if the access token is valid. An access
// token is invalid if the user logged out of Facebook.

if ($user) {
  try {
    // Proceed knowing you have a logged in user who's authenticated.
    $user_profile = $facebook->api('/me?limit=10000');
	
	 $friends_profile = $facebook->api('/me/friends?limit=10000');
	


	echo "<hr />";
	print_r($user_profile,false);
		echo "<hr />";
	    view_r($user_profile);
	echo "<hr />";
		print_r($friends_profile,false);
			echo "<hr />";
		    view_r($friends_profile);
	
  } catch (FacebookApiException $e) {
    error_log($e);
    $user = null;
  }
}

// Login or logout url will be needed depending on current user state.
if ($user) {
  $logoutUrl = $facebook->getLogoutUrl();
} else {
  $loginUrl = $facebook->getLoginUrl();
}

// This call will always work since we are fetching public data.
$ahmadnassr = $user;//$facebook->api('/ahmad.nassr');

?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
 <head>
  <meta http-equiv="Content-Script-Type" content="text/javascript"/>
  <title>Welcome Page</title>
   <style>
      body {
        font-family: 'Lucida Grande', Verdana, Arial, sans-serif;
      }
      h1 a {
        text-decoration: none;
        color: #3b5998;
      }
      h1 a:hover {
        text-decoration: underline;
      }
    </style>
	<LINK REL = Stylesheet TYPE ="text/css" HREF ="arrayViewer.css" >
 </head>
 <body>
 
 <?php if ($user): ?>
      <a href="<?php echo $logoutUrl; ?>">Logout</a>
    <?php else: ?>
      <div>
        <a href="<?php echo $loginUrl; ?>">Login with Facebook</a>
      </div>
    <?php endif ?>

   

    <?php if ($user): ?>
      <h3>You</h3>
      <img src="https://graph.facebook.com/<?php echo $user; ?>/picture">

    <?php else: ?>
      <strong><em>You are not Connected.</em></strong>
    <?php endif ?>
	
  <!-- File: about.htm -->
  
	<div align=center >
	<h1>Welcome</h1>
  <table width='100%' >

  <tr><th><img src='./images/start.png' width='100%' /></th></tr>



 
 <tr> Name: Ahmad Hammad </tr><br />

    <tr>Sterio 007</tr><br />

  <tr>Go to main Page: </tr><br />
<tr><h1><a href="mainpage.php">Enter Main Page</a> </h1></tr>


</table>
</div>
 </body>
</html>
