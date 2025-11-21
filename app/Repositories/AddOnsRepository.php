<?php

namespace App\Repositories;



use App\Models\AddOnsModel;



class AddOnsRepository

{

    public function get()

    {

        return AddOnsModel::orderBy('id', 'desc')->get();

    }





    public function find($id)

    {

        return AddOnsModel::where('id', $id)->first();

    }



    public function create($data)

    {

        return AddOnsModel::create($data);

    }



    public function update($id, $data)

    {

        return AddOnsModel::where('id', $id)->update($data);

    }

    

    public function delete($id)

    {

        return AddOnsModel::where('id', $id)->delete();

    }



}

