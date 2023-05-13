<?php

namespace App\Exceptions;

use Exception;

class RiderWorkingException extends Exception
{
    public function render()
    {
        return response([
            'Success'   => false,
            'Message'   => 'Invalid Date',
            'Errors'    => ['Rider Working Now'],
        ]);
    }
}
