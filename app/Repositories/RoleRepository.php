<?php
/**
 * Created by PhpStorm.
 * User: raghu
 * Date: 6/13/16
 * Time: 8:43 AM
 */

namespace App\Repositories;

use Spatie\Permission\Models\Role;

class RoleRepository implements RoleInterface
{
    public function findAll($query, $order,$by)
    {
        $result = Role::where('name', 'like', '%' . $query . '%')
            ->orderBy($by,$order)
            ->paginate(env('DEF_PAGE_LIMIT', 8));
        return $result;
    }

    public function find($id)
    {
        return Role::find($id);
    }

    public function create($role)
    {
        return Role::create($role);
    }

    public function update($id, $data)
    {
        $role = Role::find($id);
        return $role->update($data);
    }

    public function delete($ids)
    {
        return Role::destroy($ids);
    }

}