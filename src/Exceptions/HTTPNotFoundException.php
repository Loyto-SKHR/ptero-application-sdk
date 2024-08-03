<?php

namespace SKHR\PteroAPI\Exceptions;

use Exception;

class HTTPNotFoundExecption extends Exception {
    
    public function __construct() {
        parent::__construct("The resource you are looking for could not be found.");
    }
}

?>