<?php

namespace App\Jobs\User;

use App\Entities\User;
use App\Http\Requests\User\UpdateUserRequest;
//use App\Jobs\Email\SendMailTemplate;
use Hash;


class UpdateUser
{
    private $attributes;

    public function __construct(User $user, $attributes)
    {
        $this->attributes = array_only($attributes, [
            'firstname', 
            'lastname', 
            'email', 
            'password',
            'role_id'
        ]);

        $this->user = $user;
    }

    public static function fromRequest(User $user, UpdateUserRequest $request)
    {
        return new self($user, $request->all());
    }

    public function handle()
    {
        if(trim($this->attributes['password']) !== '') {
            $this->attributes['password'] = Hash::make(trim($this->attributes['password']));
        } else {
            array_forget($this->attributes, 'password');
        }

       // $this->user->roles()->sync($this->attributes['role_id']); there's no other users than admin

        return $this->user->update($this->attributes);
    }
}
