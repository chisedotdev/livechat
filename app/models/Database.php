<?php

namespace Models;

require_once(__DIR__ . '/../../.env.php');

use PDO;
use PDOException;

class Database
{
    private static $pdo;

    private function __construct()
    {
    }

    public static function getInstance()
    {
        if (!isset(self::$pdo)) {
            try {
                // Use the variables from the .env.php file
                global $host, $username, $password, $db;
                
                self::$pdo = new PDO('mysql:host=' . $host . ';dbname=' . $db, $username, $password);
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                die("Connection failed: " . $e->getMessage());
            }
        }
        return self::$pdo;
    }

    public static function createDatabase()
    {
        try {
            // Use the variables from the .env.php file
            global $host, $username, $password, $db;

            // Establish connection without selecting database
            $pdo = new PDO('mysql:host=' . $host, $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
            // Create database if it doesn't exist
            $pdo->exec('create database if not exists ' . $db);
        
            // Close connection
            $pdo = null;
        } catch ( PDOException $e ) {
            exit("Error creating database: " . $e->getMessage());
        }
    }
    
    public static function createTables()
    {
        $pdo = self::getInstance();

        try {
            // table for users
            $pdo->exec("
                create table if not exists users (
                    id int auto_increment primary key,
                    email varchar(255) unique not null,
                    username varchar(50) unique not null,
                    password varchar(255) not null
                )
            ");

            // table for anime room messages
            $pdo->exec("
                create table if not exists anime_room (
                    id int auto_increment primary key,
                    username varchar(100) not null,
                    message text not null,
                    time_sent varchar(20) not null
                )
            ");

            $pdo->exec("
            create table if not exists games_room (
                id int auto_increment primary key,
                username varchar(100) not null,
                message text not null,
                time_sent varchar(20) not null
            )
            ");

            $pdo->exec("
            create table if not exists others_room (
                id int auto_increment primary key,
                username varchar(100) not null,
                message text not null,
                time_sent varchar(20) not null
            )
            ");
        } catch ( PDOException $e ) {
            exit("Error creating tables: " . $e->getMessage());
        }
    }
}