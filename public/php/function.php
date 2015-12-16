<?php
//function showRating ($valRat)
//{
//    switch ($valRat)
//    {
//        case 0:
//            echo "<div class='rating' data-rating='$valRat'><span class='ratingUp'><i class='fa fa-thumbs-up'></i></span><span class='ratingDown'><i class='fa fa-thumbs-down'></i></span><div class='_rat'><i class='fa fa-star-half'></i></div></div>";
//            break;
//        case 1:
//            echo "<div class='rating' data-rating='$valRat'><span class='ratingUp'><i class='fa fa-thumbs-up'></i></span><span class='ratingDown'><i class='fa fa-thumbs-down'></i></span><div class='_rat'><i class='fa fa-star'></i></div></div>";
//            break;
//        case 2:
//            echo "<div class='rating' data-rating='$valRat'><span class='ratingUp'><i class='fa fa-thumbs-up'></i></span><span class='ratingDown'><i class='fa fa-thumbs-down'></i></span><div class='_rat'><i class='fa fa-star'></i><i class='fa fa-star-half'></i></div></div>";
//            break;
//        case 3:
//            echo "<div class='rating' data-rating='$valRat'><span class='ratingUp'><i class='fa fa-thumbs-up'></i></span><span class='ratingDown'><i class='fa fa-thumbs-down'></i></span><div class='_rat'><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star-half'></i></div></div>";
//            break;
//        case 4:
//            echo "<div class='rating' data-rating='$valRat'><span class='ratingUp'><i class='fa fa-thumbs-up'></i></span><span class='ratingDown'><i class='fa fa-thumbs-down'></i></span><div class='_rat'><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star-half'></i></div></div>";
//            break;
//        case 5:
//            echo "<div class='rating' data-rating='$valRat'><span class='ratingUp'><i class='fa fa-thumbs-up'></i></span><span class='ratingDown'><i class='fa fa-thumbs-down'></i></span><div class='_rat'><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star-half'></i></div></div>";
//            break;
//        case 6:
//            echo "<div class='rating' data-rating='$valRat'><span class='ratingUp'><i class='fa fa-thumbs-up'></i></span><span class='ratingDown'><i class='fa fa-thumbs-down'></i></span><div class='_rat'><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star-half'></i></div></div>";
//            break;
//        case 7:
//            echo "<div class='rating' data-rating='$valRat'><span class='ratingUp'><i class='fa fa-thumbs-up'></i></span><span class='ratingDown'><i class='fa fa-thumbs-down'></i></span><div class='_rat'><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star-half'></i></div></div>";
//            break;
//        case 8:
//            echo "<div class='rating' data-rating='$valRat'><span class='ratingUp'><i class='fa fa-thumbs-up'></i></span><span class='ratingDown'><i class='fa fa-thumbs-down'></i></span><div class='_rat'><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star-half'></i></div></div>";
//            break;
//        case 9:
//            echo "<div class='rating' data-rating='$valRat'><span class='ratingUp'><i class='fa fa-thumbs-up'></i></span><span class='ratingDown'><i class='fa fa-thumbs-down'></i></span><div class='_rat'><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i></div></div>";
//            break;
//        default:
//            echo "<div class='rating' data-rating='$valRat'><span class='ratingUp'><i class='fa fa-thumbs-up'></i></span><span class='ratingDown'><i class='fa fa-thumbs-down'></i></span><div class='_rat'><i class='fa fa-star-half'></i></div></div>";
//    }
//}
//function showRatingArchive ($valRat)
//{
//    switch ($valRat)
//    {
//        case 0:
//            echo "<div class='rating' data-rating='$valRat'><div class='_rat'><i class='fa fa-star-half'></i></div></div>";
//            break;
//        case 1:
//            echo "<div class='rating' data-rating='$valRat'><div class='_rat'><i class='fa fa-star'></i></div></div>";
//            break;
//        case 2:
//            echo "<div class='rating' data-rating='$valRat'><div class='_rat'><i class='fa fa-star'></i><i class='fa fa-star-half'></i></div></div>";
//            break;
//        case 3:
//            echo "<div class='rating' data-rating='$valRat'><div class='_rat'><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star-half'></i></div></div>";
//            break;
//        case 4:
//            echo "<div class='rating' data-rating='$valRat'><div class='_rat'><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star-half'></i></div></div>";
//            break;
//        case 5:
//            echo "<div class='rating' data-rating='$valRat'><div class='_rat'><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star-half'></i></div></div>";
//            break;
//        case 6:
//            echo "<div class='rating' data-rating='$valRat'><div class='_rat'><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star-half'></i></div></div>";
//            break;
//        case 7:
//            echo "<div class='rating' data-rating='$valRat'><div class='_rat'><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star-half'></i></div></div>";
//            break;
//        case 8:
//            echo "<div class='rating' data-rating='$valRat'><div class='_rat'><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star-half'></i></div></div>";
//            break;
//        case 9:
//            echo "<div class='rating' data-rating='$valRat'><div class='_rat'><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i></div></div>";
//            break;
//        default:
//            echo "<div class='rating' data-rating='$valRat'><div class='_rat'><i class='fa fa-star-half'></i></div></div>";
//    }
//}

