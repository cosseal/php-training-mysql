<?php
if(isset($_GET["off"])) {
    session_start();
    unset($_SESSION["connecte"]);
    header("Location:read.php");
}
