<?php

namespace Controllers;

require_once('BaseController.php');
require_once(__DIR__ . '/../models/Message.php');

use Models\Message;

class ChatController extends BaseController
{
    public function showRooms()
    {
        $this->render('base', [
            'content' => 'chat/rooms',
            'title' => 'Chat Rooms'
        ]);
    }

    public function showRoom($room, $msgs)
    {
        $this->render('base',[
            "content" => "chat/room",
            "title" => $room,
            "opt" => [
                'room' => $room
            ],
            "msgs" => $msgs
        ]);
    }

    public function getAllMessages($room)
    {
        $msg = new Message();
        return $msg->getAllMessages($room);
    }

    public function saveMessage($data)
    {
        $msg = new Message();
        return $msg->saveMessage($data['_username'], $data['_msg'], $data['_time'], $data['_room']);
    }
}