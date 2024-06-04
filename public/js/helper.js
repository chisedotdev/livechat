function display_msg(msg, username = 'You') {
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
            <p class="text-sm font-medium text-gray-800">${username}</p>
            <p class="text-xs text-gray-400" id="_time">${time}</p>
            <p class="text-sm text-gray-600">${msg}</p>
        </div>
    `;
    msgsField.appendChild(msgContent);
}

function htmlspecialchars(unsafe) {
    if (typeof unsafe !== 'string') {
        return '';
    }

    return unsafe
         .replace(/&/g, "&amp;")
         .replace(/</g, "&lt;")
         .replace(/>/g, "&gt;")
         .replace(/"/g, "&quot;")
         .replace(/'/g, "&#039;");
}