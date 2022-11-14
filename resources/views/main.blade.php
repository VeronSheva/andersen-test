<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src="{{ mix('js/app.js') }}" defer></script>
    @vite(['resources/js/app.js'])
    <title>Message</title>
</head>
<body class="bg-info bg-opacity-25">
    <div class="container-fluid p-5">
        <x-message-form/>
        <x-table/>
    </div>
</body>
</html>
