<?php

namespace SKHR\PteroAPI\Resources;

class ServerDatabase extends Resource {

    /**
     * Reset password of the database
     *
     * @return void
     */
    public function resetPassword() {
        $this->pteroAPI->databases->resetPassword($this->server, $this->id);
    }

    /**
     * Delete the database
     *
     * @param mixed $serverId
     * @param int   $databaseId
     *
     * @return void
     */
    public function delete()
    {
        $this->pteroAPI->databases->delete($this->server, $this->id);
    }
}

?>