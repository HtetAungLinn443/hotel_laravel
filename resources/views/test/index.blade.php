<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>

    <body>
        <h1>{{ $string }}</h1>
        @foreach($array as $key => $value)
        <h3>{{ $key }} :: {{ $value }}</h3>
        @endforeach
    </body>

</html>