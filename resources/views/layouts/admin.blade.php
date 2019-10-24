<!DOCTYPE html>
<html lang='en'>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width,initial-scale=1.0,maximum-scale=1,user-scalable=no'>

        <title>Admin Panel</title>

        <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans:400,700&display=swap&subset=latin-ext" rel="stylesheet">
        <link rel='stylesheet' href='{{ asset(mix('css/admin.css')) }}'>
    </head>

    <body>
        <div class='layout'>
            <div class='layout__nav'>
                @include('admin.partials.navigation')
            </div>
            <div class='layout__content'>
                @yield('body')
            </div>
        </div>
    </body>

    <script src='{{ asset(mix('js/admin.js')) }}' async></script>
</html>
