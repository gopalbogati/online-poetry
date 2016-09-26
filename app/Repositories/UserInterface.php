<?php
namespace App\Repositories;


interface UserInterface
{

    public function findAll($limit = 99999, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1]);

    public function find($id);

    public function findlist();

    public function save($data);

    public function update($id, $role);

    public function delete($ids);

    public function changeStatus($id);

}
