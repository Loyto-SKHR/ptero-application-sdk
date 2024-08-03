<?php

namespace SKHR\PteroAPI\Managers;

use SKHR\PteroAPI\Resources\RessourceList;
use SKHR\PteroAPI\Resources\User;

class UserManager extends Manager {

    /**
     * Get paginated list of users
     *
     * @param int $page
     * @param array $query
     *
     * @return RessourceList
     */
    public function paginate($page = 1, $query = []) {
        return $this->pteroAPI->http->get('users', array_merge([
            'page' => $page,
        ], $query));
    }

    /**
     * Get a user instance by user id
     *
     * @param int $userId
     * @param array $query
     *
     * @return User
     */
    public function get($userId, $query = []) {
        return $this->pteroAPI->http->get("users/$userId", $query);
    }

    /**
     * Get a user instance by user external id
     *
     * @param string $externalId
     * @param array $query
     *
     * @return User
     */
    public function getByExternalid($externalId, $query = []) {
        return $this->pteroAPI->http->get("users/external/$externalId", $query);
    }

    /**
     * Create a new user
     *
     * @param array $data
     *
     * @return User
     */
    public function create($data) {
        return $this->pteroAPI->http->post('users', [], $data);
    }

    /**
     * Update a specified user
     *
     * @param int $userId
     * @param array $data
     *
     * @return User
     */
    public function update($userId, $data) {
        return $this->pteroAPI->http->patch("users/$userId", [], $data);
    }

    /**
     * Delete the given user
     *
     * @param int $userId
     *
     * @return void
     */
    public function delete($userId) {
        return $this->pteroAPI->http->delete("users/$userId");
    }
}

?>