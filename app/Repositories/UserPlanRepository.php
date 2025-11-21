<?php

namespace App\Repositories;



use App\Models\UserPlanModel;



class UserPlanRepository

{

    public function get()

    {

        return UserPlanModel::orderBy('id', 'desc')->get();

    }





    public function find($id)

    {

        return UserPlanModel::where('id', $id)->first();

    }



    public function create($data)

    {

        return UserPlanModel::create($data);

    }



    public function update($id, $data)

    {
        return UserPlanModel::where('id', $id)->update($data);

    }

    

    public function delete($id)

    {

        return UserPlanModel::where('id', $id)->delete();

    }



}

