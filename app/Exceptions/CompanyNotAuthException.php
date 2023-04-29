<?php

namespace App\Exceptions;

use Exception;

class CompanyNotAuthException extends Exception
{
    public function render()
    {
        return response([
            'Success'   => false,
            'Message'   => 'Invalid Date',
            'Errors'    => ['Company Not Found OR Not Auth'],
        ]);
    }
}
