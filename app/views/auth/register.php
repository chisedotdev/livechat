<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="/css/output.css">
</head>
<body class="bg-gray-100">
    <div class="flex flex-col items-center justify-center min-h-screen py-12">
        <div class="bg-white shadow-md rounded-lg px-8 py-10">
            <h1 class="text-3xl font-semibold text-gray-800 mb-6">Register</h1>      
            
            <?php if ( isset($status) ):  ?>
                <?php if ( $status === true ): ?>
                    <!-- Success Message -->
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
                        <strong class="font-bold">Success!</strong>
                        <span class="block sm:inline"><?php echo $msg ?></span>
                    </div>
                <?php else: ?>
                    <!-- Error Message -->
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6" role="alert">
                        <strong class="font-bold">Oh snap!</strong>
                        <span class="block sm:inline"><?php echo $msg ?></span>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
            <form action="/register" method="POST">
                <div class="mb-4">
                    <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                    <input type="text" name="_username" id="username" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-400 rounded-md border-b-2" required>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="_email" id="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-400 rounded-md border-b-2" required>
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" name="_password" id="password" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-400 rounded-md border-b-2" required>
                </div>
                <div>
                    <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Register
                    </button>
                </div>
            </form>
            <div class="mt-6">
                <p class="text-sm text-gray-600">Already have an account? <a href="/" class="font-medium text-indigo-600 hover:text-indigo-500">Sign in</a></p>
            </div>
        </div>
    </div>
</body>
</html>
