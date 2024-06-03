const socket = io('http://localhost:3000');

let room = document.getElementById('_room').value;
let msgForm = document.getElementById('_msg-form');
let msgInput = document.getElementById('_msg-input');

window.addEventListener('DOMContentLoaded', () => {
    socket.emit('join', room);
});

msgForm.addEventListener('submit', (e) => {
    e.preventDefault();
    const msg = msgInput.value;
    if(msg !== '') {
        socket.emit('send-msg', msg);
    }
    msgInput.value = '';
});

socket.on('receive-msg', (msg) => {
    display_msg(msg);
});

function display_msg(msg) {
    let msgsField = document.getElementById('_msgs-field');
    let msgContent = document.createElement('div');
    let time = new Date().toLocaleTimeString();
    msgContent.classList.add('flex');
    msgContent.classList.add('items-start');
    msgContent.innerHTML = `
        <div class="flex-shrink-0">
            <img class="rounded-full" src="/assets/images/profile.jpg" alt="User Avatar" width="50px">
        </div>
        <div class="ml-3">
            <p class="text-sm font-medium text-gray-800">Username</p>
            <p class="text-xs text-gray-400">${time}</p>
            <p class="text-sm text-gray-600">${msg}</p>
        </div>
    `;
    msgsField.appendChild(msgContent);
}