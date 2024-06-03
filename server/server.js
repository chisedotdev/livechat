const io = require("socket.io")(3000, {
    cors: "*"
});

io.on('connection', (socket) => {
    let roomName;
    console.log(`User: ${socket.id} connected`);

    socket.on('join', (room) => {
        roomName = room;
        socket.join(room);
        console.log(`${socket.id} joined the room ${room}`);
    });

    socket.on('send-msg', (msg) => {
        console.log(`Msg: ${msg}`);
        console.log(`Room: ${roomName}`);
        io.to(roomName).emit('receive-msg', msg);
    });

    socket.on('disconnect', (reason) => {
        console.log(`User: ${socket.id} disconnected due to ${reason}`);
    });
});