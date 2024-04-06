<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Demo app</title>

    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    @vite(['resources/sass/app.scss'])
</head>

<body>
    <div class="container">
        @yield('filters')
    </div>
    <div class="container">
        @yield('content')
    </div>
</body>

</html>
