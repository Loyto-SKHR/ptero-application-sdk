<?php

namespace SKHR\PteroAPI\Managers;

use SKHR\PteroAPI\Resources\RessourceList;
use SKHR\PteroAPI\Resources\Server;

class ServerManager extends Manager {

    /**
     * Get a paginated list of servers
     *
     * @param int $page
     * @param array $query
     *
     * @return RessourceList
     */
    public function paginate($page = 1, $query = []) {
        return $this->pteroAPI->http->get('servers', array_merge([
            'page' => $page,
        ], $query));
    }

    /**
     * Get server instance by id
     *
     * @param int $serverId
     * @param array $query
     *
     * @return Server
     */
    public function get($serverId, $query = []) {
        return $this->pteroAPI->http->get("servers/$serverId", $query);
    }

    /**
     * Get server instance by external id
     *
     * @param string $externalId
     * @param array $query
     *
     * @return Server
     */
    public function getByExternalId($externalId, $query = []) {
        return $this->pteroAPI->http->get("servers/external/$externalId", $query);
    }

    /**
     * Update details of a specified server
     *
     * @param int $serverId
     * @param array $data
     *
     * @return void
     */
    public function updateDetails($serverId, $data) {
        $this->pteroAPI->http->patch("servers/$serverId/details", [], $data);
    }

    /**
     * Update build of a specified server
     *
     * @param int $serverId
     * @param array $data
     *
     * @return void
     */
    public function updateBuild($serverId, $data) {
        $this->pteroAPI->http->patch("servers/$serverId/build", [], $data);
    }

    /**
     * Update startup of a specified server
     *
     * @param int $serverId
     * @param array $data
     *
     * @return void
     */
    public function updateStartup($serverId, $data) {
        $this->pteroAPI->http->patch("servers/$serverId/startup", [], $data);
    }

    /**
     * Create server
     *
     * @param array $data
     *
     * @return Server
     */
    public function create($data) {
        return $this->pteroAPI->http->post('servers', [], $data);
    }

    /**
     * Suspend a specified server
     *
     * @param int $serverId
     *
     * @return void
     */
    public function suspend($serverId) {
        $this->pteroAPI->http->post("servers/$serverId/suspend");
    }

    /**
     * Unsuspend a specified server
     *
     * @param int $serverId
     *
     * @return void
     */
    public function unsuspend($serverId) {
        $this->pteroAPI->http->post("servers/$serverId/unsuspend");
    }

    /**
     * Reinstall a specified server
     *
     * @param int $serverId
     *
     * @return void
     */
    public function reinstall($serverId) {
        $this->pteroAPI->http->post("servers/$serverId/reinstall");
    }

    /**
     * Delete the given server
     *
     * @param int $serverId
     * @param bool $force
     *
     * @return void
     */
    public function delete($serverId, $force = false) {
        $this->pteroAPI->http->delete("servers/$serverId".($force ? "/force" : ""));
    }

}

?>