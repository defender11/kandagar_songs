<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="Keywords" content="">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--    <link href="--><?//=base_url();?><!--public/img/favicon_2.ico" rel="shortcut icon" type="image/x-icon" />-->

    <link rel="stylesheet" href="<?=base_url();?>public/css/style.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!--    <link rel="stylesheet" href="--><?//=base_url();?><!--public/css/font-awesome.min.css">-->
    <!--    <link rel="stylesheet" href="--><?//=base_url();?><!--public/css/jquery-ui.min.css">-->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

    <script src="<?=base_url();?>public/js/jquery-1.11.3.min.js"></script>
    <!--            <script src="--><?//=base_url();?><!--public/js/jquery-ui.min.js"></script>-->

    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script src="<?=base_url();?>public/js/common.js"></script>
    <script src="<?=base_url();?>public/js/jquery.cookie.js"></script>
</head>
<body>
<?php
if ($_SERVER['HTTP_HOST'] === 'cepaso.ru/kandagar_songs/') {
    $url = "http://".$_SERVER['HTTP_HOST']."/kandagar_songs";
} else if($_SERVER['HTTP_HOST'] === "songs.crimea-kurort.com") {
    $url = "http://".$_SERVER['HTTP_HOST'];
} else {
    $url = "http://".$_SERVER['HTTP_HOST'];
}
//echo "<p style='text-align: center;'><strong>Test mode, don`t add item on this page</strong></p>";

$img_profile = $url."/public/img/avatar/".$_SESSION['user_name']."/";
$img_profile_default = $url."/public/img/default_avatar.jpg";
include APPPATH."../public/php/function.php";

?>
<div class="bg">
    <div class="box">

        <div class="header">
            <h1 class="boxHeaderTxt"><i class="fa fa-users"></i>  <span class="headerTxt1">SINGING ON </span> <span class="headerTxt2">WEDNESDAYS</span></h1>
            <ul class="boxMenu">

                <li class="linkMenu"><a href="<?php echo base_url(); ?>" ><i class='fa fa-home'></i> Home</a></li>
                <li class="linkMenu"><a href="<?php echo base_url(); ?>main/archive" ><i class='fa fa-suitcase'></i> Archive</a></li>
            </ul>
            <p class="usrBar">
                <!--                <span class="usrBarConfiguration"><i class="fa fa-linux fa-lg"></i><i class="fa fa-firefox fa-lg"></i></span>-->
                <?=checkStatusAgent($statusAgent);?>
                <span class="usrBarTxt">User: [ <strong class="usrBarTxtName"><?php echo $_SESSION['user_name']; ?></strong> ]</span>
                <br />
                <a href="<?=base_url();?>profile" class="usrBarProfile">Profile</a>
                <a href="<?=base_url();?>start/logout" class="usrBarExit">Logout</a>
                <?=checkAvatar($url, $usersInfo, "Header");?>
            </p>
        </div>
        <div class="clear"></div>
