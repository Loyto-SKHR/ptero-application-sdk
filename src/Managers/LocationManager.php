<?php

namespace SKHR\PteroAPI\Managers;

use SKHR\PteroAPI\Resources\RessourceList;
use SKHR\PteroAPI\Resources\Location;

class LocationManager extends Manager {

    /**
     * Get a paginated list of locations.
     *
     * @param int $page
     * @param array $query
     *
     * @return RessourceList
     */
    public function paginate($page = 1, $query = []) {
        return $this->pteroAPI->http->get('locations', array_merge([
            'page' => $page,
        ], $query));
    }

    /**
     * Get a location instance
     *
     * @param int $locationId
     * @param array $query
     *
     * @return Location
     */
    public function get($locationId, $query = []) {
        return $this->pteroAPI->http->get("locations/$locationId", $query);
    }

    /**
     * Create a new location
     *
     * @param array $data
     *
     * @return Location
     */
    public function create($data) {
        return $this->pteroAPI->http->post('locations', [], $data);
    }

    /**
     * Update a specified location
     *
     * @param int $locationId
     * @param array $data
     *
     * @return Location
     */
    public function update($locationId, $data) {
        return $this->pteroAPI->http->patch("locations/$locationId", [], $data);
    }

    /**
     * Delete the given location
     *
     * @param int $locationId
     *
     * @return void
     */
    public function delete($locationId) {
        $this->pteroAPI->http->delete("locations/$locationId");
    }
}

?>