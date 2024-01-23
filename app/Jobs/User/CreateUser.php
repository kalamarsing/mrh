<?php

namespace App\Jobs\User;

use App\Entities\User;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Requests\User\CreateUserRequest;

use Hash;

class CreateUser
{

    private $attributes;

    public function __construct($attributes)
    {
        $this->attributes = array_only($attributes, [
            'name', 
            'surname', 
            'email', 
            'password',
          //  'public_password',
            'type',
            'dni',
            'phone',
            'mobile',
            'address',
            'city',
            'province',
            'account',
            'bank',
            'comments',
            'image',
            'role_id'
        ]);
    }

    public static function fromRequest(CreateUserRequest $request)
    {
        return new self($request->all());
    }

    public function handle()
    {
        $this->attributes['password'] = trim(Hash::make($this->attributes['password']));
        $user = User::create($this->attributes);
        //it must come from form, value for admin user. there's no front userr in this project
        $this->attributes['role_id'] = 1; 
        if(isset($this->attributes['role_id'])) {
            $user->roles()->sync($this->attributes['role_id']);
        }

        return $user;
    }
}
