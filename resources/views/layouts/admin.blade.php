<!doctype html>
<html lang="fr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Click&Eat</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="title" content="Click&Eat" />
    <meta name="author" content="Babin Mattis" />
    <meta name="description" content="Click&Eat : commande en ligne facile et rapide pour les restaurants et les clients." />
    <meta name="keywords" content="Click&Eat, commande en ligne, restaurants, panier, repas, livraison, gestion de commandes" />
    <meta name="robots" content="index, follow" />
    <link rel="icon" href="{{ asset('img/favicon.svg') }}" type="image/svg+xml">



    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
        integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q="
        crossorigin="anonymous"
    />

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/styles/overlayscrollbars.min.css"
        integrity="sha256-tZHrRjVqNSRyWg2wbppGnT833E/Ys0DHWGwT04GiqQg="
        crossorigin="anonymous"
    />

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
        crossorigin="anonymous"
    />

    @vite(['resources/css/app.css', 'resources/js/app.js'])



</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <div class="app-wrapper">

<x-admin-nav />

<x-admin-aside />


{{ $slot }}
</div>
</body>
</html>