<?php

namespace App\Exceptions;

use InvalidArgumentException;
use App\Entities\Role;

class RoleIsBadObjectException extends InvalidArgumentException
{
    public static function create()
    {
        return new static('Parameter role must be a '.Role::class.' object');
    }
}
