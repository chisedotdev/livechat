<!-- User Profile Section -->
<div class="bg-white shadow-md rounded-lg p-4 mb-6">
    <div class="flex items-center">
        <img src="/assets/images/profile.jpg" alt="User Profile Picture" class="w-16 h-16 rounded-full mr-4">
        <div>
            <h3 class="text-xl font-bold text-gray-800"><?php echo $_SESSION['_username'] ?></h3>
            <p class="text-gray-600">Status: Online</p>
        </div>
    </div>
</div>

<!-- Active Chat Rooms : STILL WIP -->
<div class="bg-white shadow-md rounded-lg p-4 mb-6">
    <h3 class="text-lg font-semibold text-gray-800 mb-4">Active Chat Rooms</h3>
    <ul class="space-y-2">
        <li class="bg-gray-100 p-2 rounded-lg flex justify-between items-center">
            <span>Chat Room 1</span>
            <button class="text-indigo-600 hover:text-indigo-800">Enter</button>
        </li>
        <li class="bg-gray-100 p-2 rounded-lg flex justify-between items-center">
            <span>Chat Room 2</span>
            <button class="text-indigo-600 hover:text-indigo-800">Enter</button>
        </li>
    </ul>
</div>

<!-- Recent Messages : STILL WIP -->
<div class="bg-white shadow-md rounded-lg p-4 mb-6">
    <h3 class="text-lg font-semibold text-gray-800 mb-4">Recent Messages</h3>
    <ul class="space-y-2">
        <li class="bg-gray-100 p-2 rounded-lg">
            <p class="text-gray-800">User1: Hello, how can I help you today?</p>
        </li>
        <li class="bg-gray-100 p-2 rounded-lg">
            <p class="text-gray-800">User2: I need assistance with my account.</p>
        </li>
    </ul>
</div>