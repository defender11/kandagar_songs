<?php
if ($_SERVER['REQUEST_METHOD'] == "GET") {

//    $_SESSION['auth_status']
//    $_SESSION['user_name']
//    $_SESSION['user_key']

    if ( $_SESSION['auth'] == "yes" ) {
        $cName = @$_COOKIE['name'];
        $cSong = @$_COOKIE['song'];
        $userName = $_SESSION['user_name'];
        $userKey = $_SESSION['user_key'];

        include 'header.php';
//        include APPPATH."../public/php/function.php";

//        echo "Session auth:  " . @$_SESSION['auth'].'<br />';
//        echo "Session auth status:  " . @$_SESSION['auth_status'].'<br />';
//        echo "User: ". $_SESSION['user_name'].'<br />';
//        echo "User key: ". $_SESSION['user_key'].'<br />';

//        Код для выбранных песен, что бы была только одна.
//        ---------------------------------------------------
//        $temp = array();
//        $topSong = "";
//        foreach ($chat as $sTv) {
//            array_push($temp, $sTv["select_songs"]);
//        }
//        for ($i = 0; $i < count($temp); $i++) {
//            if ($temp[$i] == 1) {
//                $topSong = $temp[$i];
//            }
//        }
//        ---------------------------------------------------
//        Var for count songs
        ?>
        <span class="editItemTempBgBlack"></span>
        <div class='editItemTemp' data-group=''>
            <span class="editItemTempClose"><i class="fa fa-times-circle-o"></i></span>
            <input class='add_songs' name='add_songs' placeholder='Name' value='' type='text' />
            <input class='add_link' name='add_link' placeholder='URL' value='' type='text' />
            <span class='btnSaveLinkEdit' title='Save songs'><i class='fa fa-floppy-o'></i></span>
        </div>
        <div class='editItemName' data-group=''>
            <span class="editItemTempClose"><i class="fa fa-times-circle-o"></i></span>
            <input class='itemName' name='itemName' placeholder='Name' value='' type='text' />
            <span class='btnSaveLinkEditName' title='Save name'><i class='fa fa-floppy-o'></i></span>
        </div>
        <div class="showMsg"></div>
        <div class="boxSing boxProfile" data-userid="<?=$userKey;?>" style="border-bottom: none;">
            <div class="boxImgName">
                <?php
//                    echo "<pre>";
//                    var_dump($usersInfo);
//                    echo "</pre>";

                checkAvatar($url, $usersInfo, "Body");

                ?>
                <form enctype="multipart/form-data" method="post" action="" class="boxAvatarUpload">
                    <span class="boxAvatarUploadClose"><i class='fa fa-times'></i></span>
                    <input type="hidden" name="upload" value="1">
                    <input type="file" name="photo"  accept="image/png,image/jpeg,image/gif">
                    <input type="submit" value="Загрузить">
                </form>
                <h2 class="profileUsrName"><?php echo $userName; ?></h2>
            </div>
            <div class="clear"></div>
            <span class="profileSaveEmailBtn"><i class="fa fa-check"></i></span><input type="email" required placeholder="Write your e-mail" value="<?=$usersInfo[0]['email'];?>">
            <span class="boxProfileAttentionRestorePasswrd">If you have in future restore password, write your e-mail.</span>
            <br />
            <h4 class="h4Header">Change you password:</h4>
            <span class="profileChgPassBtn"><i class="fa fa-check"></i></span><input type="password" class="profileChgPass" placeholder="Your password"><br />
            <div class="boxProfileAttentionNewSong">
                <input type="checkbox" name="AttentionNewSong" <?php if ($usersInfo[0]["u_attentionNewSong"] == 1) echo "checked"; ?>>
                <span class="h4Header">Attention for new song.</span>
            </div>
            <span class="boxProfileSongsBoxTxt">User songs list</span>
            <div class="boxProfileSongsBox">
                <span class="boxSquareOrange"></span>
                <span> - Songs in active: </span>
                <span class="boxSquareGreen"></span>
                <span> - Songs in archive: </span>
                <ul class="boxProfileSongsList">
                    <li><span class="w3 fl bord boxProfileSongsList_caption">Date</span><span class="w11 fl bord boxProfileSongsList_caption">Songs name</span><div class="clear"></div></li>
                    <?php
                        foreach ($userSongs as $song) {
                            if ($song['name'] == $userName) {
                                if ($song['archive'] != 1){
                                    echo "<li><span class='w3 fl bord boxProfileSongsList_item'>{$song['dt_add']}</span><span class='w11 fl bord boxProfileSongsList_item'>{$song['music']}</span><div class='clear'></div></li>";
                                } else {
                                    echo "<li><span class='w3 fl bord boxProfileSongsList_item' style='background: darkseagreen;'>{$song['dt_add']}</span><span class='w11 fl bord boxProfileSongsList_item' style='background: darkseagreen;'>{$song['music']}</span><div class='clear'></div></li>";
                                }
                            }
                        }
                    ?>
                </ul>
            </div>
        </div>
    <div class="clear"></div>
<?php

        require_once 'footer.php';
    } else {
        session_destroy();
        $_SESSION['auth'] == "no";
        echo "off";
        redirect('login');
        exit();
    }
}
?>
