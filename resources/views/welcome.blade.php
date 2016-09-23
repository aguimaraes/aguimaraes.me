@extends('layout')
@section('content')
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
@endsection