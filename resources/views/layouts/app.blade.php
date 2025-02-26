<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bootstrap Cards with Hover Popup</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom CSS (Minimal) -->
  <style>
    .small-card {
      border: 1px solid #ddd; /* Border for small cards */
      border-radius: 10px; /* Rounded corners */
      transition: transform 0.3s ease; /* Smooth scale effect on hover */
    }

    /* Image resizing */
    .card-img-top {
      height: 100px;  /* Smaller image height to fit better */
      object-fit: cover;  /* Preserve aspect ratio without distortion */
    }

    /* Hover effect without changing color */
    .small-card:hover {
      transform: scale(1.05); /* Slightly enlarge the card on hover */
    }

    /* Prevent link text from turning blue or underlined */
    a {
      text-decoration: none; /* Removes underline */
      color: inherit; /* Inherit the color from the parent element */
    }
  </style>

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            <livewire:layout.navigation />

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
