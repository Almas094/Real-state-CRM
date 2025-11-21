<?php
namespace App\Repositories;

use App\Models\UserLimit;

class UserLimitRepository
{
    public function get()
    {
        return UserLimit::orderBy('id', 'desc')->get();
    }


    public function find($id)
    {
        return UserLimit::where('id', $id)->first();
    }

    public function create($data)
    {
        return UserLimit::create($data);
    }

    public function update($id, $data)
    {
        return UserLimit::where('id', $id)->update($data);
    }
    
    public function delete($id)
    {
        return UserLimit::where('id', $id)->delete();
    }

}
