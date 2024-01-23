<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Entities\Role;
use App\Exceptions\RoleDoesNotExistException;
use App\Exceptions\RoleIsBadObjectException;

trait HasRoles
{
    /**
     * roles relation.
     *
     * @return relationship
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'users_roles');
    }

    /**
     * Check if has a role.
     *
     * @param string $role
     *
     * @return bool
     */
    public function hasRole($role)
    {
        return $this->roles()->where('identifier', is_object($role) ? $role->identifier : $role)->get()->isNotEmpty();
    }

    /**
     * Check if has various roles.
     *
     * @param string $roles
     *
     * @return bool
     */
    public function hasRoles(array $identifiers)
    {
        return $this->roles()->whereIn('identifier', $identifiers)->count() == sizeof($identifiers) ? true : false;
    }

    /**
     * Add role to user.
     *
     * @param string $role
     *
     * @return bool
     */
    public function addRole($role)
    {
        $this->roles()->attach([
            $this->getRoleById($role)->id,
        ]);

        $this->load('roles');
    }

    /**
     * Remove role.
     *
     * @param string $role
     *
     * @return bool
     */
    public function removeRole($role)
    {
        $this->roles()->detach([
            $this->getRoleById($role)->id,
        ]);

        $this->load('roles');
    }

    /**
     * Retrive role by his identifier.
     *
     * @param string $role
     *
     * @return Role
     */
    private function getRoleById($role)
    {
        if (!is_object($role)) {
            $role = Role::where('id', $role)->first();

            if (!$role) {
                throw new RoleDoesNotExistException();
            }
        }

        if (!is_a($role, Role::class)) {
            throw new RoleIsBadObject();
        }

        return $role;
    }
}
