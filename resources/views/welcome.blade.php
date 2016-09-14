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
    <style type="text/css">
        {!! file_get_contents(public_path('css/app.css')) !!}
    </style>
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
            <div class="row" itemscope itemtype="http://schema.org/Person">
                <div class="col-md-3">
                    <img itemprop="image" src="images/avatar.png" alt="Álvaro Guimarães" width="250" height="250" />
                </div>
                <div class="col-md-9">
                    <h1 itemprop="name">Álvaro Guimarães</h1>
                    <p itemprop="description">PHP Developer, Open Source community collaborator and father of 3 beautiful child.</p>
                    {{--<p><a class="btn btn-primary btn-lg" href="#" role="button">More about me &raquo;</a></p>--}}
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <!-- Example row of columns -->
        <div class="row">
            <div class="col-md-4">
                <h3>My Last <a href="http://github.com">github</a> events</h3>
                <ul>
                    @foreach ($events as $event)
                        <li>
                            {{ $event->created_at->diffForHumans() }} {{ $event->type }} on
                            <a
                                class="label label-primary github-repo"
                                href="http://github.com/{{ $event->repo->name }}"
                                target="_blank"
                            >
                                {{ $event->repo->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
                <!-- <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p> -->
            </div>
            <div class="col-md-4">
                <h3>Projects I'm contributing to</h3>
                <ul>
                    @foreach ($repos as $repo)
                        <li>
                            <a
                                    class="label label-success github-repo"
                                    href="http://github.com/{{ $repo->name }}"
                                    target="_blank"
                            >
                                {{ $repo->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
                <!-- <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p> -->
            </div>
            <div class="col-md-4">
                <h3>@aguimaraes1986</h3>
                @foreach ($tweets as $tweet)
                    <p>
                    {{ $tweet->created_at->diffForHumans() }}
                    <a href="http://twitter.com/aguimaraes1986" target="_blank">@aguimaraes1986</a>
                    {{ $tweet->text }}
                    </p>
                @endforeach
                <!-- <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p> -->
            </div>
        </div>

        <hr>

        <footer>
            <p>&copy; 2016 Álvaro Guimarães.</p>
            <p><a href="http://stackexchange.com/users/240540">
                <img src="http://stackexchange.com/users/flair/240540.png" width="208" height="58" alt="profile for &#193;lvaro Guimar&#227;es on Stack Exchange, a network of free, community-driven Q&amp;A sites" title="profile for &#193;lvaro Guimar&#227;es on Stack Exchange, a network of free, community-driven Q&amp;A sites">
            </a></p>
        </footer>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>