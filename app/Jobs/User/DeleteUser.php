<?php

namespace App\Jobs\User;

use App\Entities\User;
use App\Http\Requests\User\DeleteUserRequest;

class DeleteUser
{
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public static function fromRequest(User $user, DeleteUserRequest $request)
    {
        return new self($user);
    }

    public function handle()
    {

        return $this->user->delete();
    }
}
