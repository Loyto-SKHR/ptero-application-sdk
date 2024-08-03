<?php

namespace SKHR\PteroAPI\Resources;

use SKHR\PteroAPI\Resources\ResourceList;
use SKHR\PteroAPI\Resources\Egg;

class Nest extends Resource {

    /**
     * Get a paginated list of eggs
     *
     * @param int $page
     * @param array $query
     *
     * @return RessourceList
     */
    public function paginateEgg($page = 1, $query = []) {
        return $this->pteroAPI->eggs->paginate($this->id, $page, $query);
    }

    /**
     * Get a egg instance by id
     *
     * @param int $eggId
     * @param array $query
     *
     * @return Egg
     */
    public function getEgg($eggId, $query = []) {
        return $this->pteroAPI->eggs->get($this->id, $eggId, $query);
    }
}

?>