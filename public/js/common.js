function showDBAnswer($class, $timeI, $timeO, $txt, $chk) {
    $this = $($class);
    if ($chk) {
        $this.text("");
        $this.fadeIn($timeI).css({'color':'#9BFF30!important', 'border':'1px solid #9BFF30!important'}).text($txt);
        $this.fadeOut($timeO);
    }
    else
    {
        $this.text("");
        $this.fadeIn($timeI).css({'color':'#FE2D0B!important', 'border':'1px solid #FE2D0B!important'}).text($txt);
        $this.fadeOut($timeO);
    }
};

function checkEmptyEmail($emailCheck, $textMsg, $showMess){
    if ( $emailCheck  == "") {
        $($showMess).css({
            'display':'block',
            'color':'#f00!important'
        })
            .append($textMsg);
    }
};


// function showStar ($id, $findItem, $item)
// {
//     switch ($id)
//     {
//         case '0':
//             $tmp = "<i class='fa fa-star-half'></i>";
//             $findItem.find($item).html($tmp);
//             break;
//         case '1':
//             $tmp = "<i class='fa fa-star'></i>";
//             $findItem.find($item).html($tmp);
//             break;
//         case '2':
//             $tmp = "<i class='fa fa-star'></i><i class='fa fa-star-half'></i>";
//             $findItem.find($item).html($tmp);
//             break;
//         case '3':
//             $tmp = "<i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star-half'></i>";
//             $findItem.find($item).html($tmp);
//             break;
//         case '4':
//             $tmp = "<i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star-half'></i>";
//             $findItem.find($item).html($tmp);
//             break;
//         case '5':
//             $tmp = "<i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star-half'></i>";
//             $findItem.find($item).html($tmp);
//             break;
//         case '6':
//             $tmp = "<i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star-half'></i>";
//             $findItem.find($item).html($tmp);
//             break;
//         case '7':
//             $tmp = "<i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star-half'></i>";
//             $findItem.find($item).html($tmp);
//             break;
//         case '8':
//             $tmp = "<i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star-half'></i>";
//             $findItem.find($item).html($tmp);
//             break;
//         case '9':
//             $tmp = "<i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i>";
//             $findItem.find($item).html($tmp);
//             break;
//         default:
//             $tmp = "<i class='fa fa-star-half'></i>";
//             $findItem.find($item).html($tmp);
//     }
// }
//$(document).load(function () {
//    $pathUrl = $('.boxFooter a').attr('alt');
//});
function event_click(e) {
    $this = $(this);
    $(".settingBoxSongsBtn").unbind('click');

    $this.closest(".sort").find(".songsMenu").fadeIn('fast', function () {
        $(window).bind("click", function (e) {
            if ($(e.target).parents(".songsMenu").size() == 0) {
                $(window).unbind("click");

                $this.closest(".sort").find(".songsMenu").fadeOut('fast', function (){
                    $(".settingBoxSongsBtn").bind("click", event_click);
                });
                e.preventDefault();
            }
        });
    });
    e.preventDefault();
};

