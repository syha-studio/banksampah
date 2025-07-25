<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>{{ $title }} - BIMAPRAYA</title>
    <link rel="icon" href="/img/banksbimalogo.png">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    @livewireStyles
</head>

<body class="font-roboto">
    <x-navbar></x-navbar>
    {{ $slot }}
    <x-footer></x-footer>
    @livewireScripts
</body>

</html>
