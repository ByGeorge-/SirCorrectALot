<?php
$json = 'http://www.reddit.com/r/linguistics/comments.json'; // JSON string to decode
$json_decode = json_decode($json); // Decode JSON from reddit

var_dump($json_decode);
?>