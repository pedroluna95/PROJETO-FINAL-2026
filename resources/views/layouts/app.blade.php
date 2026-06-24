<!DOCTYPE html>
<html class="light" lang="pt-br">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Portal de Estágios Internos</title>
    
    <!-- Tailwind e Fontes -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    
    <link rel="stylesheet" href="/app/Views/css/style.css?v=1">
    
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: { 
                        
                        "primary": "#0077fc" 
                    },
                    fontFamily: { "display": ["Public Sans", "sans-serif"] }
                }
            }
        }
    </script>
</head>
<body>

    @include('partials.header')

    @yield('content')

    @include('partials.footer')

</body>
</html>