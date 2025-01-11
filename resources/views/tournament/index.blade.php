<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tournament System</title>
    @vite('resources/css/app.css') <!-- For Tailwind -->
</head>
<body class="bg-gray-100">
    <div class="container mx-auto mt-10">
        <h1 class="text-2xl font-bold text-center mb-6">Tournament System</h1>

        @if(session('error'))
            <div class="text-red-500 text-center mb-4">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('start.tournament') }}" method="POST" class="bg-white p-6 rounded shadow">
            @csrf
            <div id="user-fields">
                <div class="mb-4">
                    <input type="text" name="users[]" placeholder="Enter your user name" class="w-full p-2 border rounded" />
                    <input type="text" name="email[]" placeholder="Enter your email address" class="w-full p-2 border rounded" />
                </div>
            </div>
            <button type="button" id="add-user" class="bg-blue-500 text-white px-4 py-2 rounded">Add User</button>
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Start Tournament</button>
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).on('click','#add-user',function(){
            const userField = `<div class="mb-4">
                <input type="text" name="users[]" placeholder="Enter user name" class="w-full p-2 border rounded" />
                <input type="text" name="email[]" placeholder="Enter your email address" class="w-full p-2 border rounded" />
            </div>`;

            document.getElementById('user-fields').insertAdjacentHTML('beforeend', userField);
        });
    </script>
</body>
</html>
