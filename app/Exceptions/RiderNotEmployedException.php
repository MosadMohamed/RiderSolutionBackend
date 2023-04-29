<?php

namespace App\Exceptions;

use Exception;

class RiderNotEmployedException extends Exception
{
    public function render()
    {
        return response([
            'Success'   => false,
            'Message'   => 'Invalid Date',
            'Errors'    => ['Rider Not Employed'],
        ]);
    }
}
