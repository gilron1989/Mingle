<?php
    require_once('init.php');

    $urlContents=file_get_contents('php://input');
    $urlarray = json_decode($urlContents,true);

    $status = $urlarray['status'];
    $meetingId = $urlarray['meetingId'];

    if($status == 'waiting'){
        $status = 1;
    }else{
        $status = 0;
    }

    global $database;
    $sql = "UPDATE subject SET status = '".$status."' WHERE meetingId = '".$meetingId."'";
    //$sql = "UPDATE subject SET status = '1' WHERE meetingId = 81012147084";
    
    $result=$database->query($sql);
?>