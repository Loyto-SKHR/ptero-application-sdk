<?php

namespace SKHR\PteroAPI\Exceptions;

use Exception;

class HTTPAccessDeniedExecption extends Exception {
    
    public function __construct() {
        parent::__construct("This action is unauthorized.");
    }
}

?>