<?php

if (!defined('BOOTSTRAP_INIT')) {
    define('BOOTSTRAP_INIT', true);

    // Include the Database class to create the database and tables
    require_once(__DIR__ . '/../app/models/Database.php');

    // Create the database if it doesn't exist
    Models\Database::createDatabase();

    // Create the tables if they don't exist
    Models\Database::createTables();
}