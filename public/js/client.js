const socket = io('http://localhost:3000');

let room = document.getElementById('_room').value;
let msgForm = document.getElementById('_msg-form');
let msgInput = document.getElementById('_msg-input');

window.addEventListener('DOMContentLoaded', () => {
    socket.emit('join', room);
});

msgForm.addEventListener('submit', (e) => {
    e.preventDefault();
    const msg = escape(msgInput.value);
    if(msg !== '') {
        socket.emit('send-msg', msg);
    }
    msgInput.value = '';
});

socket.on('receive-msg', (msg) => {
    display_msg(msg);
});