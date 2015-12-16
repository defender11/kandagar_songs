    <?php
        krsort($chat);
        foreach ($chat as $item) {
            echo "<p> <i class='fa fa-comments-o'></i> <span class='boxChatName'>{$item['name']}: </span> <a href='http://{$item['url']}' class='boxChatMusic' target='_blank' title='{$item['music']}'><span >{$item['music']}</span></a>\n\r<br /><span class='boxChatAbout'>{$item['about']}</span><span class='boxchatDateAdd'><i class='fa fa-clock-o'></i> Дата сообщения: {$item['dt_add']}</span>&nbsp;&nbsp;&nbsp;&nbsp;<span class='boxchatDateAdd'><i class='fa fa-users'></i> Дата выполнения: {$item['dt_run']}</span>&nbsp;&nbsp;&nbsp;<span class='btnDelItem' data-iddel='".$item['id']."' title='ID: {$item['id']}, Имя: {$item['name']}, Песня: {$item['music']}'><i class='fa fa-trash'></i></span></p>\n\r";
        }
    ?>