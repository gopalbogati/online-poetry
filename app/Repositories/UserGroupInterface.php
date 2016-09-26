<?php
/**
 * Created by PhpStorm.
 * User: raghu
 * Date: 6/13/16
 * Time: 8:42 AM
 */

namespace App\Repositories;


interface UserGroupInterface
{
    public function getAll($query, $order, $by);

    public function find($id);

    public function save($data);

    public function getRoles();

    public function getPermissions();

    public function update($id, $data);

    public function userRoles($id);

    public function userPermissions($id);

    public function delete($ids);

} 