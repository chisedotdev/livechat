<?php

namespace Controllers;

require_once('BaseController.php');

class ChatController extends BaseController
{
    public function showRooms()
    {
        $this->render('base', [
            'content' => 'chat/rooms',
            'title' => 'Chat Rooms'
        ]);
    }

    public function showRoom($room)
    {
        $this->render('base',[
            "content" => "chat/room",
            "title" => $room,
            "opt" => [
                'room' => $room
            ]
        ]);
    }

    public function sendMessage()
    {
        // nothing here yet
    }
}