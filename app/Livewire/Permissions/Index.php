<?php

namespace App\Livewire\permissions;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Index extends Component
{
    public $userPermissionNames = [];
    public $user;
    public $show;
    public $permissionName;


    public function getRole() // get the user role with the user name (look User register controller)
    {
        return Role::where(['name' => $this->user])->get()[0] ?? false;
    }

    public function reload()
    {
        $this->js('window.location.reload()');
    }

    public function getUserPermissionNames()
    {
        $role = $this->getRole();
        if ($role) {
            $this->userPermissionNames =  $role->permissions->pluck('name');
            $this->show = 1;
        } else {
            $this->show = 0;
        }
    }

    //    Manual create permissions
    public function createPermission()
    {
        // $role = Role::where(['name' => Auth::user()->name])->get();

        Permission::create(['name' => 'showQntOption']);

        // $role[0]->givePermissionTo($permission);
    }

    public function cahngePermissionState($val)
    {

        $role = $this->getRole();
        $userHasPermissionTo = $role->hasPermissionTo($val);

        if ($userHasPermissionTo) {
            $role->revokePermissionTo($val);
            $this->userPermissionNames =  $role->permissions->pluck('name');
        } else {
            $role->givePermissionTo($val);
            $this->userPermissionNames =  $role->permissions->pluck('name');
        }
    }

    public function render()
    {
        $data = User::where(['is_admin' => 1])->get();

        return view('livewire.permessions.index', [
            'data' => $data,
            'allPermissionNames' => Permission::all()->pluck('name'),
        ]);
    }
}


    // Manual create permissions
    // public function createRole()
    // {
    //     $role = Role::where(['name' => Auth::user()->name])->get();

    //     $permission = Permission::create(['name' => 'showPermessionsSidebar']);

    //     $role[0]->givePermissionTo($permission);
    // }
