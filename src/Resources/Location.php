<?php

namespace SKHR\PteroAPI\Resources;

class Location extends Resource {

    /**
     * Update the location
     *
     * @param array $data
     *
     * @return void
     */
    public function update(array $data = []) {
        $data = array_merge([
            'short' => $this->short,
            'long'  => $this->long,
        ], $data);

        $this->pteroAPI->locations->update($this->id, $data);
    }

    /**
     * Delete the location
     *
     * @return void
     */
    public function delete() {
        $this->pteroAPI->locations->delete($this->id);
    }
}