<?php

namespace App\Exceptions;

use Exception;

class RiderNotWorkingException extends Exception
{
    public function render()
    {
        return response([
            'Success'   => false,
            'Message'   => 'Invalid Date',
            'Errors'    => ['Rider Not Working Now'],
        ]);
    }
}