$(document).ready(function() {

    //$pathUrl = $('.boxFooter a').attr('alt');
    //$path = "http://" + $pathUrl;
    //console.log($path);

    //$path = "http://songs.crimea-kurort.com/";
     $path = "http://cepaso.ru/kandagar_songs/";
      // $path = "http://songs.songs/";

    //=================================================
    //$( "#datepicker" ).datepicker({
    //    showOn: "button",
    //    buttonImage: $path+"public/img/calendar.gif",
    //    buttonImageOnly: true,
    //    buttonText: "Выберите дату.",
    //    dateFormat: "mm-dd-yy"
    //});
    //=================================================
    $(document).on('click', '.btnDelItem', function (){
        $this = $(this);
        //var $delId = $(this).data('iddel');
        //var $test = $(this).closest('.boxChatLinks').find('.btnSubDelItem').data('iddel');
        var $idGroup = $this.closest('.sort').find('.boxChatName').data('group');
        var $sname = $this.closest('.sort').find('.boxChatMusic').attr('title');
        console.log($idGroup);
        if (confirm("Удалить на всегда: "+$sname+" ?"))
        {
            $('.songsMenu').fadeOut('fast');
            $.ajax({
                data: "id="+$idGroup,
                type: "POST",
                url: $path+"main/del_item/"+$idGroup,
                success: function ($data) {
                    showDBAnswer('.showMsg', 'slow', 5000, "Message delate.", $data);
                    location.reload();
                }
            });
        }
        return false;
    });
    //=================================================
    $(document).on('click', '.btnSubDelItem', function (){
        $this = $(this);
        var $delId = $(this).data('iddel');
        var sname = $this.prev().prev().find('.txt').text();
        if(confirm("Удалить на всегда: "+sname+" ?"))
            $.ajax({
                data: "link_id="+$delId,
                type: "POST",
                url: $path+"main/sub_del_item/"+$delId,
                success: function ($data) {
                    $this.prev().prev().remove();
                    $this.prev().remove();
                    $this.next().remove();
                    $this.remove();
                    showDBAnswer('.showMsg', 'slow', 5000, "Message delate.", $data);
                }
            });
        return false;
    });
    //=================================================
    $(document).on('click', '.editItemTempClose, .editItemTempBgBlack', function () {
        $this.closest('.box').find('.editItemTemp').fadeOut('400');
        $this.closest('.box').find('.editItemTempBgBlack').fadeOut('400');
        $this.closest('.box').find('.editItemName').fadeOut('400');
    });
    //=================================================
    $(document).on('click', '.btnReloadPage', function () {
        location.reload();
    });
    //=================================================
    $(document).on('click', '.btnChatAddLink', function (){
        $this = $(this);
        var $group = $(this).closest('.sort').find('.boxChatName').data('group');

        var $temp = "<div class='link' data-gr='"+$group+"'><input class='add_songs' name='add_songs' placeholder='Name' type='text' /><input class='add_link' name='add_link' placeholder='URL' type='text' /><span class='btnSaveLink' title='Save songs'><i class='fa fa-floppy-o'></i> Save note</span></div><div class='clear'></div>";
        $(this).closest('.sort').find('.boxChatLinks').prepend($temp);
        $('.songsMenu').fadeOut('fast');
        //$('.btnReloadPage').fadeIn('slow');
    });
    //=================================================
    $(document).on('click', '.btnSaveLink', function (){
        $this = $(this);
        var $group = $(this).closest('.sort').find('.boxChatName').data('group');
        var $songName = $(this).closest('.link').find('.add_songs').val();
        var $songLink = $(this).closest('.link').find('.add_link').val();

        $.ajax({
            data: "link_url="+$songLink+"&link_name="+$songName+"&link_group="+$group,
            type: "POST",
            url: $path+"main/add_new_link/"+$group,
            success: function ($data) {
                if(!$data) {
                    if ($songLink != "") {
                        $this.closest('.sort').find('.boxChatLinks').prepend("<a href='"+$songLink+"' class='boxChatMusic dBlock' data-group='"+$group+"' target='_blank' title='"+$songName+"'><span class='txt'>"+$songName+"</span></a><span class='btnSubEditItem' data-name='"+$songName+"' data-url='"+$songLink+"' data-iddel='"+$group+"' title='Edit -> ID: "+$group+", Имя: "+$songName+", Песня: "+$songName+"'><i class='fa fa-pencil-square-o'></i></span><span class='btnSubDelItem' data-iddel='"+$group+"' title='ID: "+$group+", Имя: "+$songName+", Песня: "+$songName+"'><i class='fa fa-trash'></i></span><span class='clear'></span>\n\r");
                        $this.closest('.link').remove();
                        $('.btnChatAddLink').css({'display':'block'});
                        showDBAnswer('.showMsg', 'slow', 5000, "Link save.", $data);
                    } else {
                        $this.closest('.sort').find('.boxChatLinks').prepend("<span class='boxChatMusic dBlock' data-group='"+$group+"' title='"+$songName+"'><span class='txt'>"+$songName+"</span></span><span class='btnSubEditItem' data-name='"+$songName+"' data-url='"+$songLink+"' data-iddel='"+$group+"' title='Edit -> ID: "+$group+", Имя: "+$songName+", Песня: "+$songName+"'><i class='fa fa-pencil-square-o'></i></span><span class='btnSubDelItem' data-iddel='"+$group+"' title='ID: "+$group+", Имя: "+$songName+", Песня: "+$songName+"'><i class='fa fa-trash'></i></span><span class='clear'></span>\n\r");
                        $this.closest('.link').remove();
                        $('.btnChatAddLink').css({'display':'block'});
                        showDBAnswer('.showMsg', 'slow', 5000, "Link save.", $data);

                    }
                    //$this.closest('.sort').find('.boxChatLinks').prepend("<a href='"+$songLink+"' class='boxChatMusic dBlock' data-group='"+$group+"' target='_blank' title='"+$songName+"'><span class='txt'>"+$songName+"</span></a><span class='btnSubEditItem' data-name='"+$songName+"' data-url='"+$songLink+"' data-iddel='"+$group+"' title='Edit -> ID: "+$group+", Имя: "+$songName+", Песня: "+$songName+"'><i class='fa fa-pencil-square-o'></i></span><span class='btnSubDelItem' data-iddel='"+$group+"' title='ID: "+$group+", Имя: "+$songName+", Песня: "+$songName+"'><i class='fa fa-trash'></i></span><span class='clear'></span>\n\r");
                    //$this.closest('.link').remove();
                    //$('.btnChatAddLink').css({'display':'block'});
                    //showDBAnswer('.showMsg', 'slow', 5000, "Link save.", $data);
                } else {
                    showDBAnswer('.showMsg', 'slow', 5000, "Link not save.", $data);
                }
            }
        });
    });
    //=================================================
    $(document).on('click', '.btnSaveLinkEdit', function (e){
        $this = $(this);
        var $group = $(this).closest('.editItemTemp').data('group');
        var $songId = $(this).closest('.editItemTemp').data('songid');
        var $songName = $(this).closest('.editItemTemp').find('.add_songs').val();
        var $songLink = $(this).closest('.editItemTemp').find('.add_link').val();

        $songLink = encodeURIComponent($songLink);

        // Для обхода Амперсанда можно сделать или функцию выше или в поле дата сделать json формат {var1: 'preved ', var2: 'medved '}

        $.ajax({
            data: "link_id="+$songId+"&link_url="+$songLink+"&link_name="+$songName+"&link_group="+$group,
            type: "POST",
            url: $path+"main/updateEditLink/",
            success: function ($data) {
                if(!$data) {
                    $this.closest('.box').find('.editItemTemp').fadeOut('400');
                    $this.closest('.box').find('.editItemTempBgBlack').fadeOut('400');
                    showDBAnswer('.showMsg', 'slow', 5000, "Link save.", $data);
                    location.reload();
                    return false;
                } else {
                    showDBAnswer('.showMsg', 'slow', 5000, "Link not save.", $data);
                }
            }
        });

    });
    //=================================================
    var itemName;
    var itemId;
    $(document).on('click', '.btnSaveLinkEditName', function (){
        $this = $(this);

        itemName = $(this).prev().val();
        itemId = $(this).prev().data('ide');

        //console.log(_itemName);
        //console.log(_itemId);

        //var $group = $(this).closest('.editItemTemp').data('group');
        //var $songId = $(this).closest('.editItemTemp').data('songid');
        //var $songName = $(this).closest('.editItemTemp').find('.add_songs').val();
        //var $songLink = $(this).closest('.editItemTemp').find('.add_link').val();

        $.ajax({
            data: "music=" + itemName + "&id=" + itemId,
            type: "POST",
            url: $path+"main/update_edit_name/",
            success: function ($data) {
                if(!$data) {
                    $this.closest('.box').find('.editItemTemp').fadeOut('400');
                    $this.closest('.box').find('.editItemTempBgBlack').fadeOut('400');
                    showDBAnswer('.showMsg', 'slow', 5000, "Song name change.", $data);
                    location.reload();
                    return false;
                } else {
                    showDBAnswer('.showMsg', 'slow', 5000, "Song name not change.", $data);
                }
            }
        });
    });
    //=================================================
    $(document).on('click', '.btnSubEditItem', function (e) {
        $this = $(this);
        var $group = $(this).closest('.sort').find('.boxChatName').data('group');
        var $songName = $(this).prev().find('.txt').text();
        var $songLink = $(this).prev().attr('href');
        var $songId = $this.data('iddel');

        var $groupNew = $this.closest('.box').find('.editItemTemp').attr('data-group', $group);
        var $groupNew = $this.closest('.box').find('.editItemTemp').attr('data-songid', $songId);
        var $songNameNew =$this.closest('.box').find('.editItemTemp input.add_songs').val($songName);
        var $songLinkNew =$this.closest('.box').find('.editItemTemp input.add_link').val($songLink);

        $this.closest('.box').find('.editItemTemp').fadeIn('400');
        $this.closest('.box').find('.editItemTempBgBlack').fadeIn('400');

        e.preventDefault();
    });
    //=================================================
    $(document).on('click', '.btnEditItem', function (e) {
        $this = $(this);
        var _itemName = $(this).closest('.sort').find('.boxChatMusicShowTxt').text();
        var _itemId = $(this).data('ided');
        console.log(_itemName);
        console.log(_itemId);

        $(this).closest('.box').find('.editItemName input.itemName').val(_itemName);
        $(this).closest('.box').find('.editItemName input.itemName').attr('data-ide', _itemId);

        $this.closest('.box').find('.editItemName').fadeIn('400');
        $this.closest('.box').find('.editItemTempBgBlack').fadeIn('400');
        $('.songsMenu').fadeOut('fast');

        e.preventDefault();
    });
    //=================================================
    $(document).on('click', '.btnSend', function () {

        var $boxName = $('.usrBarTxtName').text();
        var $boxMusic = $(this).closest('.boxSend').find('.boxSendMusic').val();
        var $uk = $(this).data('uk');

        var $grp = $(this).data('grp') + 1;
        var regexp = /[a-zA-zа-яА-Я]/i;
        $query = "name="+$boxName+"&music="+$boxMusic+"&s_group="+$grp+"&s_key="+$uk;

        console.log($query);

        if ($boxName == "" || $boxMusic == "") {

            showDBAnswer('.showMsg', 'slow', 5000, "Message not send, write all fields!", $boxName);
        } else {

            $.ajax({
                type: "POST",
                url: $path+"main/insert_item",
                data: $query,
                success: function ($data) {
                    if(!$data){
                        showDBAnswer('.showMsg', 'slow', 5000, "Message send.", $data);
                        $.cookie('name', $boxName);
                        $.cookie('song', $boxMusic);
                        location.reload();
                    } else {
                        showDBAnswer('.showMsg', 'slow', 5000, "Message not send.", $data);

                    }
                }
            });
        }
        return false;
    });
    //=================================================
    //=================================================
    $(document).on('click', '.putToArchive', function () {
        var $this = $(this);
        //var _author = $(this).closest('.sort').find('.boxChatName').text();
        var _name = $(this).closest('.sort').find('.boxChatMusicShowTxt').text();
        var _id = $(this).data('idarchive');

        if (confirm ("Really put in archive: " + _name + " ?")) {
            $('.songsMenu').fadeOut('fast');
            $.ajax({
                url: $path + "main/put_to_archive/",
                data: "id="+_id,
                dataType: "text",
                type: "POST",
                success: function ($data) {
                    console.log($data);
                    if ($data == "") {
                        $this.closest('.sort').remove();
                        showDBAnswer('.showMsg', 'slow', 5000, "Song put in archive.", $data);
                    } else {
                        showDBAnswer('.showMsg', 'slow', 5000, "Song don`t put in archive.", $data);
                    }
                }
            });
        } else {
            return false;
        }

    });
    //=================================================
   $(document).on('click', '.btnReturnInMain', function () {
      var $this = $(this);
      var $archiveId = $(this).data('group');
      var _name = $(this).closest('.sort').find('.boxChatMusicShowTxt').text();

      console.log($archiveId);

       if (confirm("Really return to main page, song: " + _name + " ?")) {
           $.ajax({
             url: $path + "main/return_to_main/",
             data: "s_g=" + $archiveId,
             dataType: "text",
             type: "POST",
             success: function ($data) {
                console.log($data);
                if ($data == "") {
                    $this.closest('.sort').remove();
                    showDBAnswer('.showMsg', 'slow', 5000, "Song return to main.", $data);
                } else {
                    showDBAnswer('.showMsg', 'slow', 5000, "Song not return.", $data);
                }
             },
             error: function(data, errorThrown){
                console.log(errorThrown);
             }
           });
       } else {
        return false;
       }
   });
//=================================================
    $(".settingBoxSongsBtn").bind("click", event_click);
//=================================================
    $(document).on('click', '.btnAddToSing', function (){
        $this = $(this);
        var $idTT = $this.closest('.sort').data('id');
        var $selS = 1;
        var $conteiner = $this.parents('.sort').css({'background':'#877048'});

        $this.parents('.songsMenu').fadeOut('fast');
        $('.boxSing').append($conteiner);
        $('.btnAddToSing').addClass('dispOff');

        //$('.boxSing').find('.btnAddToSing').addClass('dispOn').removeClass('dispOff');
        var $bxSsM = $('.boxSing').find('.songsMenu');
        $bxSsM.prepend("<span class='btnTrnBack' title='Turn back'><i class='fa fa-reply'></i> Turn back</span>");
        console.log($path);

        $.ajax({
            url: $path + "main/set_song/",
            data: "select_songs=" + $selS + "&id=" + $idTT,
            dataType: "text",
            type: "POST",
            success: function ($data) {
                //if ($data == "") {
                //    showDBAnswer('.showMsg', 'slow', 5000, "Song add to sing.", $data);
                //} else {
                //    showDBAnswer('.showMsg', 'slow', 5000, "Song don`t add to sing.", $data);
                //}
            }
        });

    });
//=================================================
    $(document).on('click', '.btnTrnBack', function (){
        $this = $(this);
        var $idTrnB = $this.closest('.sort').data('id');
        var $selS = 0;
        var $conteiner = $this.parents('.sort').css({'background':'rgba(66, 53, 131, 0.64) none repeat scroll 0% 0%'});
        $this.addClass('dispOff');

        $this.parents('.songsMenu').fadeOut('fast');
        $('.boxChat').prepend($conteiner);
        $('.btnAddToSing').addClass('dispOn').removeClass('dispOff');
        console.log($path);


        $.ajax({
            url: $path + "main/set_song/",
            data: "select_songs=" + $selS + "&id=" + $idTrnB,
            dataType: "text",
            type: "POST",
            success: function ($data) {
                //if ($data == "") {
                //    showDBAnswer('.showMsg', 'slow', 5000, "Song return to main.", $data);
                //} else {
                //    showDBAnswer('.showMsg', 'slow', 5000, "Song don`t return to main.", $data);
                //}
            }
        });
        //$('.boxSing').find('.btnAddToSing').addClass('dispOn').removeClass('dispOff');
        //var $bxSsM = $('.boxSing').find('.songsMenu');
        //$bxSsM.prepend("<span class='btnTrnBack' title='Turn back'><i class='fa fa-reply'></i> Turn back</span>");

    });
//=================================================
//    http://on-line-teaching.com/js/js.events.keyboard.htm
    $(document).on('click', '.boxProfileSongsBoxTxt', function (e) {
       $this = $(this);
        var $usrName = $('.profileUsrName').text();
        $this.next().slideToggle('fast', function(){
            if ($('.boxProfileSongsBox').css('display') == "block") {
                console.log('true');
                    $.ajax({
                        url: $path + "main/get_count_for_profile/",
                        data: "name=" + $usrName,
                        dataType: "json",
                        type: "POST",
                        success: function ($count) {
                            console.log($count);
                        }
                    });
            } else {
                console.log('false');
            }
        });
    });
//=================================================
    var $this,
        $valInputE,
        $valInputP,
        $userID = $('.boxProfile').data('userid'), //PAGE PROFILE [userID]
        $testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i,
        $valUser = $('.profileUsrName').text();
    //var $testPassw = /^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%^&+=.\-_*])([a-zA-Z0-9@#$%^&+=*.\-_]){3,}$/;

    $(document).on('click', '.profileSaveEmailBtn', function(e) {
        $this = $(this);
        $valInputE = $this.next().val();

        if ($testEmail.test($valInputE)) {
            $.ajax({
                url: $path + "main/save_email/",
                data: "email=" + $valInputE + "&u_key=" + $userID,
                dataType: "text",
                type: "POST",
                success: function ($data) {
                    if ($data == "1") {
                        showDBAnswer('.showMsg', 'slow', 5000, "Email save.", $data);
                    } else {
                        showDBAnswer('.showMsg', 'slow', 5000, "Email not save.", $data);
                    }
                }
            });
        } else {
            showDBAnswer('.showMsg', 'slow', 5000, "Wrong email.", 0);
            checkEmptyEmail($(".boxProfile > input[type='email']").val(), " Write your e-mail, if you have in future restore you password.", '.showMsg');
        }
    });
//=================================================
    $(document).on('click', '.profileChgPassBtn', function(){
        $this = $(this);
        $valInputP = $('.profileChgPass').val();
        $valInputE = $('.profileSaveEmailBtn').next().val();
        console.log($valInputP, $valInputE, $userID, $valUser);
        if(confirm("Do you really change password ?")) {
            if ($valInputP != '') {
                $.ajax({
                    url: $path + "main/change_passwd/",
                    data: "email=" + $valInputE + "&u_pass=" + $valInputP + "&u_key=" + $userID + "&u_name=" + $valUser,
                    dataType: "text",
                    type: "POST",
                    success: function ($data) {
                        console.log($data);
                        showDBAnswer('.showMsg', 'slow', 5000, "You password restore and send to: '" + $valInputE + "'.", $data);
                    }

                });
            } else {
                showDBAnswer('.showMsg', 'slow', 5000, "Empty password.", 0);
            }
        }
    });
//=================================================
//===================CHECK EMAIL IN PAGE PROTFOLIO==============================
    checkEmptyEmail($(".boxProfile > input[type='email']").val(), " Write your e-mail, if you have in future restore you password.", '.showMsg');
//=================================================
//    RESTORE BLOCK
    $('.boxCheckRestoreBtn').on('click', function(){
        $this = $(this);

        $valInputE = $('.boxCheckRestoreEmail').val();

        //if ($valInputE == "") {
        //    $('.showMsgRestore').text("Email empty.");
        //}
        if (confirm("Really restore you password ? ")) {
            if ($testEmail.test($valInputE)) {
                if (confirm("You new password send to: " + $valInputE + " , confirm this action ? ")) {
                    $.ajax({
                        url: $path + "start/restore_pwd/",
                        data: "email=" + $valInputE,
                        dataType: "json",
                        type: "POST",
                        success: function ($data) {
                            console.log($data);
                            if ($data == 1) {
                                $('.boxCheckRestore').fadeOut('600');
                                $('.boxCheckRestoreBg').fadeOut('800');
                                $('.showMsgRestore').text("");
                                $('.boxCheckRestoreEmail').val("");
                                $('.showMsgMail')
                                    .fadeIn('800').text("Password generate and send to: " + $valInputE + " . Check you mail.");
                            }
                        }
                    });
                }
            } else {
                $('.showMsgRestore').css({'color': 'white'}).text("Wrong email.");
            }
        }
    });

    $('.boxCheckRestoreBtnClose').on('click', function (){
        $('.boxCheckRestore').fadeOut('600');
        $('.boxCheckRestoreBg').fadeOut('800');
        $('.showMsgRestore').text("");
        $('.boxCheckRestoreEmail').val("");
        $(".header, .boxCheckSend, .boxFooter").css({"filter": "blur(0px) grayscale(0%)"});
    });

    $('.btnCheckRestoreStart').on('click', function(){
        $('.boxCheckRestoreBg').fadeIn('800');
        $('.boxCheckRestore').fadeIn('600');
        $('.showMsgRestore').text("");
        $('.boxCheckRestoreEmail').val("");
        $(".header, .boxCheckSend, .boxFooter").css({"filter": "blur(2px) grayscale(90%)"});
    });
    $('.boxCheckRestoreBg').on('click', function(){
        $('.boxCheckRestore').fadeOut('600');
        $(this).fadeOut('800');
        $('.showMsgRestore').text("");
        $('.boxCheckRestoreEmail').val("");
        $(".header, .boxCheckSend, .boxFooter").css({"filter": "blur(0px) grayscale(0%)"});
    });
//=================================================
    $(document).on('click', '.boxProfileAttentionNewSong', function(){
       $this = $(this);
        var $checkNewSong = $this.find("input[type='checkbox']");
        if(confirm("Enable/Disabled attention for new song ?")) {
            if ($checkNewSong.prop( "checked" ) ) {
                console.log('true');
                $checkNewSong.removeProp("checked");
                //$userID
                $.ajax({
                    url: $path + "main/attention_new_song_update/",
                    data: "u_key=" + $userID + "&u_attentionNewSong=0",
                    dataType: "text",
                    type: "POST",
                    success: function($data) {
                        console.log($data);
                    }
                });
            } else {
                console.log('false');
                $checkNewSong.prop({"checked":"checked"});

                $.ajax({
                    url: $path + "main/attention_new_song_update/",
                    data: "u_key=" + $userID + "&u_attentionNewSong=1",
                    dataType: "text",
                    type: "POST",
                    success: function($data) {
                        console.log($data);
                    }
                });
            }
        }
    });
//=================================================
//==================Profile Avatar===============================
    $(document).on('click', '.avatarBodyAdd', function(){
        $('.boxAvatarUpload').fadeIn("800");

    });
    $(document).on('click', '.boxAvatarUploadClose', function(){
        $('.boxAvatarUpload').fadeOut("800");
    });
//=================================================
//=================================================
//=================================================
});
//=================================================
//$(document).on('click', '.settingBoxSongsBtn', function (event){
//    $this = $(this);
//
//    $(this).closest('.sort').find('.songsMenu').fadeIn('normal');
//
//});
////=================================================
//$(document).on('click', '.btnSongsMenuClose', function (){
//    $this = $(this);
//
//    $(this).closest('.sort').find('.songsMenu').fadeOut('normal');
//
//});
//=================================================//=================================================
//$(document).on('click', '.settingBoxSongsBtn', function (){
//    $this = $(this);
//
//    $(this).css({'display' : 'none'});
//    $(this).closest('.sort').find('.songsMenu').fadeIn('normal');
//
//});
//=================================================//=================================================
//$(document).on('click', '.settingBoxSongsBtn', function (){
//    $this = $(this);
//
//    $(this).css({'display' : 'none'});
//    $(this).closest('.sort').find('.songsMenu').fadeIn('normal');
//
//});
//=================================================
//$(document).on('mouseleave', '.songsMenu', function () {
//    $(this).css({'display' : 'none'});
//    $(this).closest('.sort').find('.settingBoxSongsBtn').css({'display' : 'block'});
//});

