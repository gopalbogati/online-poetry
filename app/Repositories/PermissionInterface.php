<?php
/**
 * Created by PhpStorm.
 * User: raghu
 * Date: 6/13/16
 * Time: 8:42 AM
 */

namespace App\Repositories;


interface PermissionInterface
{
    public function getAll($query, $order,$by);

    public function find($id);

    public function create($permission);

    public function update($id, $permissionData);

    public function delete($ids);

} 