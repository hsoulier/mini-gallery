<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" type="text/css">
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="public/js/index.js" defer></script>
    <link rel="stylesheet" href="public/css/style.css">
    <title>Mini Galerie</title>
</head>

<body class="min-h-screen">
<nav class="flex items-center text-2xl text-white px-8 py-2 flex gap-4 text-2xl">
    <div class="p-2 text-center icon-back">
        <a href="javascript:history.go(-1)"><i class="bi bi-arrow-left"></i></a>
    </div>
    <div class="p-2 text-center  ml-4 icon-home">
        <a href="/"><i class="bi bi-house-door"></i></a>
    </div>
    <div class="p-2 ml-auto text-center icon-log">
        <a href="?c=connectUser">
            <i class="bi bi-person"></i>
        </a>
    </div>
</nav>

<main class="container p-8 mx-auto">