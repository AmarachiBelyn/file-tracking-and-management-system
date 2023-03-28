<?php
include('inc/config.php');
function login()
{
    if (isset($_SESSION['super admin'])) {
        return true;
    } elseif (isset($_SESSION['admin'])) {
        return true;
    } elseif (isset($_SESSION['user'])) {
        return true;
    }
}
