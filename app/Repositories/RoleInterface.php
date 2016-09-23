<?php
/**
 * Created by PhpStorm.
 * User: raghu
 * Date: 6/13/16
 * Time: 8:42 AM
 */

namespace App\Repositories;


interface RoleInterface
{
    public function findAll($query,$order,$by);

    public function find($id);

    public function create($role);

    public function update($id,$role);

    public function delete($ids);

} 