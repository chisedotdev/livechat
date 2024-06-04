<?php

function sanitize($array) {   
    $sanitized = [];
    foreach ( $array as $key => $val ) {
        $sanitized[$key] = htmlspecialchars($val, ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401);
    }
    return $sanitized;
}

function is_empty($array) {
    foreach ( $array as $key => $val ) {
        if( $val === '' ) {
            return true;
        }
    }
    return false;
}

function redirect($path, $instant = false) {
    if ( $instant ) {
        header("Location: $path");
        exit();
    }
    header("Refresh: 5; url=$path");
    exit();
}

function is_auth() {
    if ( isset($_SESSION['_loggedIn']) ) {
        if ( $_SESSION['_loggedIn'] === true ) {
            return true;
        }
        return false;
    }
    return false;
}