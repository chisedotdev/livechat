<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LiveChat - <?php echo ucwords($title) ?></title>
    <link rel="stylesheet" href="/css/output.css">
    <script src="/js/helper.js"></script>
</head>
<body class="bg-gray-100">
    <nav class="bg-indigo-600 text-white">
        <div class="container mx-auto px-4 py-6 flex justify-between items-center">
            <h1 class="text-xl font-bold"><a href="/dashboard">LiveChat</a></h1>
            <ul class="flex space-x-4">
                <li><a href="/rooms" class="hover:text-gray-300">Chat Rooms</a></li>
                <li>
                    <form action="/logout" method="POST">
                        <button class="text-white hover:text-gray-300 bg-transparent border-none">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mx-auto px-4 py-8">
        <h2 class="text-2xl font-semibold mb-4"><?php echo ucwords($title) ?></h2>
        <?php require_once(__DIR__ . "/$content.php") ?>
    </div>
    <?php if(isset($opt)): ?>
        <input type="hidden" id="_room" value="<?php echo $opt['room'] ?>">
        <script src="http://localhost:3000/socket.io/socket.io.js"></script>
        <script src="/js/client.js"></script>    
    <?php endif; ?>
</body>
</html>