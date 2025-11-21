<?php

namespace App\Repositories;
use App\Models\User;

class UserRepository
{

    public function get()
    {
        return User::with('role')->orderBy('id', 'desc')->get();
    }

    public function find($id)
    {
        return User::where('id', $id)->first();
    }

    public function create($data)
    {
        return User::create($data);
    }

    public function update($id, $data)
    {
        return User::where('id', $id)->update($data);
    }

    public function delete($id)
    {
        return User::where('id', $id)->delete();
    }

    public function getClientList($request)
    {
         $clients = User::with(['role','latestOrder.userPlan']);
            if(!empty($request->name)){
                $clients->where('name', 'like', '%'.$request->name.'%');
                $query->orWhere('company_name', 'like', '%'.$request->name.'%');
            }
           

            if(!empty($request->status)){
                $clients->where('status', $request->status);
            }
            $clients->where('role_id', 2)->get();
            return $clients;
    }
     
    public function getClientDetail($id)
    {
         $clients = User::whereHas('role', function ($query) {
            $query->where('id', 2);
        })->with(['role','order.userPlan'])->where('id',$id)->first();
        return $clients;
    }

}

