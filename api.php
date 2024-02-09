<?php
//require __DIR__ . "/inc/bootstrap.php";
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode( '/', $uri );
if ((isset($uri[2]) && $uri[2] != 'question') || !isset($uri[3])) {
    header("HTTP/1.1 404 Not Found");
    exit();
}
require __DIR__ . "/QuestionController.php";
$objFeedController = new QuestionController();
$strMethodName = $uri[3] . 'Action';
if($uri[3] == 'id')
    $objFeedController->{$strMethodName}($uri[4]);
else 
    $objFeedController->{$strMethodName}();
?>
