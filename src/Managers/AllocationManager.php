<?php

namespace SKHR\PteroAPI\Managers;

use SKHR\PteroAPI\Resources\RessourceList;
use SKHR\PteroAPI\Resources\Allocation;

class AllocationManager extends Manager {

    /**
     * Get a paginated list of allocations
     *
     * @param int $nodeId
     * @param int $page
     * @param array $query
     *
     * @return RessourceList
     */
    public function paginate(int $nodeId, int $page = 1, array $query = []) {
        return $this->pteroAPI->http->get("nodes/$nodeId/allocations", array_merge([
            'page' => $page,
        ], $query));
    }

    /**
     * Create a new allocation for a node
     *
     * @param int $nodeId
     * @param array $data
     *
     * @return Allocation
     */
    public function create($nodeId, $data) {
        return $this->pteroAPI->http->post("nodes/$nodeId/allocations", [], $data);
    }

    /**
     * Delete the given allocation of a node
     *
     * @param int $nodeId
     * @param int $allocationId
     *
     * @return void
     */
    public function delete($nodeId, $allocationId) {
        $this->http->pteroAPI->delete("nodes/$nodeId/allocations/$allocationId");
    }
}

?>