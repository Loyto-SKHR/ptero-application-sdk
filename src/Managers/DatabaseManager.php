<?php

namespace SKHR\PteroAPI\Managers;

use SKHR\PteroAPI\Resources\RessourceList;
use SKHR\PteroAPI\Resources\ServerDatabase;
use SKHR\PteroAPI\Resources\DatabasePassword;

class DatabaseManager extends Manager {

    /**
     * Get a paginated list of server databases
     *
     * @param int $serverId
     * @param int $page
     * @param array $query
     *
     * @return RessourceList
     */
    public function paginate($serverId, $page = 1, $query = []) {
        return $this->pteroAPI->http->get("servers/$serverId/databases", array_merge([
            'page' => $page,
        ], $query));
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
    public function get($serverId, $databaseId, $query = []) {
        return $this->pteroAPI->http->get("servers/$serverId/databases/$databaseId", $query);
    }

    /**
     * Create a new database for a server.
     *
     * @param int $serverId
     * @param array $data
     *
     * @return ServerDatabase
     */
    public function create($serverId, $data) {
        return $this->pteroAPI->http->post("servers/$serverId/databases", [], $data);
    }

    /**
     * Reset password for a specified database of a server.
     *
     * @param int $serverId
     * @param int $databaseId
     *
     * @return void
     */
    public function resetPassword($serverId, $databaseId) {
        $this->pteroAPI->http->post("servers/$serverId/databases/$databaseId/reset-password");
    }

    /**
     * Delete the given database of a server.
     *
     * @param int $serverId
     * @param int $databaseId
     *
     * @return void
     */
    public function delete($serverId, $databaseId) {
        $this->pteroAPI->http->delete("servers/$serverId/databases/$databaseId");
    }
}