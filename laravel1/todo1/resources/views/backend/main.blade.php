<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
    @include('backend.includes.header')
    @include('backend.includes.nav')

{{-- body --}}
@yield('content')
{{-- /body --}}


    @include('backend.includes.footer')

    </body>
</html>
