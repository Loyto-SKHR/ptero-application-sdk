<?php

namespace SKHR\PteroAPI\Resources;

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
}