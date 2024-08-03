<?php

namespace SKHR\PteroAPI\Resources;

use SKHR\PteroAPI\Resources\ResourceList;
use SKHR\PteroAPI\Resources\ServerDatabase;

class Server extends Resource {

    /**
     * Update details of the server
     *
     * @param array $data
     *
     * @return void
     */
    public function updateDetails($data) {
        return $this->pteroAPI->servers->updateDetails($this->id, $data);
    }

    /**
     * Update build of the server
     *
     * @param array $data
     *
     * @return void
     */
    public function updateBuild($data) {
        $this->pteroAPI->servers->updateBuild($this->id, $data);
    }

    /**
     * Update startup of the server
     *
     * @param array $data
     *
     * @return void
     */
    public function updateStartup($data) {
        $this->pteroAPI->servers->updateStartup($this->id, $data);
    }

    /**
     * Suspend the server
     *
     * @return void
     */
    public function suspend() {
        $this->pteroAPI->servers->suspend($this->id);
    }

    /**
     * Unsuspend the server
     *
     * @return void
     */
    public function unsuspend() {
        $this->pteroAPI->servers->unsuspend($this->id);
    }

    /**
     * Reinstall the server
     *
     * @return void
     */
    public function reinstall() {
        $this->pteroAPI->servers->reinstall($this->id);
    }

    /**
     * Delete the server
     * 
     * @param bool $force
     *
     * @return void
     */
    public function delete($force = false) {
        $this->pteroAPI->servers->delete($this->id, $force);
    }

    /**
     * Get a paginated list of server databases
     *
     * @param int $page
     * @param array $query
     *
     * @return RessourceList
     */
    public function paginateDatabase($page = 1, $query = []) {
        return $this->pteroAPI->databases->paginate($this->id, $page, $query);
    }

    /**
     * Get a server database instance
     *
     * @param int $serverId
     * @param int $databaseId
     * @param array $query
     *
     * @return ServerDatabase
     */
    public function getDatabase($databaseId, $query = []) {
        return $this->pteroAPI->databases->get($this->id, $databaseId, $query);
    }

    /**
     * Create a new database for a server.
     *
     * @param int $serverId
     * @param array $data
     *
     * @return ServerDatabase
     */
    public function createDatabase($data) {
        return $this->pteroAPI->databases->create($this->id, $data);
    }
}

?>