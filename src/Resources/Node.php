<?php

namespace SKHR\PteroAPI\Resources;

use SKHR\PteroAPI\Resources\RessourceList;
use SKHR\PteroAPI\Resources\Allocation;

class Node extends Resource {

    /**
     * Delete the node
     *
     * @return void
     */
    public function delete() {
        $this->pteroAPI->nodes->delete($this->id);
    }

    /**
     * Update the node
     *
     * @param array $data
     *
     * @return void
     */
    public function update($data = []) {
        $this->pteroAPI->nodes->update($this->id, $data);
    }

    /**
     * Get node configuration
     *
     * @return void
     */
    public function getConfiguration() {
        $this->pteroAPI->nodes->getConfiguration($this->id);
    }

    /**
     * Get a paginated list of allocations
     * 
     * @param int page
     * 
     * @return RessourceList
     */
    public function paginateAllocations($page = 1) {
        return $this->pteroAPI->allocations->paginate($this->id, $page);
    }

    /**
     * Create a new allocation for this node
     * 
     * @param array $data
     * 
     * @return Allocation
     */
    public function createAllocations($data) {
        return $this->pteroAPI->allocations->create($this->id, $data);
    }

    /**
     * Delete the given allocation of this node
     * 
     * @param int $id
     * 
     * @return void
     */
    public function deleteAllocations($id) {
        $this->pteroAPI->allocations->delete($this->id, $id);
    }
}

?>