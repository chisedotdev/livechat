# LiveChat Application

LiveChat is a real-time chat application where users can register, log in, and join different chat rooms. The application supports multiple chat rooms such as Anime, Game, and Others, and provides real-time messaging functionality using Socket.IO.

## Table of Contents

- [Features](#features)
- [Technologies Used](#technologies-used)
- [Folder Structure](#folder-structure)
- [Installation](#installation)
- [Usage](#usage)
- [Routes](#routes)
- [Future Features](#future-features)

## Features

- User authentication (login and registration)
- Dashboard displaying user information
- Multiple chat rooms (Anime, Game, Others)
- Real-time messaging with Socket.IO
- Persistent message storage in specific room tables
- Authentication for restricted access to certain pages
- Tailwind CSS for styling

## Technologies Used

- **Frontend**: JavaScript, Tailwind CSS
- **Backend**: PHP
- **Real-time Communication**: Socket.IO (Node.js)
- **Database**: MySQL

## Folder Structure

```
root/
├── app/
│   ├── controllers/
│   ├── helpers/
│   ├── models/
│   └── views/
├── public/
│   ├── index.php
│   └── .htaccess
├── server/
│   └── bootstrap.php
└── README.md
```

- **app/controllers**: Contains the MVC controllers
- **app/helpers**: Contains helper functions and utilities used across the application
- **app/models**: Contains the MVC models and database interactions
- **app/views**: Contains the view templates
- **public**: Contains the public-facing files and entry point
- **server**: Contains server-related files like bootstrap.php

## Installation

1. **Clone the repository:**
    ```bash
    git clone https://github.com/chisedotdev/livechat.git
    cd livechat
    ```

2. **Set up the database:**
   - The application will automatically create the `livechat` database and the necessary tables upon first run. 
   - Ensure your database credentials are correct in `.env.php`.


3. **Install Node.js dependencies:**
    ```bash
    npm install
    ```

4. **Set up Tailwind CSS:**
    ```bash
    npx tailwindcss -i ./public/css/input.css -o ./public/css/output.css --watch
    ```

5. **Set up Apache server:**
   - Ensure your Apache server is set up to serve the `public` directory as the root.
   - Update `.htaccess` to route all traffic to `public/index.php`.

6. **Run the Node.js server for Socket.IO:**
    ```bash
    node server/socket.js
    ```

## Usage

1. **Start the Apache server:**
   Ensure your Apache server is running and serving the `public` directory.

2. **Start the Node.js server:**
   ```bash
   node server/socket.js

3 **Access the application:**
	Open your browser and go to http://localhost.

## Routes

- `/` - Login Page
- `/register` - Registration Page
- `/dashboard` - User Dashboard
- `/rooms` - Chat Rooms Overview
- `/room/anime` - Anime Chat Room
- `/room/game` - Game Chat Room
- `/room/others` - Others Chat Room

## Future Features

- Ability to change username, email, and password
- Ability to upload a profile picture
- Auto-deletion of chat room messages when the room is empty
- Dashboard will be fully functional in future updates