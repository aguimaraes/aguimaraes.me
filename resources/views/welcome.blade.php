<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta charset="utf-8">
        <title>Álvaro Guimarães</title>
        <!-- Meta -->
        <meta name="description" content="Senior PHP developer">
        <meta name="keywords" content="web,developer,php,laravel,resume" />
        <meta name="author" content="Álvaro Guimarães">
        <!-- CSS Stylesheet -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>
    </body>
</html>

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

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="jumbotron">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <img src="images/avatar.png" alt="Álvaro Guimarães" width="250" height="250" />
                </div>
                <div class="col-md-9">
                    <h1>Álvaro Guimarães</h1>
                    <p>PHP Developer, Open Source community collaborator and father of 3 beautiful children.</p>
                    <p><a class="btn btn-primary btn-lg" href="#" role="button">More about me &raquo;</a></p>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <!-- Example row of columns -->
        <div class="row">
            <div class="col-md-4">
                <h2>My Last <a href="http://github.com">github</a> events</h2>
                <ul>
                    @foreach ($events as $event)
                        <li>
                            {{ $event->created_at->diffForHumans() }} {{ $event->type }} on
                            <a class="label label-primary github-repo" href="http://github.com/{{ $event->repo }}" target="_blank">{{ $event->repo }}</a>
                        </li>
                    @endforeach
                </ul>
                <!-- <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p> -->
            </div>
            <div class="col-md-4">
                <h2>@aguimaraes1986</h2>
                @foreach ($tweets as $tweet)
                    <p>
                    {{ $tweet->created_at->diffForHumans() }} <strong>@aguimaraes</strong> {{ $tweet->text }}
                    </p>
                @endforeach
                <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
            </div>
            <div class="col-md-4">
                <h2>Last Post</h2>
                <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
                <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
            </div>
        </div>

        <hr>

        <footer>
            <p>&copy; 2016 Álvaro Guimarães.</p>
        </footer>
    </div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>