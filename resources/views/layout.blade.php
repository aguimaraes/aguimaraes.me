<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Álvaro Guimarães</title>
    <!-- Meta -->
    <meta name="description" content="Senior PHP developer">
    <meta name="keywords" content="web,developer,php,laravel,resume" />
    <meta name="author" content="Álvaro Guimarães">
    <link rel="stylesheet" href="{!! asset('css/app.css') !!}">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.jspack doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="jumbotron">
    <div class="container">
        <div class="row" itemscope itemtype="http://schema.org/Person">
            <div class="col-md-3">
                <img itemprop="image" src="images/avatar.png" alt="Álvaro Guimarães" width="250" height="250" />
            </div>
            <div class="col-md-9">
                <h1 itemprop="name">Álvaro Guimarães</h1>
                <p itemprop="description">PHP Developer, Open Source community collaborator and father of 3 beautiful child.</p>
                <p><a class="btn btn-primary btn-lg" href="{{ route('contact.index') }}" role="button">Contact me &raquo;</a></p>
            </div>
        </div>
    </div>
</div>
@yield('content')
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{!! asset('js/bootstrap.min.js') !!}"></script>
</body>
</html>