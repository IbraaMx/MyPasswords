<?php
//session_start();
if(!isset($_SESSTION['user'])) {
    header('Location: login.php');
}