<?php
$action = $_GET['action'];
$type = $_GET['type'];
$url = urldecode($_GET['url']);


header("Content-Disposition: attachment; filename=". basename($url).".avi");
readfile($url);

header("location:index.php");

?>