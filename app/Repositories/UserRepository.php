<?php
namespace App\Repositories;

use App\User;

class UserRepository implements UserInterface
{
    private static $path = '/asset/uploads/banner';

    public function findAll($limit=99999, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    {
        $result = User::when(array_keys($filter, true), function ($query) use ($filter) {
            $query->where('title', 'like', '%' . $filter['title'] . '%');
            return $query;
        })
            ->whereIn('status', $status)
            ->orderBy($sort['by'], $sort['sort'])
            ->paginate(env('DEF_PAGE_LIMIT', $limit));

        return $result;

    }

    public function find($id)
    {
        return User::find($id);
    }

    public function findlist()
    {
        return User::lists('title','id');
    }

    public function save($data)
    {
        $data['status'] = 1;
        return User::create($data);
    }

    public function update($id, $data)
    {
        $banner = User::find($id);
        return $banner->update($data);
    }

    public function upload($file)
    {
        $imageName = $file->getClientOriginalName();

        $fileName = date('Y-m-d-h-i-s') . '-' . preg_replace('[ ]', '-', $imageName);
        $file->move(public_path() . self::$path, $fileName);

        return $fileName;
    }

    public function delete($ids)
    {
        return User::destroy($ids);
    }

    /**
     * @param $id
     * @return bool
     */
    public function changeStatus($id)
    {

        $status = $this->getStatus($id);

        if ($status == 0) {
            $stat = 1;
        } elseif ($status == 1) {
            $stat = 0;
        }

        $row = User::find($id);
        $row->status = $stat;

        if ($row->save()) {

            return $this->getStatus($id);

        } else {

            return false;
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    private function getStatus($id)
    {

        $row = User::find($id);
        return $row->status;
    }

} 