//=================================================
// $(document).on('click', '.ratingUp', function () {
//     var $this = $(this);

//     var $id = $(this).closest('.rating').prev().data('iddel');
//     var $rUp = +$(this).closest('.rating').attr('data-rating');
//     if ($rUp >= 9) {
//         $(this).closest('.rating').attr('data-rating', '0');
//     } else {
//         $rUp = $rUp + 1;
//     }
//     var $idNow;
//     var $tmp;
//     //console.log($rUp);
//     //console.log($id);
//     var _app = $this.closest('.rating');
//     console.log($rUp);
//     $.ajax({
//         url: $path + "main/update_rating/",
//         data: "rating="+$rUp+"&id="+$id,
//         dataType: "json",
//         type: "POST",
//         success: function ($result) {

//             console.log($result[0]['rating']);
//             $idNow = $result[0]['rating'];
//             $this.closest('.rating').attr('data-rating', $idNow);
//             //В attr записать новую дату
//             if ($idNow >= 9) {
//                 $this.closest('.rating').attr('data-rating', '9');
//                 showDBAnswer('.showMsg', 'slow', 5000, "Rating maximum.", $result);
//             } else {
//                 showStar($idNow, _app, '._rat');
//                 showDBAnswer('.showMsg', 'slow', 5000, "Rating add.", $result);
//             }
//         }
//     });

