<?php
include 'config/config.php';
header('Content-Type: application/json');
if(isset($_GET['u']) ){
    $user = $_GET['u'];
    $ch = curl_init();
    $url = "http://api.bestfriendstore.net/web/get/back?token=" . $token . "&domain=" . $domain ."&app=".$app. "&email=" . $user;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);
    if ($result != "Your License is valid / Expired Thank you") {
        echo $result;
    } else {
        print_r("Your License is valid / Expired Thank you");
        exit();
    }
}
elseif($_GET['i']!=null || $_GET['i']!="" || isset($_GET['i'])){
    $link = $_GET['i'];
    $ch = curl_init();
    $url = "http://api.bestfriendstore.net/web/get/img?token=" . $token . "&domain=" . $domain ."&app=".$app. "&u=" . $link;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);
    if ($result != "Your License is valid / Expired Thank you") {
        $ss=json_decode($result);
            print_r($ss);
            exit();

    } else {
        print_r("Your License is valid / Expired Thank you");
        exit();
    }

}