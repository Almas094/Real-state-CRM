<?php
namespace App\Repositories;

use App\Models\Role;

class RolesRepository
{
    public function get()
    {
        return Role::orderBy('id', 'desc')->get();
    }


    public function find($id)
    {
        return Role::where('id', $id)->first();
    }

    public function create($data)
    {
        return Role::create($data);
    }

    public function update($id, $data)
    {
        return Role::where('id', $id)->update($data);
    }
    
    public function delete($id)
    {
        return Role::where('id', $id)->delete();
    }

}
