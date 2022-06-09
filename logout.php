<?php

    session_start();
    session_unset();
    session_destroy();
    header('location:home');
    //session_unset($_SESSION['$emailid']);

?>
