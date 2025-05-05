<?php
    session_start();
    require "includes/functions.php";
    /*
        decide what page to load depending on the url the user visit

        pages routes:

        localhost:9002/ -> home.php
        localhost:9002/login -> login.php
        localhost:9002/signup -> signup.php
        localhost:9002/logout -> logout.php

        action routes:

        localhost:9002/auth/login -> includes/auth/do_login.php
        localhost:9002/auth/signup -> includes/auth/do_signup.php
        localhost:9002/auth/add -> includes/label/add_label.php
        localhost:9002/auth/complete -> includes/label/complete_label.php
        localhost:9002/auth/delete -> includes/label/delete_label.php

    */

    // global variable $_SERVER
    // figure out what path the user is visiting
    $path = $_SERVER["REQUEST_URI"];

    // once you figure outh the path, then we need to load relevant content based on the path
    switch ($path){
        case '/login':
            require "pages/login.php";
            break;
        case '/signup':
            require "pages/signup.php";
            break;
        case '/logout':
            require "pages/logout.php";
            break;
        //actions routes
        case '/auth/login':
            require "includes/auth/do_login.php";
            break;
        case '/auth/signup':
            require "includes/auth/do_signup.php";
            break;
        case '/label/add':
            require "includes/auth/add_label.php";
            break;
        case '/label/complete':
            require "includes/auth/complete_label.php";
            break;
        case '/label/delete':
            require "includes/auth/delete_label.php";
            break;

        default:
            require "pages/home.php";
            break;
    }
?>