<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Illuminate\Support\Facades\Auth;
use App\Repositories\UserRepository;
//use Session;

// Models
use App\Entities\User;
use App\Entities\Role;
/*
// Create
use App\Http\Requests\User\CreateUserRequest;
use App\Jobs\User\CreateUser;

// Update
use App\Http\Requests\User\UpdateUserRequest;
use App\Jobs\User\UpdateUser;

// Delete
use App\Http\Requests\User\DeleteUserRequest;
use App\Jobs\User\DeleteUser;
*/

class UserController extends Controller
{

    public function __construct(UserRepository $users) {
        $this->users = $users;
    }

  /*  public function index()
    {
        return view('admin.users.index', [
            "users" => User::all()
        ]);
    }

    public function data()
    {
        return $this->users->getDatatable();
    }

    public function create()
    {
        return view('admin.users.form');
    }

    public function show(User $user)
    {
        return view('admin.users.form', [
            'user' => $user
        ]);
    }

    public function update(User $user, UpdateUserRequest $request)
    {
        dispatch_now(UpdateUser::fromRequest($user, $request));

        return redirect(route('users.show', $user))
            ->with('success', 'Usuari modificat correctament');
    }

    public function store(CreateUserRequest $request)
    {
        $user = dispatch_now(CreateUser::fromRequest($request));

        return redirect(route('users.show', $user))->with('success', 'Usuari creat correctament');
    }

    public function delete(User $user, DeleteUserRequest $request)
    {
        return dispatch_now(DeleteUser::fromRequest($user, $request)) ? response()->json([
            'success' => true
        ]) : response()->json([
            'success' => false
        ], 500);
    }*/
}
