<!-- Chat Messages -->
<div class="bg-white rounded-lg shadow-md p-4 mb-4 overflow-y-auto max-h-100">
    <!-- Sample Chat Messages -->
    <div class="flex flex-col gap-4" id="_msgs-field">
        <!-- Chat Message 1 -->
        <?php if ( sizeof($msgs) !== 0 ): ?>
            <?php foreach ( $msgs as $msg ): ?>
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <img class="rounded-full" src="/assets/images/profile.jpg" alt="User Avatar" width="50px">
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-gray-800"><?php echo $msg['username'] === $_SESSION['_username'] ? 'You' : htmlspecialchars($msg['username']); ?></p>
                        <p class="text-xs text-gray-400"><?php echo htmlspecialchars($msg['time_sent']); ?></p>
                        <p class="text-sm text-gray-600"><?php echo htmlspecialchars($msg['message']); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <!-- End Chat Messages -->
</div>

<!-- Message Input -->
<form class="flex items-center" id="_msg-form">
    <input type="hidden" id="_username" value="<?php echo htmlspecialchars($_SESSION['_username']); ?>">
    <input type="text" class="flex-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm px-4 py-2" id="_msg-input" placeholder="Type your message...">
    <button type="submit" class="ml-3 inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        Send
    </button>
</form>
<!-- End Message Input -->