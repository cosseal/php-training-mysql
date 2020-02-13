<?php


function authentification ()
{
    if(session_status() === PHP_SESSION_NONE)
    {
        session_start();
    }
    return true;
}


function connexion()
{
    if(!authentification()){
        header("Location:login.php");
        exit();
    }
}