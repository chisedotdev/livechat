<?php

namespace Models;

require_once('Database.php');

use PDO;
use PDOException;

class Message
{
    private $pdo;
    private $tables = ['anime_room', 'games_room', 'others_room'];

    public function __construct()
    {
        $this->pdo = Database::getInstance();
    }

    public function getAllMessages($room)
    {
        try {
            $table = $room . '_room';
            if ( in_array($table, $this->tables) ) {
                $stmt = $this->pdo->query("
                    select * from $table
                ");
                return $stmt->fetchAll();
            }
            return [];
        } catch ( PDOException $e ) {
            return ['status' => false, 'msg' => 'Something went wrong.'];
        }
    }

    public function saveMessage($username, $msg, $time, $room)
    {
        try {
            $table = $room . '_room';
            if ( in_array($table, $this->tables) ) {
                $stmt = $this->pdo->prepare("
                    insert into $table (
                        username,
                        message,
                        time_sent
                    ) values (
                        :username,
                        :msg,
                        :time
                    )
                ");
                $stmt->execute([
                    'username' => $username,
                    'msg' => $msg,
                    'time' => $time
                ]);
                return ['status' => true, 'msg' => "Message saved."];
            }
            return ['status' => false, 'msg' => 'Something went wrong.'];
        } catch ( PDOException $e ) {
            return ['status' => false, 'msg' => 'Something went wrong.'];
        }
    }
}