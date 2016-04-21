<?php
require_once('TwitterAPIExchange.php');

/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
$settings = array(
    'oauth_access_token' => "543272019-4zqIB5dbvs3trvYb8rWyKtMSRmKQYyvg8ccDB3eg",
    'oauth_access_token_secret' =>"8AswdZ6yVzxtSpIAMIZKrt8gL9X3y0HvTYpnIosdqRHnn",
    'consumer_key' => "NHiAl4It70J2JKPG6XMz1vhiP",
    'consumer_secret' => "8nhLNJpI8dHUWUyR4uyccyDpBY6xCxR9kcGUrKFGXZMOWKjJIa"
);

$url = 'https://api.twitter.com/1.1/search/tweets.json';
// $url = 'https://api.twitter.com/1.1/application/rate_limit_status.json'
$requestMethod = 'GET';
//$getfield = '?q=%23DUBnation&count=100';
if(!empty($_GET['q'])){

	//$searchParams = test_input($_GET['q']);
	//$count = test_input($_GET['count']);
	//$max_id = test_input($_GET['max_id']);
	//$getfield = '?q=' . $searchParams . '&count=' . $count . '&max_id=' . $max_id;
		$getfield = '?q=' . $_GET['q'] . '&count=' . $_GET['count'] . '&max_id=' . $_GET['max_id'];
	//echo('getfield:' . $getfield);
	$twitter = new TwitterAPIExchange($settings);
	echo $twitter->setGetfield($getfield)
	             ->buildOauth($url, $requestMethod)
	             ->performRequest(); 
}
else{
	echo 'No search query';
}

// function test_input($data){
// 	//$data = trim($data);
// 	//$data = stripslashes($data);
// 	//$data = htmlspecialchars($data);
// 	return $data
// }

?>