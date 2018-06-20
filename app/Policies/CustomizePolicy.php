<?php

namespace App\Policies;

use App\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class CustomizePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the customize.
     *
     * @param  \App\User  $user
     * @param  \App\Customize  $customize
     * @return mixed
     */
    public function view(Admin $user)
    {
        return $this->getPermission($user,19);
    }

    /**
     * Determine whether the user can create customizes.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(Admin $user)
    {
        return $this->getPermission($user,20);
    }

    /**
     * Determine whether the user can update the customize.
     *
     * @param  \App\User  $user
     * @param  \App\Customize  $customize
     * @return mixed
     */
    public function update(Admin $user)
    {
        return $this->getPermission($user,21);
    }

    /**
     * Determine whether the user can delete the customize.
     *
     * @param  \App\User  $user
     * @param  \App\Customize  $customize
     * @return mixed
     */
    public function delete(Admin $user)
    {
        return $this->getPermission($user,22);
    }
    /**
     * Get permission function with $user and $permission_id
     */

    protected function getPermission($user,$p_id){

        foreach ($user->role->permissions as $permission) {
            if ($permission->id == $p_id) {
                return true;
            }
        }
        return false;
    }
}
