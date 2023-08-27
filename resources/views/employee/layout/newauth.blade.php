<!doctype html>
<html lang="en-us">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>@yield('title')</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <!-- Favicon -->
        <link rel="apple-touch-icon" href="../icon.png">
        <link rel="shortcut icon" href="../icon.png" type="image/x-icon">

        <!-- Stylesheet -->
        <link rel="stylesheet" href="../css/main.min.css">
        <link rel="stylesheet" href="../css/custom.css">

        <!--[if lt IE 9]>
            <script src="../js/html5shiv.min.js"></script>
            <script src="../js/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="o-page customcss bgDetail bg1">
        <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

        <main class="o-page__content mgLeft_0">
            <div class="loginHead">
                <div class="lineBig"></div>
                <div class="lineSmall"></div>
                <div class="lineSmall"></div>
                <div class="lineSmall"></div>
            </div>
            @yield('content')
        </main><!-- // .o-page__content -->
        <script src="../js/main.min.js"></script>
        <script src="../js/functions.js"></script>
    </body>
</html>