<!-- Bootstrap -->
<!-- Latest compiled and minified CSS -->
<link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

<!-- Optional theme -->
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap-theme.min.css" />
<!-- OOCSS -->
<link rel="stylesheet" href="assets/oocss.css" />
<!-- Optional theme -->
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap-docs.css" />
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="assets/jquery.min.js"></script>

<?php
$pid = "0";
if (isset($_GET['pid'])) {
    $pid = $_GET['pid'];
}
$cid = "0";
if (isset($_GET['cid'])) {
    $cid = $_GET['cid'];
}
$title = "";
if (isset($_GET['title'])) {
    $title = $_GET['title'];
}

?>