// });
// //=================================================
// $(document).on('click', '.ratingDown', function () {
//     var $this = $(this);

//     var $id = $(this).closest('.rating').prev().data('iddel');
//     var $rDown = +$(this).closest('.rating').attr('data-rating');
//     if ($rDown <= 0) {
//         $(this).closest('.rating').attr('data-rating', '0');
//     } else {
//         $rDown = $rDown - 1;
//     }

//     var $idNow;
//     var $tmp;
//     //console.log($rUp);
//     //console.log($id);
//     var _app = $this.closest('.rating');

//     $.ajax({
//         url: $path + "main/update_rating/",
//         data: "rating="+$rDown+"&id="+$id,
//         dataType: "json",
//         type: "POST",
//         success: function ($result) {

//             console.log($result[0]['rating']);
//             $idNow = $result[0]['rating'];
//             $this.closest('.rating').attr('data-rating', $idNow);

//             //В attr записать новую дату

//             if ($idNow <= 0) {
//                 $this.closest('.rating').attr('data-rating', '0');
//                 showDBAnswer('.showMsg', 'slow', 5000, "Rating minimum.", $result);
//             } else {
//                 showStar($idNow, _app, '._rat');
//                 showDBAnswer('.showMsg', 'slow', 5000, "Rating subtraction.", $result);
//             }
//         }
//     });

// });



//
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//
//function set_top_autorize_form_handler(e){
//    $(".aget_form_init .agent_enter").unbind("click.ck_top_autorize_form");
//
//    $(".aget_form_init .agent_form").slideToggle("fast", function(){
//
//        $(window).bind("click.ck_top_autorize_form_w", function(e){
//            if($(e.target).parents(".aget_form_init .agent_form").size()==0){
//                $(window).unbind("click.ck_top_autorize_form_w");
//
//                $(".aget_form_init .agent_form").slideToggle("fast", function(){
//                    $(".aget_form_init .agent_enter").bind("click.ck_top_autorize_form", set_top_autorize_form_handler);
//                });
//                e.preventDefault();
//
//            }
//        });
//
//    });
//    //			return false;
//    e.preventDefault();
//}
//$(function () {
//    $(".aget_form_init .agent_enter").bind("click.ck_top_autorize_form", set_top_autorize_form_handler);
//});
