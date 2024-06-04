const socket = io('http://localhost:3000');

let room = document.getElementById('_room').value;
let username = document.getElementById('_username').value;
let msgForm = document.getElementById('_msg-form');
let msgInput = document.getElementById('_msg-input');

window.addEventListener('DOMContentLoaded', () => {
    socket.emit('join', room);
});

msgForm.addEventListener('submit', async (e) => {
    e.preventDefault();
    const msg = htmlspecialchars(msgInput.value);
    if(msg !== '') {
        // display to your own screen your message
        display_msg(msg);

        // get message time sent
        const time = document.getElementById('_time').textContent;

        socket.emit('send-msg', msg, username);
        
        // send a post request to the /room/:path end-point using fetch api
        try {
            await fetch ( `/room/${room}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: new URLSearchParams({
                    '_username': username,
                    '_msg': msg,
                    '_time': time,
                    '_room': room
                })
            } );
        } catch ( error ) {
            console.error(`Error: ${error}`);
        }
    }
    msgInput.value = '';
});

socket.on('receive-msg', (msg, username) => {
    display_msg(msg, username);
});