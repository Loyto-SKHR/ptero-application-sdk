<?php

namespace SKHR\PteroAPI;

use GuzzleHttp\Client as Client;
use SKHR\PteroAPI\Managers\UserManager;
use SKHR\PteroAPI\Managers\ServerManager;

class PteroAPI {
    /**
     * The Http client.
     *
     * @var Client
     */
    public $http;

    /**
     * The user manager.
     *
     * @var UserManager
     */
    public $users;

    /**
     * The server manager.
     *
     * @var ServerManager
     */
    public $servers;

    /**
     * Create a new PteroAPI instance
     * 
     * @param string $baseURI
     * @param string $apiKey
     */
    public function __construct($baseURI, $apiKey) {
        $this->http = new Http($baseURI, $apiKey, $this);

        $this->users = new UserManager($this);
        $this->servers = new ServerManager($this);
    }
}

?>