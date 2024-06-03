<?php

namespace Models;

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
                self::$pdo = new PDO('mysql:host=localhost', 'root', 'root');
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                self::$pdo->exec('create database if not exists livechat');

                self::$pdo = new PDO('mysql:host=localhost;dbname=livechat', 'root', 'root');
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                die("Connection failed: " . $e->getMessage());
            }
        }
        return self::$pdo;
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
            create table if not exists game_room (
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
            echo "Error creating tables: " . $e->getMessage();
        }
    }
}