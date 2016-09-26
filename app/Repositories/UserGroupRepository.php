<?php
/**
 * Created by PhpStorm.
 * User: raghu
 * Date: 6/13/16
 * Time: 8:43 AM
 */

namespace App\Repositories;
use App\User;
use Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserGroupRepository implements UserGroupInterface
{

    const USER_FIELD = 'administration';

    public function getAll($query, $order, $by)
    {
        return User::where('name', 'like', '%' . $query . '%')
            ->where('user_field', self::USER_FIELD)
            ->orderBy($by, $order)
            ->paginate(env('DEF_PAGE_LIMIT', 8));
    }

    public function save($data)
    {

        $data['password'] = Hash::make($data['password']);
        $data['user_field'] = self::USER_FIELD;

        try {

            $user = User::create($data);
            $user = User::find($user->id);

            // Attach Role
            foreach ($data['roles'] as $val) {
                $user->assignRole($val);
            }


            foreach ($data['permissions'] as $val) {
                $user->givePermissionTo($val);
            }

        } catch (Exception $e) {

        }

        return true;

    }

    public function find($id)
    {
        return User::find($id);
    }

    public function getRoles()
    {
        return Role::pluck('name', 'name');
    }

    public function getPermissions()
    {
        return Permission::pluck('name', 'name');
    }

    public function update($userId, $data)
    {
        $user = User::find($userId);
        $user->roles()->detach();
        $user->permissions()->detach();

        if ($data['roles'] != '') {
            foreach ($data['roles'] as $val) {
                $user->assignRole($val);
            }
        }

        if ($data['permissions'] != '') {
            foreach ($data['permissions'] as $val) {
                $user->givePermissionTo($val);
            }
        }

        return $user->update($data);
    }

    public function userRoles($user)
    {
        $roles = [];
        foreach ($user->roles()->pluck('name') as $val) {
            $roles[] = $val;
        }
        return $roles;
    }

    public function userPermissions($user)
    {
        $permissions = [];
        foreach ($user->permissions()->pluck('name') as $val) {
            $permissions[] = $val;
        }
        return $permissions;
    }

    public function delete($ids)
    {
        foreach ($ids as $id) {
            $user = User::find($id);

            $user->roles()->detach();
            $user->permissions()->detach();

            $user->delete($id);
        }
        return true;
    }

} 