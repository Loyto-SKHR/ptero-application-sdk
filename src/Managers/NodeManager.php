<?php

namespace SKHR\PteroAPI\Managers;

use SKHR\PteroAPI\Resources\RessourceList;
use SKHR\PteroAPI\Resources\Node;

class NodeManager extends Manager {

    /**
     * Get a paginated list of nodes
     *
     * @param int $page
     * @param array $query
     *
     * @return RessourceList
     */
    public function paginate($page = 1, $query = []) {
        return $this->pteroAPI->http->get('nodes', array_merge([
            'page' => $page,
        ], $query));
    }

    /**
     * Get a node instance by id
     *
     * @param int $nodeId
     * @param array $query
     *
     * @return Node
     */
    public function get($nodeId, $query = []) {
        return $this->pteroAPI->http->get("nodes/$nodeId", $query);
    }

    /**
     * Get node configuration by id
     *
     * @param int $nodeId
     * @param array $query
     *
     * @return array
     */
    public function getConfiguration($nodeId) {
        return $this->pteroAPI->http->get("nodes/$nodeId/configuration");
    }

    /**
     * Create a new node
     *
     * @param array $data
     *
     * @return Node
     */
    public function create($data) {
        return $this->pteroAPI->http->post('nodes', [], $data);
    }

    /**
     * Update a specified node
     *
     * @param int $nodeId
     * @param array $data
     *
     * @return Node
     */
    public function update($nodeId, $data) {
        return $this->pteroAPI->http->patch("nodes/$nodeId", [], $data);
    }

    /**
     * Delete the given node.
     *
     * @param int $nodeId
     *
     * @return void
     */
    public function delete($nodeId) {
        $this->pteroAPI->http->delete("nodes/$nodeId");
    }
}

?>