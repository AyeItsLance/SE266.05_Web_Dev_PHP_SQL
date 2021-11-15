<?php
    // delete the session info and redirect to login.php


    //unsetting all the sessions and then destroying them once clicked

    session_unset();

    session_destroy();

    header('Location: index.php');

?>