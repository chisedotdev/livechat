const io = require("socket.io")(3000, {
    cors: "*"
});

io.on('connection', (socket) => {
    let roomName;

    socket.on('join', (room) => {
        roomName = room;
        socket.join(room);
    });

    socket.on('send-msg', (msg, username) => {
        socket.to(roomName).emit('receive-msg', msg, username);
    });

    // socket.on('disconnect', (reason) => {
    //     // WIP
    // });
});