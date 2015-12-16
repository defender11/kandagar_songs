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
</head>
    <body>
<?php
if ($_SERVER['HTTP_HOST'] === "songs.crimea-kurort.com") {
    $url = "http://".$_SERVER['HTTP_HOST'];
} else {
    $url = "http://".$_SERVER['HTTP_HOST']."/kandagar_songs";
}
//echo "<p style='text-align: center;'><strong>Test mode, don`t add item on this page</strong></p>";
?>
<div class="box">
    <h1 class="boxHeaderTxt"><i class="fa fa-users"></i>  SINGING ON WEDNESDAYS.</h1>
    <ul class="boxMenu">
        <li class="linkMenu"><a href="<?php echo $url; ?>" ><i class='fa fa-home'></i> Home</a></li>
        <li class="linkMenu"><a href="<?php echo $url; ?>/main/archive" ><i class='fa fa-suitcase'></i> Archive</a></li>
    </ul>
    <div class="clear"></div>
