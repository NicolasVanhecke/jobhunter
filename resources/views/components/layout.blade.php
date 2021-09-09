<!DOCTYPE html>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>JobHunter</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" rel="stylesheet"/>

        <!-- Styles -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="/app.css">

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" type="text/javascript"></script>
        <script src="https://pagination.js.org/dist/2.1.5/pagination.min.js" type="text/javascript"></script>
        <script src="/app.js" type="text/javascript"></script>
    </head>
    <body class="antialiased">

        @include( 'includes.nav' )
        
        @include( 'includes.flash-message' )

        <!-- <div class="row"> -->
            <div class="d-flex content-wrapper w-100">
                <div class="content">
                        @yield( 'content' )
                </div>
            </div>
        <!-- </div> -->
    </body>
</html>
