<?php

namespace SKHR\PteroAPI\Managers;

use SKHR\PteroAPI\Resources\RessourceList;

class NestManager extends Manager {

    /**
     * Get a paginated list of nests
     *
     * @param int $page
     * @param array $query
     *
     * @return RessourceList
     */
    public function paginate($page = 1, $query = [])
    {
        return $this->pteroAPI->http->get('nests', array_merge([
            'page' => $page,
        ], $query));
    }

    /**
     * Get a nest instance by id
     *
     * @param int $nestId
     * @param array $query
     *
     * @return Nest
     */
    public function get($nestId, $query = []) {
        return $this->pteroAPI->http->get("nests/$nestId", $query);
    }
}

?>