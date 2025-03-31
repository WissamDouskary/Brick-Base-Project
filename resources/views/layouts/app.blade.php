<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'My App')</title>
    {{-- tailwindcss link --}}
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    {{-- google fonts link  --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
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
                        sans: ['Inter', 'sans-serif'],
                        serif: ['Georgia', 'serif'],
                    },
                },
            },
        }
    </script>
    <style>
        body {
    font-family: 'Poppins', sans-serif;
}
    </style>
</head>
<body class="font-poppins">

@include('partials.navbar')

<div class="">
    @yield('content')
</div>

@include('partials.footer')

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>
</body>
</html>
