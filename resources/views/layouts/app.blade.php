<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>@yield('title', 'My App')</title>
    {{-- tailwindcss link --}}
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    {{-- google fonts link  --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        amber: {
                            400: '#FFBA33',
                        },
                    },
                    fontFamily: {
                        sans: ['Poppins', 'sans-serif'],
                        serif: ['Georgia', 'serif'],
                    },
                },
            },
        }
    </script>
    <style>
        html, body {
            width: 100%;
            overflow-x: hidden;
            margin: 0;
            padding: 0;
        }
        body {
            font-family: 'Poppins', sans-serif;
            -webkit-text-size-adjust: 100%;
        }
    </style>
</head>
<body class="font-poppins">

@include('partials.navbar')

<div class="w-full overflow-hidden">
    @yield('content')
</div>

@include('partials.footer')

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
    AOS.init();
</script>

</body>
</html>