<?php

namespace App\Http\Controllers;

use App\Repo;
use App\Tweet;
use App\GithubEvent;

class HomeController extends Controller
{
    public function index()
    {
        $events = GithubEvent::latest()->paginate(20);
        $tweets = Tweet::latest()->paginate(10);
        $repos = Repo::paginate();
        return view('welcome', compact('events', 'tweets', 'repos'));
    }
}
