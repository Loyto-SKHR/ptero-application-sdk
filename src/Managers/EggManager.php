<?php

namespace SKHR\PteroAPI\Managers;

use SKHR\PteroAPI\Resources\RessourceList;

class EggManager extends Manager {
    
    /**
     * Get a paginated list of eggs
     *
     * @param int $nestId
     * @param int $page
     * @param array $query
     *
     * @return RessourceList
     */
    public function paginate($nestId, $page = 1, $query = []) {
        return $this->pteroAPI->http->get("nests/$nestId/eggs", array_merge([
            'page' => $page,
        ], $query));
    }

    /**
     * Get a egg instance by id
     *
     * @param int $nestId
     * @param int $eggId
     * @param array $query
     *
     * @return Egg
     */
    public function get($nestId, $eggId, $query = []) {
        return $this->pteroAPI->http->get("nests/$nestId/eggs/$eggId", $query);
    }
}

?>