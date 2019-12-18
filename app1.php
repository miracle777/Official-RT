<?php
require_once("twitteroauth.php");
 
$consumerKey = "OKCXEn1CacMyHMOaNFfxA";
$consumerSecret = "TUkHumxlgiIXWXcUXZOZgWOg5escbUwhGZ7gy4";
$accessToken = "59696913-cUtI2MJan2tUCbiRmCeH1sHymH19VAi6qhOtMMzAB";
$accessTokenSecret = "4mA5lotYk3eQ537XR2eZdbSF6eICGktoKoBSIUfujuQL4";
 
$twObj = new TwitterOAuth(
 $consumerKey,
 $consumerSecret,
 $accessToken,
 $accessTokenSecret
);
 
 
$sname[0] ='miyokosano';
$sname[1] ='miraclejewelry';
$sname[2] ='akikoakimoto';
$sname[3] ='zousan_tea';
 
//ここからループ処理
 
for ($i=0; $i<=3; $i++){ 

$options = array('count'=>'1','lang'=>'ja','screen_name'=>$sname[$i],'exclude_replies'=>'true');
 
$json = $twObj->OAuthRequest(
 'https://api.twitter.com/1.1/statuses/user_timeline.json',
 'GET',
 $options
);
 
//json_decode
$dec_data = json_decode($json, true);
 
$id = $dec_data[0]['id_str'];
 
$twObj->oAuthRequest(
 'https://api.twitter.com/1.1/statuses/retweet/'.$id.'.json',
 'POST');
 
}

 
?>