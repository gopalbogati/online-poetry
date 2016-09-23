<?php

namespace App\Repositories;

use Spatie\Permission\Models\Permission;

class PermissionRepository implements PermissionInterface
{

    public function getAll($query, $order,$by)
    {
        return Permission::where('name', 'like', '%' . $query . '%')
            ->orderBy($by,$order)
            ->paginate(env('DEF_PAGE_LIMIT', 8));
    }

    public function create($role)
    {
        return Permission::create($role);
    }

    public function find($id)
    {
        return Permission::find($id);
    }

    public function update($id, $permissionData)
    {
        $role = Permission::find($id);
        return $role->update($permissionData);
    }

    public function delete($ids)
    {
        return Permission::destroy($ids);
    }

} 