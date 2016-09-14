<?php

namespace App\Http\Services;

use App\Actor;
use App\GithubEvent as Event;
use App\Org;
use App\Repo;
use Illuminate\Support\Collection;

class GithubEventPersistence
{
    /**
     * @param \Illuminate\Support\Collection $collection
     */
    public function persist(Collection $collection)
    {
        $collection->each(function ($item) {
            $event = Event::firstOrNew(['id' => $item['id']]);
            if ($event->exists) {
                return $event;
            }
            $event->fill($item);
            $this->associate($event, $item);
            $event->save();
            return $event;
        });
    }

    /**
     * @param \App\GithubEvent $event
     * @param array            $data
     */
    private function associate(Event $event, array $data)
    {
        $this->associateActor($event, $data['actor']);
        $this->associateRepo($event, $data['repo']);
        if (!empty($data['org'])) {
            $this->associateOrg($event, $data['org']);
        }
    }

    /**
     * @param \App\GithubEvent $event
     * @param array            $data
     *
     * @return Actor
     */
    private function associateActor(Event $event, array $data)
    {
        $actor = Actor::findOrNew($data['id']);
        if (!$actor->exists) {
            $actor->fill($data);
            $actor->save();
        }
        $event->actor()->associate($actor);
        return $actor;
    }

    /**
     * @param \App\GithubEvent $event
     * @param array            $data
     *
     * @return Repo
     */
    private function associateRepo(Event $event, array $data)
    {
        $repo = Repo::findOrNew($data['id']);
        if (!$repo->exists) {
            $repo->fill($data);
            $repo->save();
        }
        $event->repo()->associate($repo);
        return $repo;
    }

    /**
     * @param \App\GithubEvent $event
     * @param array            $data
     *
     * @return Org
     */
    private function associateOrg(Event $event, array $data)
    {
        $org = Org::findOrNew($data['id']);
        if (!$org->exists) {
            $org->fill($data);
            $org->save();
        }
        $event->org()->associate($org);
        return $org;
    }
}
