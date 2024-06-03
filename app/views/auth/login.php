<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/css/output.css">
</head>
<body class="bg-gray-100">
    <div class="flex flex-col items-center justify-center min-h-screen py-12">
        <div class="bg-white shadow-md rounded-lg px-8 py-10">
            <h1 class="text-3xl font-semibold text-gray-800 mb-6">Login</h1>
            <form>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm rounded-md border-b-2 border-gray-400" required>
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" name="password" id="password" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm rounded-md border-b-2 border-gray-400" required>
                </div>
                <div>
                    <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Sign in
                    </button>
                </div>
            </form>
            <div class="mt-6">
                <p class="text-sm text-gray-600">Don't have an account? <a href="/register" class="font-medium text-indigo-600 hover:text-indigo-500">Sign up</a></p>
            </div>
        </div>
    </div>
</body>
</html>