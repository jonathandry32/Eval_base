<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\RoleHasPermission;
use App\Models\ModelHasRole;

class RoleController extends Controller
{
    public function newRole()
    {
        $user = User::find(Auth::user()->idUser);

        if ($user->hasRole('admin')) {
            $roles =  Role::with('permissions')->get();
            $permissions =  Permission::all();
            $users =  User::all();
            
            return view('admin.Role_create', [
                'roles' => $roles,
                'permissions' => $permissions,
                'users' => $users,
            ]);
        }
    }

    public function attributPermissionToRole()
    {
        $user = User::find(Auth::user()->idUser);

        if ($user->hasRole('admin')) {
            $roles =  Role::with('permissions')->get();
            $permissions =  Permission::all();
            $users =  User::all();
            return view('admin.attribut_permission_role', [
                'roles' => $roles,
                'permissions' => $permissions,
                'users' => $users,
            ]);
        }
    }

    public function attributRoleUser()
    {
        $user = User::find(Auth::user()->idUser);

        if ($user->hasRole('admin')) {
            $roles =  Role::with('permissions')->get();
            $permissions =  Permission::all();
            $users =  User::all();
            return view('admin.attribut_role_user', [
                'roles' => $roles,
                'permissions' => $permissions,
                'users' => $users,
            ]);
        }
    }

    public function create_role(Request $request)
    {
        $user = User::find(Auth::user()->idUser);

        if ($user->hasRole('admin')) {
            $role = $request->role;
            Role::create(['name' => $role]);
            return redirect()->back()->with('success', 'role creer');
        }
        return redirect()->back()->with('success', 'permission non accordée');
    }

    public function create_permission(Request $request)
    {
        $user = User::find(Auth::user()->idUser);

        if ($user->hasRole('admin')) {

            $permission = $request->permission;
            $idRole = $request->idRole;
            Permission::create(['name' => $permission]);
            return redirect()->back()->with('success', 'permission creer');
        }
        return redirect()->back()->with('success', 'permission non accordée');
    }

    public function attach_permission_to_role(Request $request)
    {
        $user = User::find(Auth::user()->idUser);

        if ($user->hasRole('admin')) {

            $idPermissions = $request->idPermissions;
            $permissionNames = Permission::whereIn('id', $idPermissions)->pluck('name');
            $idRole = intval($request->idRole);
            $role = Role::firstOrCreate(["id" => $idRole]);
            foreach ($permissionNames as $permissionName) {
                $role->givePermissionTo($permissionName);
            }
            return redirect()->back()->with('success', 'attach permissions to a role enregister ');
        }
        return redirect()->back()->with('success', 'permission non accordée');
    }

    public function attribute_role_to_user(Request $request)
    {
        $user = User::find(Auth::user()->idUser);

        if ($user->hasRole('admin')) {
            $idUser = $request->idUser;
            $idRoles = $request->idRoles;
            $roleNames = Role::whereIn('id', $idRoles)->pluck('name');
            $user = User::find($idUser);
            foreach ($roleNames as $roleName) {
                $user->assignRole($roleName);
            }
            return redirect()->back()->with('success', 'attribute role to user enregister ');
        }
        return redirect()->back()->with('success', 'permission non accordée');
    }

    public function getUserRoles()
    {
        $user = User::find(Auth::user()->idUser);
  #      $roles = implode(', ',$user->getRoleNames());
        $roles = $user->getRoleNames();

        return $roles;
    }

    public function roleLists(){
        $user = User::find(Auth::user()->idUser);

        if ($user->hasRole('admin')) {
            $roles = Role::paginate(5);
            return view('admin.roleLists', ['roles' => $roles]);
        }
    }
    
    public function roleUsers(){
        $user = User::find(Auth::user()->idUser);

        if ($user->hasRole('admin')) {
            $users = User::paginate(5);
            return view('admin.roleUsers', ['users' => $users]);
        }
    }
    public function userRoles($idUser){
        $user = User::find(Auth::user()->idUser);

        if ($user->hasRole('admin')) {
            $user = User::find($idUser);
            $roles = ModelHasRole::where('model_id', $idUser)->get();
            return view('admin.userRoles', 
            [
                'roles' => $roles,
                'user' => $user
            ]);
        }
    }

    public function rolePermissions($idRole){
        $user = User::find(Auth::user()->idUser);

        if ($user->hasRole('admin')) {
            $role = Role::find($idRole);
            $permissions = RoleHasPermission::where('role_id', $idRole)->get();
            return view('admin.rolePermissions',
            [
                'permissions' => $permissions,
                'role' => $role
            ]);
        }
    }
    
    public function supprimerPermission(Request $request)
    {
        $user = User::find(Auth::user()->idUser);

        if ($user->hasRole('admin')) {
            RoleHasPermission::where('permission_id', $request->idPermission)
                    ->where('role_id', $request->idRole)
                    ->delete();
            return redirect()->route('role.roleLists');
        }
    }
    public function supprimerRole(Request $request)
    {
        $user = User::find(Auth::user()->idUser);

        if ($user->hasRole('admin')) {
            ModelHasRole::where('model_id', $request->idUser)
                    ->where('role_id', $request->idRole)
                    ->delete();
            return redirect()->route('role.roleUsers');
        }
    }
}
