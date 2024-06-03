<?php

if ( !defined('BOOTSTRAP_INIT') ) {
    define('BOOTSTRAP_INIT', true);

    file_put_contents(__DIR__ . '/bootstrap.log', date('Y-m-d H:i:s') . " - bootstrap.php called\n", FILE_APPEND);

    require_once(__DIR__ . '/../app/models/Database.php');

    Models\Database::createTables();
}