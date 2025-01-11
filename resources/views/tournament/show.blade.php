<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tournament Result</title>
    @vite('resources/css/app.css') <!-- For Tailwind -->
</head>
<body class="bg-gray-100">
    <div class="container mx-auto mt-10">
        <h1 class="text-2xl font-bold text-center mb-6">Tournament Results</h1>

        @foreach ($rounds as $roundIndex => $groups)
            <h2 class="text-xl font-semibold mb-4">Round {{ $roundIndex + 1 }}</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-6">
                @foreach ($groups as $group)
                    <div class="p-4 bg-white rounded shadow">
                        <p><strong>Group:</strong> {{ implode(' vs ', $group) }}</p>
                        <p><strong>Winner:</strong> {{ $group[array_rand($group)] }}</p>
                    </div>
                @endforeach
            </div>
        @endforeach

        <h2 class="text-2xl font-bold text-center mt-8">Final Winner: {{ $rounds[count($rounds) - 1][0][0] }}</h2>
    </div>
</body>
</html>
