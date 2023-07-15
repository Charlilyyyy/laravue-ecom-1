<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Charlily</title>
    <link rel="apple-touch-icon" sizes="180x180" href="public/favicon.ico">
    <link rel="icon" type="image/png" sizes="32x32" href="public/favicon-32x32.png">
    <link rel='shortcut icon' href='public/favicon.ico' type='image/x-icon'>


    <link rel="icon" type="image/png" sizes="16x16" href="public/favicon-16x16.png">
    <link rel="manifest" href="public/assets/images/site.webmanifest">
    @vite(['resources/js/app.js'],['resources/css/app.css'])
</head>
<body>
    <!-- <div id="app"></div> -->
    YOUR DASHBOARD
    <!-- <button class="btn btn-danger">Logout</button> -->
    <a class="btn btn-danger" href="{{ route('logout') }}">Log Out</a>
    <!-- <form id="logout-form" action="{{ route('logout') }}" method="POST">
    @csrf
    <button class="btn btn-danger" type="submit">Logout</button> -->
    </form>

</body>
</html>



