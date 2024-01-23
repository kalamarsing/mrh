<?php

namespace App\Repositories;

use App\Role;
use App\Entities\User;
use Prettus\Repository\Eloquent\BaseRepository;
use DB;
use Datatables;
//use Lang;

class UserRepository extends BaseRepository
{
    public function model()
    {
        return 'App\\Entities\\User';
    }

    public function getDatatable()
    {
        $users = User::select([
            'users.*',
            DB::raw("CONCAT(users.firstname,' ',users.lastname) as full_name"),
        ]);

        return Datatables::of($users)
            ->filterColumn('full_name', function ($query, $keyword) {
                $query->whereRaw("users.firstname LIKE ?", ["%{$keyword}%"])
                ->orWhereRaw("users.lastname LIKE ?", ["%{$keyword}%"]);

            })
            ->addColumn('full_name', function ($item) {
                return $item->full_name;
            })
            ->filterColumn('email', function ($query, $keyword) {
                $query->whereRaw("users.email LIKE ?", ["%{$keyword}%"]);

            })
            ->addColumn('email', function ($item) {
                return $item->email;
            })
            ->addColumn('action', function ($item) {
                return '
                <a href="' . route('users.show', $item) . '" class="btn btn-link" data-toogle="edit" data-id="'.$item->id.'"><i class="fa fa-pencil"></i> Editar</a> &nbsp;
                <a href="#" class="btn btn-link text-danger" data-toogle="delete" data-ajax="' . route('users.delete', $item) . '" data-confirm-message="Estas segur/a?"><i class="fa fa-trash"></i> Esborrar</a> &nbsp;
                ';
            })
            ->order(function ($query) {
                $orders = request()->get('order');
                $columns = request()->get('columns');

                foreach ($orders as $order) {
                    $column = $order['column'];
                    $dir = $order['dir'];

                    switch ($columns[$column]['name']) {
                        case 'full_name':
                            $query->orderBy('users.firstname', $dir);
                        break;

                        case 'email':
                            $query->orderBy('users.email', $dir);
                        break;

                    }
                }
            })
            ->make(true);
    }

    public function getAllByRoles($roles)
    {
        $roles = ! is_array($roles) ? $roles = [$roles] : $roles;

        return User::whereHas('roles', function ($q) use ($roles) {
            $q->whereIn('name', $roles);
        })->get();
    }
}
