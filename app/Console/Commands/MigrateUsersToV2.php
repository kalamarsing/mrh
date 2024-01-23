<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Entities\User;
use App\Entities\Old\OldUser;
use App\Entities\Role;
use App\Entities\Old\OldRole;
use Hash;

class MigrateUsersToV2 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mrh:migrate-users-to-v2';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '01 - Migrates users from database v1 version to v2';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $oldRoles = OldRole::all();
        $iRoles = 0;

        foreach($oldRoles as $oldRole){
            $role = new Role();
            $role->id = $oldRole->roleid ;
            $role->name = $oldRole->nombre ;

            $role->save();

            $iRoles++;
        }




        $oldUsers = OldUser::all();
        $i = 0;

        foreach($oldUsers as $oldUser){
            $user = new User();
            $user->id = $oldUser->usuarioid ;
            $user->name = $oldUser->nombre ;
            $user->surname = $oldUser->apellido ;
            $user->email = $oldUser->email ;
            $user->password = trim(Hash::make($oldUser->password));
            $user->public_password = $oldUser->password ;
            $user->type = $oldUser->permisos ;
            $user->dni = $oldUser->dni ;
            $user->phone = $oldUser->telefono ;
            $user->mobile = $oldUser->movil ;
            $user->address = $oldUser->direccion ;
            $user->postal_code = $oldUser->cp;
            $user->city = $oldUser->poblacion ;
            $user->province = $oldUser->provincia ;
            $user->account = $oldUser->cuenta ;
            $user->bank = $oldUser->banco ;
            $user->comments = $oldUser->observaciones ;
            $user->image = $oldUser->imagen ;
            $user->active = $oldUser->activo != ''? $oldUser->activo: 0;
            if($oldUser->rolid > 0){
                $user->role_id  = $oldUser->rolid;
            }
            $user->save();

            $i++;

        }
        return $i.' usuarios migrados a v2'.
            $iRoles.' roles migrados a v2';
    }
}
