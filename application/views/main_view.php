<?php
if ($_SERVER['REQUEST_METHOD'] == "GET") {
//    session_start();

//    $_SESSION['auth_status']
//    $_SESSION['user_name']
//    $_SESSION['user_key']

    if ( $_SESSION['auth'] == "yes" ) {
        $cName = @$_COOKIE['name'];
        $cSong = @$_COOKIE['song'];
        $userKey = $_SESSION['user_key'];

        include 'header.php';
//        include APPPATH."../public/php/function.php";
        $grps = $lastGroup[0]['s_group'] + 1;

//        echo "Session auth:  " . @$_SESSION['auth'].'<br />';
//        echo "Session auth status:  " . @$_SESSION['auth_status'].'<br />';
//        echo "User: ". $_SESSION['user_name'].'<br />';
//        echo "User key: ". $_SESSION['user_key'].'<br />';

//        Код для выбранных песен, что бы была только одна.
//        ---------------------------------------------------
        $temp = array();
        $topSong = "";
        foreach ($chat as $sTv) {
            array_push($temp, $sTv["select_songs"]);
        }
        for ($i = 0; $i < count($temp); $i++) {
            if ($temp[$i] == 1) {
                $topSong = $temp[$i];
            }
        }
//        ---------------------------------------------------
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
        <div class="boxControl">
            <form class="boxSend" method="POST" action="" data-grp="<?php echo @$grps; ?>">
                <div class="boxSendInput"><p style="margin-left: 5px;">Song: </p><input type="text" class="boxSendMusic" placeholder="Add you song" value="" required></div>
                <span class="btnSend" data-grp="<?php echo @$grps; ?>" data-uk='<?=$userKey?>'> <i class="fa fa-paper-plane"></i> Send</span>
            </form>
        </div>
        <div class="boxSing">
            <?php
                foreach($chat as $sT)  {
                    if ($sT['archive'] != 1 && $sT['select_songs'] == 1) {
                        if ($sT['s_key'] === $userKey) {
                            echo "<div class='sort' id='" . $sT['id'] . "' data-id='" . $sT['id'] . "' style='background: rgb(135, 112, 72);' data-uk='".$userKey."'>\n\r";
                            //                echo "<i class='fa fa-music fa-4x msc'></i> <span class='boxChatName' data-maxgroup=".$maxGroup[0]['MAX(link_group)']." data-group='".$sT['s_group']."'>".$sT['name'].": </span>";
                            echo "<span class='boxChatName' data-maxgroup=" . $maxGroup[0]['MAX(link_group)'] . " data-group='" . $sT['s_group'] . "'>" . $sT['name'] . ": </span>";
                            echo "<span class='boxChatMusic' title='" . $sT['music'] . "'><span class='boxChatMusicShowTxt'>" . $sT['music'] . "</span></span>\n\r";

                            echo "<p class='boxChatLinks'>";
                            foreach ($getGroup as $grp) {
                                if ($sT['s_group'] == $grp['link_group']) {
                                    if ($grp['link_url'] == "") {
                                        echo "<span data-linkid='" . $grp['link_id'] . "' class='boxChatMusic dBlock' title='" . $grp['link_name'] . "'><span class='txt'>" . $grp['link_name'] . "</span></span><span class='btnSubEditItem' data-name='" . $grp['link_name'] . "' data-url='" . $grp['url'] . "' data-iddel='" . $grp['link_id'] . "' title='Edit: " . $sT['name'] . ", Песня: " . $grp['link_name'] . "'><i class='fa fa-pencil-square-o '></i></span><span class='btnSubDelItem' data-iddel='" . $grp['link_id'] . "' title='ID: " . $grp['link_id'] . ", Имя: " . $sT['name'] . ", Песня: " . $grp['link_name'] . "'><i class='fa fa-trash'></i></span><span class='clear'></span>\n\r";
                                    } else {
                                        echo "<a href='" . $grp['link_url'] . "' data-linkid='" . $grp['link_id'] . "' class='boxChatMusic dBlock' target='_blank' title='" . $grp['link_name'] . "'><span class='txt'>" . $grp['link_name'] . "</span></a><span class='btnSubEditItem' data-name='" . $grp['link_name'] . "' data-url='" . $grp['url'] . "' data-iddel='" . $grp['link_id'] . "' title='Edit: " . $sT['name'] . ", Песня: " . $grp['link_name'] . "'><i class='fa fa-pencil-square-o '></i></span><span class='btnSubDelItem' data-iddel='" . $grp['link_id'] . "' title='ID: " . $grp['link_id'] . ", Имя: " . $sT['name'] . ", Песня: " . $grp['link_name'] . "'><i class='fa fa-trash'></i></span><span class='clear'></span>\n\r";
                                    }
                                }
                            }
                            echo "<span class='btnReloadPage' title='End Write'><i class='fa fa-check-square-o'></i> End write.</span>";
                            echo "</p>\n\r";
                            echo "<div class='clear'></div>";
                            echo "<span class='boxchatDateAdd'><i class='fa fa-calendar'></i> " . $sT['dt_add'] . "</span>";
                            echo "<div class='songsMenu'>";
                            echo "<span class='btnTrnBack' title='Turn back'><i class='fa fa-reply'></i> Turn back</span>\n";
                            echo "<span class='btnChatAddLink' title='Add song'><i class='fa fa-music'></i> Add note</span>\n";
                            echo "<span class='btnEditItem' data-ided='" . $sT['id'] . "' title='Имя: " . $sT['music'] . "'><i class='fa fa-pencil-square-o' style='padding: 3px;'></i> Edit</span>\n";
                            echo "<span class='putToArchive' title='Put to archive: " . $sT['music'] . "' data-idarchive='" . $sT['id'] . "'><i class='fa fa-suitcase'></i> Put to archive</span>\n";
                            echo "<span class='btnDelItem' data-iddel='" . $sT['id'] . "' title='Имя: " . $sT['name'] . ", Песня: " . $sT['music'] . "'><i class='fa fa-trash'></i> Delete</span>\n";

                            echo "</div>";
                            // if ($sT['rating'] >= 0 && $sT['rating'] <= 9) {
                            //     showRating($sT['rating']);
                            // } else {
                            //     echo "<div class='rating' data-rating='$valRat'><span class='ratingUp'><i class='fa fa-thumbs-up'></i></span><span class='ratingDown'><i class='fa fa-thumbs-down'></i></span><div class='_rat'><i class='fa fa-star-half'></i></div></div>";
                            // }
                            echo "<div class='settingBoxSongsBtn'><i class='fa fa-bars'></i></div>\n";
                            echo "<div class='rating' data-rating=''><span class='ratingUp'><i class='fa fa-thumbs-up ratingUp' style='color: green;'></i> 0 </span><span class='ratingDown'><i class='fa fa-thumbs-down ratingDown' style='color: red;'></i> 0 </span></div>\n";
                            echo "</div>\n\r";
//------------------------------------------------------------------------------------------------------------------------------
                        } else {
//------------------------------------------------------------------------------------------------------------------------------
                            echo "<div class='sort' id='" . $sT['id'] . "' data-id='" . $sT['id'] . "' style='background: rgb(135, 112, 72);'  data-uk='".$userKey."'>\n\r";
                            //                echo "<i class='fa fa-music fa-4x msc'></i> <span class='boxChatName' data-maxgroup=".$maxGroup[0]['MAX(link_group)']." data-group='".$sT['s_group']."'>".$sT['name'].": </span>";
                            echo "<span class='boxChatName' data-maxgroup=" . $maxGroup[0]['MAX(link_group)'] . " data-group='" . $sT['s_group'] . "'>" . $sT['name'] . ": </span>";
                            echo "<span class='boxChatMusic' title='" . $sT['music'] . "'><span class='boxChatMusicShowTxt'>" . $sT['music'] . "</span></span>\n\r";

                            echo "<p class='boxChatLinks'>";
                            foreach ($getGroup as $grp) {
                                if ($sT['s_group'] == $grp['link_group']) {
                                    if ($grp['link_url'] == "") {
                                        echo "<span data-linkid='" . $grp['link_id'] . "' class='boxChatMusic dBlock' title='" . $grp['link_name'] . "'><span class='txt'>" . $grp['link_name'] . "</span></span>\n\r";
                                    } else {
                                        echo "<a href='" . $grp['link_url'] . "' data-linkid='" . $grp['link_id'] . "' class='boxChatMusic dBlock' target='_blank' title='" . $grp['link_name'] . "'><span class='txt'>" . $grp['link_name'] . "</span></a>\n\r";
                                    }
                                }
                            }
                            echo "<span class='btnReloadPage' title='End Write'><i class='fa fa-check-square-o'></i> End write.</span>";
                            echo "</p>\n\r";
                            echo "<div class='clear'></div>";
                            echo "<span class='boxchatDateAdd'><i class='fa fa-calendar'></i> " . $sT['dt_add'] . "</span>";
                            echo "<div class='songsMenu'>";
                            echo "<span class='btnTrnBack' title='Turn back'><i class='fa fa-reply'></i> Turn back</span>\n";
//                            echo "<span class='btnChatAddLink' title='Add song'><i class='fa fa-music'></i> Add note</span>\n";
//                            echo "<span class='btnEditItem' data-ided='" . $sT['id'] . "' title='Имя: " . $sT['music'] . "'><i class='fa fa-pencil-square-o' style='padding: 3px;'></i> Edit</span>\n";
                            echo "<span class='putToArchive' title='Put to archive: " . $sT['music'] . "' data-idarchive='" . $sT['id'] . "'><i class='fa fa-suitcase'></i> Put to archive</span>\n";
//                            echo "<span class='btnDelItem' data-iddel='" . $sT['id'] . "' title='Имя: " . $sT['name'] . ", Песня: " . $sT['music'] . "'><i class='fa fa-trash'></i> Delete</span>\n";

                            echo "</div>";
                            // if ($sT['rating'] >= 0 && $sT['rating'] <= 9) {
                            //     showRating($sT['rating']);
                            // } else {
                            //     echo "<div class='rating' data-rating='$valRat'><span class='ratingUp'><i class='fa fa-thumbs-up'></i></span><span class='ratingDown'><i class='fa fa-thumbs-down'></i></span><div class='_rat'><i class='fa fa-star-half'></i></div></div>";
                            // }
                            echo "<div class='settingBoxSongsBtn'><i class='fa fa-bars'></i></div>\n";
                            echo "<div class='rating' data-rating=''><span class='ratingUp'><i class='fa fa-thumbs-up ratingUp' style='color: green;'></i> 0 </span><span class='ratingDown'><i class='fa fa-thumbs-down ratingDown' style='color: red;'></i> 0 </span></div>\n";
                            echo "</div>\n\r";
                        }
                    }
                }
            ?>

        </div>
        <div class="boxChat">
            <?php
            foreach ($chat as $value) {
                if ($value['archive'] != 1 && $value['select_songs'] != 1) {
                    if ($value['s_key'] === $userKey) {
                        echo "<div class='boxChatItem sort' id='".$value['id']."' data-id='".$value['id']."' data-uk='".$userKey."'>\n\r";
                        //                echo "<i class='fa fa-music fa-4x msc'></i> <span class='boxChatName' data-maxgroup=".$maxGroup[0]['MAX(link_group)']." data-group='".$value['s_group']."'>".$value['name'].": </span>";
                        echo "<span class='boxChatName' data-maxgroup=".$maxGroup[0]['MAX(link_group)']." data-group='".$value['s_group']."'>".$value['name'].": </span>";
                        echo "<span class='boxChatMusic' title='".$value['music']."'><span class='boxChatMusicShowTxt'>".$value['music']."</span></span>\n\r";

                        echo "<p class='boxChatLinks'>";
                        foreach($getGroup as $grp){
                            if($value['s_group'] == $grp['link_group']){
                                if ($grp['link_url'] == ""){
                                    echo "<span data-linkid='".$grp['link_id']."' class='boxChatMusic dBlock' title='".$grp['link_name']."'><span class='txt'>".$grp['link_name']."</span></span><span class='btnSubEditItem' data-name='".$grp['link_name']."' data-url='".$grp['url']."' data-iddel='".$grp['link_id']."' title='Edit: ".$value['name'].", Песня: ".$grp['link_name']."'><i class='fa fa-pencil-square-o '></i></span><span class='btnSubDelItem' data-iddel='".$grp['link_id']."' title='ID: ".$grp['link_id'].", Имя: ".$value['name'].", Песня: ".$grp['link_name']."'><i class='fa fa-trash'></i></span><span class='clear'></span>\n\r";
                                }else {
                                    echo "<a href='".$grp['link_url']."' data-linkid='".$grp['link_id']."' class='boxChatMusic dBlock' target='_blank' title='".$grp['link_name']."'><span class='txt'>".$grp['link_name']."</span></a><span class='btnSubEditItem' data-name='".$grp['link_name']."' data-url='".$grp['url']."' data-iddel='".$grp['link_id']."' title='Edit: ".$value['name'].", Песня: ".$grp['link_name']."'><i class='fa fa-pencil-square-o '></i></span><span class='btnSubDelItem' data-iddel='".$grp['link_id']."' title='ID: ".$grp['link_id'].", Имя: ".$value['name'].", Песня: ".$grp['link_name']."'><i class='fa fa-trash'></i></span><span class='clear'></span>\n\r";
                                }
                            }
                        }
                        echo "<span class='btnReloadPage' title='End Write'><i class='fa fa-check-square-o'></i> End write.</span>";
                        echo "</p>\n\r";
                        echo "<div class='clear'></div>";
                        echo "<span class='boxchatDateAdd'><i class='fa fa-calendar'></i> ".$value['dt_add']."</span>";
                        echo "<div class='songsMenu'>";
                        echo "<span class='btnChatAddLink' title='Add song'><i class='fa fa-music'></i> Add note</span>\n";
                        echo "<span class='btnEditItem' data-ided='".$value['id']."' title='Имя: ".$value['music']."'><i class='fa fa-pencil-square-o' style='padding: 3px;'></i> Edit</span>\n";
                        if ($topSong == 0) {
                            echo "<span class='btnAddToSing' title='Add to sing'><i class='fa fa-users'></i> Add to sing</span>\n";
                        } else {
                            echo "<span class='btnAddToSing dispOff' title='Add to sing'><i class='fa fa-users'></i> Add to sing</span>\n";
                        }
//                    var_dump($value['select_songs']);
                        echo "<span class='putToArchive' title='Put to archive: ".$value['music']."' data-idarchive='".$value['id']."'><i class='fa fa-suitcase'></i> Put to archive</span>\n";
                        echo "<span class='btnDelItem' data-iddel='".$value['id']."' title='Имя: ".$value['name'].", Песня: ".$value['music']."'><i class='fa fa-trash'></i> Delete</span>\n";

                        echo "</div>";
                        // if ($value['rating'] >= 0 && $value['rating'] <= 9) {
                        //     showRating($value['rating']);
                        // } else {
                        //     echo "<div class='rating' data-rating='$valRat'><span class='ratingUp'><i class='fa fa-thumbs-up'></i></span><span class='ratingDown'><i class='fa fa-thumbs-down'></i></span><div class='_rat'><i class='fa fa-star-half'></i></div></div>";
                        // }
                        echo "<div class='settingBoxSongsBtn'><i class='fa fa-bars'></i></div>\n";
                        echo "<div class='rating' data-rating=''><span class='ratingUp'><i class='fa fa-thumbs-up ratingUp' style='color: green;'></i> 0 </span><span class='ratingDown'><i class='fa fa-thumbs-down ratingDown' style='color: red;'></i> 0 </span></div>\n";
                        echo "</div>\n\r";
//------------------------------------------------------------------------------------------------------------------------------
                    } else {
//------------------------------------------------------------------------------------------------------------------------------
                        echo "<div class='boxChatItem sort' id='".$value['id']."' data-id='".$value['id']."' data-uk='".$userKey."'>\n\r";
                        //                echo "<i class='fa fa-music fa-4x msc'></i> <span class='boxChatName' data-maxgroup=".$maxGroup[0]['MAX(link_group)']." data-group='".$value['s_group']."'>".$value['name'].": </span>";
                        echo "<span class='boxChatName' data-maxgroup=".$maxGroup[0]['MAX(link_group)']." data-group='".$value['s_group']."'>".$value['name'].": </span>";
                        echo "<span class='boxChatMusic' title='".$value['music']."'><span class='boxChatMusicShowTxt'>".$value['music']."</span></span>\n\r";

                        echo "<p class='boxChatLinks'>";
                        foreach($getGroup as $grp){
                            if($value['s_group'] == $grp['link_group']){
                                if ($grp['link_url'] == ""){
                                    echo "<span data-linkid='".$grp['link_id']."' class='boxChatMusic dBlock' title='".$grp['link_name']."'><span class='txt'>".$grp['link_name']."</span></span>\n\r";
                                }else {
                                    echo "<a href='".$grp['link_url']."' data-linkid='".$grp['link_id']."' class='boxChatMusic dBlock' target='_blank' title='".$grp['link_name']."'><span class='txt'>".$grp['link_name']."</span></a>\n\r";
                                }
                            }
                        }
                        echo "<span class='btnReloadPage' title='End Write'><i class='fa fa-check-square-o'></i> End write.</span>";
                        echo "</p>\n\r";
                        echo "<div class='clear'></div>";
                        echo "<span class='boxchatDateAdd'><i class='fa fa-calendar'></i> ".$value['dt_add']."</span>";
                        echo "<div class='songsMenu'>";
//                        echo "<span class='btnChatAddLink' title='Add song'><i class='fa fa-music'></i> Add note</span>\n";
//                        echo "<span class='btnEditItem' data-ided='".$value['id']."' title='Имя: ".$value['music']."'><i class='fa fa-pencil-square-o' style='padding: 3px;'></i> Edit</span>\n";
                        if ($topSong == 0) {
                            echo "<span class='btnAddToSing' title='Add to sing'><i class='fa fa-users'></i> Add to sing</span>\n";
                        } else {
                            echo "<span class='btnAddToSing dispOff' title='Add to sing'><i class='fa fa-users'></i> Add to sing</span>\n";
                        }
//                    var_dump($value['select_songs']);
                        echo "<span class='putToArchive' title='Put to archive: ".$value['music']."' data-idarchive='".$value['id']."'><i class='fa fa-suitcase'></i> Put to archive</span>\n";
//                        echo "<span class='btnDelItem' data-iddel='".$value['id']."' title='Имя: ".$value['name'].", Песня: ".$value['music']."'><i class='fa fa-trash'></i> Delete</span>\n";

                        echo "</div>";
                        // if ($value['rating'] >= 0 && $value['rating'] <= 9) {
                        //     showRating($value['rating']);
                        // } else {
                        //     echo "<div class='rating' data-rating='$valRat'><span class='ratingUp'><i class='fa fa-thumbs-up'></i></span><span class='ratingDown'><i class='fa fa-thumbs-down'></i></span><div class='_rat'><i class='fa fa-star-half'></i></div></div>";
                        // }
                        echo "<div class='settingBoxSongsBtn'><i class='fa fa-bars'></i></div>\n";
                        echo "<div class='rating' data-rating=''><span class='ratingUp'><i class='fa fa-thumbs-up ratingUp' style='color: green;'></i> 0 </span><span class='ratingDown'><i class='fa fa-thumbs-down ratingDown' style='color: red;'></i> 0 </span></div>\n";
                        echo "</div>\n\r";
                    }
                }
            }
        ?>
        </div>
    <div class="clear"></div>
<?php
//        echo $this->pagination->create_links();
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
