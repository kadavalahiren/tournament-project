<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tournament Result</title>
    @vite('resources/css/app.css') <!-- For Tailwind -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mt-5">
    <h1 class="text-center mb-4">Tournament Results</h1>
        <div class="card">
            @foreach ($rounds as $roundIndex => $round)
                <div class="card-body">
                    <h2 class="h4 mb-3">Round {{ $roundIndex + 1 }}</h2>
                    <div class="row g-3">
                        @foreach ($round['groups'] as $group)
                        <div class="col-md-6 col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <p class="mb-0">Group: {{ $group[0] }} vs {{ $group[1] ?? 'No Opponent' }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <p class="mt-3"><strong>Winners:</strong> {{ implode(', ', $round['winners']) }}</p>
                </div>
            @endforeach
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
