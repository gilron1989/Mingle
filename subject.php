<?php
    require_once('init.php');

    $urlContents=file_get_contents('php://input');
    $urlarray = json_decode($urlContents,true);

    $url = $urlarray['url'];
    $meetingID = $urlarray['meetingID'];
    $subject = $urlarray['subject'];


    global $database;
    $sql = "UPDATE subject SET url = '".$url."', meetingId = '".$meetingID."' WHERE subject = '".$subject."'";

    $result=$database->query($sql);

?>