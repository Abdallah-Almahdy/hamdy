<?php

namespace App\Policies;

use App\Models\User;
use App\Models\section;
use Illuminate\Auth\Access\Response;
use Spatie\Permission\Models\Role;

class sectionPolicy
{
    // /**
    //  * Determine whether the user can view any models.
    //  */
    // public function viewAny(User $user)
    // {
    //     //
    // }

    // /**
    //  * Determine whether the user can view the model.
    //  */
    public function view(User $user): bool
    {
        if ($user->can('showSectionsSidebar')) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        // $role = Role::where(['name' =>  $user])->get()[0];
        // return $role->hasPermissionTo('product.create');
        if ($user->can('section.create')) {
            return true;
        } else {
            return false;
        }
    }

    // /**
    //  * Determine whether the user can update the model.
    //  */
    public function update(User $user)
    {
        if ($user->can('section.edit')) {
            return true;
        } else {
            return false;
        }
    }

    // /**
    //  * Determine whether the user can delete the model.
    //  */
    public function delete(User $user): bool
    {
        if ($user->can('section.delete')) {
            return true;
        } else {
            return false;
        }
    }

    // /**
    //  * Determine whether the user can restore the model.
    //  */
    // public function restore(User $user, section $section)
    // {
    //     //
    // }

    // /**
    //  * Determine whether the user can permanently delete the model.
    //  */
    // public function forceDelete(User $user, section $section)
    // {
    //     //
    // }
}
