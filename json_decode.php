<?php
$url = "http://www.reddit.com/r/linguistics/comments.json";
$jsonfile = file_get_contents($url);
$jsondata = json_decode($jsonfile);
var_dump($jsondata);
?>