<?php

namespace App\Http\Services;

use Github\HttpClient\Message\ResponseMediator;
use GrahamCampbell\GitHub\GitHubManager;
use Guzzle\Http\Message\Response;
use Illuminate\Support\Collection;

class GithubEvent
{
    /**
     * @var string
     */
    private $username;

    /**
     * @var Response
     */
    private $httpResponse;

    /**
     * @var GitHubManager
     */
    private $github;

    /**
     * @var GithubEventPersistence
     */
    private $persistence;
    /**
     * @var bool
     */
    private $persistent = true;

    /**
     * GithubEvent constructor.
     *
     * @param \GrahamCampbell\GitHub\GitHubManager      $github
     * @param \App\Http\Services\GithubEventPersistence $persistence
     * @param                                           $username
     */
    public function __construct(GitHubManager $github, GithubEventPersistence $persistence, $username = null)
    {
        $this->github = $github;
        $this->persistence = $persistence;
        $this->username = $username;
    }

    /**
     * @return \App\Http\Services\GithubEventPersistence
     */
    public function getPersistence()
    {
        return $this->persistence;
    }

    /**
     * @param \App\Http\Services\GithubEventPersistence $persistence
     */
    public function setPersistence($persistence)
    {
        $this->persistence = $persistence;
    }

    /**
     * @return boolean
     */
    public function isPersistent()
    {
        return $this->persistent;
    }

    /**
     * @param boolean $persistent
     */
    public function setPersistent($persistent)
    {
        $this->persistent = $persistent;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function all()
    {
        $response = $this->doRequest();
        return new Collection($response);
    }

    /**
     * @return \Guzzle\Http\EntityBodyInterface|mixed|string
     */
    private function doRequest()
    {
        $httpResponse = $this->github
            ->getHttpClient()
            ->get($this->getAPIMethod());
        $response = $this->wrapResponse($httpResponse);
        if ($this->isPersistent()) {
            $this->getPersistence()->persist($response);
        }
        return $response;
    }

    /**
     * @param \Guzzle\Http\Message\Response $response
     *
     * @return \Illuminate\Support\Collection
     */
    private function wrapResponse(Response $response)
    {
        $this->httpResponse = $response;
        return new Collection(
            ResponseMediator::getContent($response)
        );
    }

    /**
     * @return string
     */
    private function getAPIMethod()
    {
        return sprintf('/users/%s/events', $this->getUsername());
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }
}
