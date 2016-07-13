<?php

use App\Http\Services\GithubEvent;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\App;

class GithubEventsTest extends TestCase
{
    use DatabaseMigrations;

    public function testIfCanFetchAllEvents()
    {
        $github = App::make(GithubEvent::class, ['username' => 'aguimaraes']);
        $events = $github->all();
        $this->assertInstanceOf(Collection::class, $events);
    }
}
