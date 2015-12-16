<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="Keywords" content="">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?=base_url();?>public/css/style_login.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

    <script src="<?=base_url();?>public/js/jquery-1.11.3.min.js"></script>
    <script src="<?=base_url();?>public/js/common.js"></script>
</head>
    <body>
<?php
if ($_SERVER['HTTP_HOST'] === "songs.crimea-kurort.com") {
    $url = "http://".$_SERVER['HTTP_HOST'];
} else {
    $url = "http://".$_SERVER['HTTP_HOST']."/kandagar_songs";
}
//echo "Session auth:  " . @$_SESSION['auth'].'<br />';
//echo "Session auth status:  " . @$_SESSION['auth_status'].'<br />';
//echo "User: ". $_SESSION['user_name'].'<br />';
//echo "User key: ". $_SESSION['user_key'].'<br />';
?>