function checkStatusAgentL2($statusAgent) {
    if (preg_match("/firefox/i", $statusAgent)) {
        echo "<i class='fa fa-firefox fa-lg'></i>";
    } elseif (preg_match("/safari/i", $statusAgent)) {
        echo "<i class='fa fa-safari fa-lg'></i>";
    } elseif (preg_match("/opr/i", $statusAgent)) {
        echo "<i class='fa fa-opera fa-lg'></i>";
    } elseif (preg_match("/chrome/i", $statusAgent)) {
        echo "<i class='fa fa-chrome fa-lg'></i>";
    } elseif (preg_match("/internet-explorer/i", $statusAgent)) {
        echo "<i class='fa fa-internet-explorer fa-lg'></i>";
    }
}
function checkStatusAgent($statusAgent) {
    if (preg_match("/linux/i", $statusAgent)) {
        echo "<span class='usrBarConfiguration'><i class='fa fa-linux fa-lg'></i>";
        checkStatusAgentL2($statusAgent);
        echo "</span>";
    } elseif(preg_match("/windows/i", $statusAgent)) {
        echo "<span class='usrBarConfiguration'><i class='fa fa-windows fa-lg'></i>";
        checkStatusAgentL2($statusAgent);
        echo "</span>";
    }
}

// AVATAR Function

function showAvatar($src, $size, $position, $empty = 0) {
    $imgAHead = "<div class='boxAvatarControl'><img class='avatar" . $position . "' src='" . $src . "' width='" . $size . "' height='" . $size . "' alt=''></div>";

//    $imgABodyDef = "<div class='boxAvatarControl'>";
//    $imgABodyDef .= "<img class='avatar" . $position . "' src='" . $src . "' width='" . $size . "' height='" . $size . "' alt=''>";
//    $imgABodyDef .= "<span class='avatar" . $position . "Close'><i class='fa fa-times'></i></span>";
//    $imgABodyDef .= "</div>";


    $imgABody = "<div class='boxAvatarControl'>";
    $imgABody .= "<img class='avatar" . $position . "' src='" . $src . "' width='" . $size . "' height='" . $size . "' alt=''>";
    $imgABody .= "<span class='avatar" . $position . "Add'>Add avatar</span>";
    $imgABody .= "<span class='avatar" . $position . "Close'><i class='fa fa-times'></i></span>";
    $imgABody .= "</div>";

    if ($position == "Header") {
        echo $imgAHead;
    } elseif ($position == "Body") {
        if ($empty == 1) {
            echo $imgABody;
        } else {
            echo $imgABody;
        }
    }
}

function checkAvatar($url, $array, $position) {
    $img_profile = $url."/public/img/avatar/".$_SESSION['user_name']."/".$array[0]['u_pic'];
    $img_profile_default = $url."/public/img/default_avatar.jpg";

    if ($position == "Header") {
        if (!empty($array[0]['u_pic'])) {
            showAvatar($img_profile, 30, $position);
        } else {
            showAvatar($img_profile_default, 30, $position);
        }
    } elseif ($position == "Body") {
        if (!empty($array[0]['u_pic'])) {
            showAvatar($img_profile, 100, $position, 1);
        } else {
            showAvatar($img_profile_default, 100, $position, 0);
        }
    }
}
?>