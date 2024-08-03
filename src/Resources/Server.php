<?php

namespace SKHR\PteroAPI\Resources;

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
        return $this->pteroAPI->servers->updateBuild($this->id, $data);
    }

    /**
     * Update startup of the server
     *
     * @param array $data
     *
     * @return void
     */
    public function updateStartup($data) {
        return $this->pteroAPI->servers->updateStartup($this->id, $data);
    }

    /**
     * Suspend the server
     *
     * @return void
     */
    public function suspend() {
        return $this->pteroAPI->servers->suspend($this->id);
    }

    /**
     * Unsuspend the server
     *
     * @return void
     */
    public function unsuspend() {
        return $this->pteroAPI->servers->unsuspend($this->id);
    }

    /**
     * Reinstall the server
     *
     * @return void
     */
    public function reinstall() {
        return $this->pteroAPI->servers->reinstall($this->id);
    }

    /**
     * Delete the server
     * 
     * @param bool $force
     *
     * @return void
     */
    public function delete($force = false) {
        return $this->pteroAPI->servers->delete($this->id, $force);
    }
}

?>