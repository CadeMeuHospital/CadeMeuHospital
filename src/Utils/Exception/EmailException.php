<?php

class EmailException extends Exception{
    function __construct($message) {
        parent::__construct($message);
    }
}
