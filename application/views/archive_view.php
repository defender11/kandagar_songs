<?php
if ($_SERVER['REQUEST_METHOD'] == "GET") {
//    session_start();

    $cName = @$_COOKIE['name'];
    $cSong = @$_COOKIE['song'];
    require_once 'header.php';
//    include APPPATH . "../public/php/function.php";
    $grps = $lastGroup[0]['s_group'] + 1;
    //echo "<pre>";
    //var_dump($chat);
    //echo "</pre>";
//    echo "Session auth:  " . @$_SESSION['auth'].'<br />';
//    echo "Session auth status:  " . @$_SESSION['auth_status'].'<br />';
//    echo "User: ". $_SESSION['user_name'].'<br />';
//    echo "User key: ". $_SESSION['user_key'].'<br />';
    ?>
    <span class="editItemTempBgBlack"></span>
    <div class='editItemTemp' data-group=''>
        <span class="editItemTempClose"><i class="fa fa-times-circle-o"></i></span>
        <input class='add_songs' name='add_songs' placeholder='Name' value='' type='text'/>
        <input class='add_link' name='add_link' placeholder='URL' value='' type='text'/>
        <span class='btnSaveLinkEdit' title='Save songs'><i class='fa fa-floppy-o'></i></span>
    </div>
    <div class='editItemName' data-group=''>
        <span class="editItemTempClose"><i class="fa fa-times-circle-o"></i></span>
        <input class='itemName' name='itemName' placeholder='Name' value='' type='text'/>
        <span class='btnSaveLinkEditName' title='Save name'><i class='fa fa-floppy-o'></i></span>
    </div>
    <div class="showMsg"></div>
    <div class="boxChat">
    <?php
    foreach ($chat as $value) {
        if ($value['archive'] == 1) {
            echo "<div class='sort' id='" . $value['id'] . "'>\n\r";
//                echo "<i class='fa fa-music fa-4x msc'></i> <span class='boxChatName' data-maxgroup=".$maxGroup[0]['MAX(link_group)']." data-group='".$value['s_group']."'>".$value['name'].": </span>";
            echo "<span class='boxChatName' data-maxgroup=" . $maxGroup[0]['MAX(link_group)'] . " data-group='" . $value['s_group'] . "'>" . $value['name'] . ": </span>";
            echo "<span class='boxChatMusic' title='" . $value['music'] . "'><span class='boxChatMusicShowTxt'>" . $value['music'] . "</span></span>\n\r";

            echo "<p class='boxChatLinks'>";
            foreach ($getGroup as $grp) {
                if ($value['s_group'] == $grp['link_group']) {
                    if ($grp['link_url'] == "") {
                        echo "<span href='" . $grp['link_url'] . "' data-linkid='" . $grp['link_id'] . "' class='boxChatMusic dBlock' target='_blank' title='" . $grp['link_name'] . "'><span class='txt'>" . $grp['link_name'] . "</span></span><span class='clear'></span>\n\r";
                    } else {
//                        echo "<a href='".$grp['link_url']."' data-linkid='".$grp['link_id']."' class='boxChatMusic dBlock' target='_blank' title='".$grp['link_name']."'><span class='txt'>".$grp['link_name']."</span></a><span class='btnSubEditItem' data-name='".$grp['link_name']."' data-url='".$grp['url']."' data-iddel='".$grp['link_id']."' title='Edit: ".$value['name'].", Песня: ".$grp['link_name']."'><i class='fa fa-pencil-square-o '></i></span><span class='btnSubDelItem' data-iddel='".$grp['link_id']."' title='ID: ".$grp['link_id'].", Имя: ".$value['name'].", Песня: ".$grp['link_name']."'><i class='fa fa-trash'></i></span><span class='clear'></span>\n\r";
                        echo "<a href='" . $grp['link_url'] . "' data-linkid='" . $grp['link_id'] . "' class='boxChatMusic dBlock' target='_blank' title='" . $grp['link_name'] . "'><span class='txt'>" . $grp['link_name'] . "</span></a><span class='clear'></span>\n\r";
                    }
                }
            }
//                echo "<span class='btnChatAddLink' title='Add song'><i class='fa fa-plus'></i><i class='fa fa-music'></i></span>";
            echo "<span class='btnReloadPage' title='End Write'><i class='fa fa-check-square-o'></i> End write.</span>";
            echo "</p>\n\r";
            echo "<div class='clear'></div>";
            echo "<span class='boxchatDateAdd'><i class='fa fa-calendar'></i> " . $value['dt_add'] . "</span>\n\r";
            echo "<div class='songsMenu'>";
            echo "<span class='btnReturnInMain' data-group='" . $value['s_group'] . "' title='Return song:  [ " . $value['music'] . " ] To main.'><i class='fa fa-reply'></i> Return song</span>\n";
            echo "<span class='btnDelItem' data-iddel='" . $value['id'] . "' title='Имя: " . $value['name'] . ", Песня: " . $value['music'] . "'><i class='fa fa-trash'></i> Delete</span>\n";
            echo "</div>";
            echo "<div class='settingBoxSongsBtn'><i class='fa fa-bars'></i></div>\n";
//                 if ($value['rating'] >= 0 && $value['rating'] <= 9) {
//                     showRatingArchive($value['rating']);
//                 } else {
//                     echo "<div class='rating' data-rating='$valRat'>\n\r";
// //                  echo "<span class='ratingUp'><i class='fa fa-thumbs-up'></i></span><span class='ratingDown'><i class='fa fa-thumbs-down'></i></span>";
//                     echo "<div class='_rat'><i class='fa fa-star-half'></i></div></div>";
//                 }
            echo "<div class='rating' data-rating=''><span class='ratingUp'><i class='fa fa-thumbs-up ratingUp' style='color: green;'></i> 0 </span><span class='ratingDown'><i class='fa fa-thumbs-down ratingDown' style='color: red;'></i> 0 </span></div>";
//                echo "<span class='btnEditItemArchive' data-ided='".$value['id']."' title='Имя: ".$value['music']."'><i class='fa fa-pencil-square-o' style='padding: 3px;'></i></span>";
//                echo "<span class='putToArchive' title='Put to archive: ".$value['music']."' data-idarchive='".$value['id']."'><i class='fa fa-suitcase'></i></span><br />\n\r";
            echo "</div>\n\r";
        }
    }
}
        ?>
        </div>
    <div class="clear"></div>
<?php require_once 'footer.php'; ?>