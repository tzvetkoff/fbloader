<?php

// $root
$root = '/'.trim(dirname($_SERVER['SCRIPT_NAME']), '/');

// hate errz
error_reporting(E_ALL|E_STRICT);
ini_set('display_errors', 'on');

// for debugging purposes
header('Content-Type: text/plain; charset=UTF-8');
function d($what) {
  print_r($what);
  echo "\n";
}

// get url
$url = isset($_GET['__url']) ? $_GET['__url'] : null;
if (!$url) {
  include __DIR__.'/index.php';
  exit;
}

// fix slashes
$url = str_replace('|', '/', $url);

// add query string
$query = $_GET;
unset($query['__url']);
$url .= '?' . http_build_query($query);

// go fetch!
$ch = curl_init();
// print_r($_SERVER);exit;
curl_setopt($ch,CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$html = curl_exec($ch);

// go match!
preg_match('/".*.mp4.*?"/', $html, $matches);

// early bail out
if (!$matches || !$matches[0]) {
	echo 'URL:'.$url;
	echo "\n\n";
	echo 'HTML:'.$html;
	echo "\n\n";
	echo "Ooops:Ooops!";
	exit;
}

$match = $matches[0];
$json = '[[' . $match . ']]';
$decoded = json_decode($json);
$decoded = $decoded[0];

// make the array into a hash
$hash = array();
for ($i = 0, $count = count($decoded); $i < $count; $i += 2) {
	$hash[$decoded[$i]] = $decoded[$i + 1];
}

// well, parse params now
$params = rawurldecode($hash['params']);

// json decode once again
$object = json_decode($params);


// take videos
$sources = array();
foreach ($object->video_data as $video_data) {
	$video_data = (object)$video_data;
	$sources[] = $video_data->sd_src;
}

// render view
ob_start();
include('videos.php');
$CONTENT_FOR_LAYOUT = ob_get_clean();

// render layout
header('Content-Type: text/html; charset=UTF-8');
include 'layout.php';
