<?php
    require_once('init.php');

    $session->logout();
    header('Location: index.php');
?>