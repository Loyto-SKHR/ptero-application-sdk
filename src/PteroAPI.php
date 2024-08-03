<?php

namespace SKHR\PteroAPI;

use GuzzleHttp\Client as Client;
use SKHR\PteroAPI\Managers\UserManager;
use SKHR\PteroAPI\Managers\NodeManager;
use SKHR\PteroAPI\Managers\AllocationManager;
use SKHR\PteroAPI\Managers\LocationManager;
use SKHR\PteroAPI\Managers\ServerManager;
use SKHR\PteroAPI\Managers\DatabaseManager;

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
     * The node manager.
     *
     * @var NodeManager
     */
    public $nodes;

    /**
     * The allocation manager.
     *
     * @var AllocationManager
     */
    public $allocations;

    /**
     * The location manager.
     *
     * @var LocationManager
     */
    public $locations;

    /**
     * The server manager.
     *
     * @var ServerManager
     */
    public $servers;

    /**
     * The server manager.
     *
     * @var DatabaseManager
     */
    public $databases;

    /**
     * Create a new PteroAPI instance
     * 
     * @param string $baseURI
     * @param string $apiKey
     */
    public function __construct($baseURI, $apiKey) {
        $this->http = new Http($baseURI, $apiKey, $this);

        $this->users = new UserManager($this);
        $this->nodes = new UserManager($this);
        $this->allocations = new AllocationManager($this);
        $this->locations = new LocationManager($this);
        $this->servers = new ServerManager($this);
        $this->databases = new DatabaseManager($this);
    }
}

?>