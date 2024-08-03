<?php

namespace SKHR\PteroAPI\Managers;

use SKHR\PteroAPI\PteroAPI;

class Manager {

    /**
     * PteroAPI instance
     * 
     * @var PteroAPI
     */
    protected $pteroAPI;

    /**
     * Create a new Manager instance
     * 
     * @param PteroAPI $pteroAPI
     */
    public function __construct($pteroAPI) {
        $this->pteroAPI = $pteroAPI;
    }
}

?>