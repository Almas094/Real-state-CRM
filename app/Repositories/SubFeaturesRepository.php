<?php

namespace App\Repositories;



use App\Models\SubFeaturesModel;



class SubFeaturesRepository

{

    public function get()

    {

        return SubFeaturesModel::with('features')->orderBy('id', 'desc')->get();

    }





    public function find($id)

    {

        return SubFeaturesModel::with('features')->where('id', $id)->first();

    }



    public function create($data)

    {

        return SubFeaturesModel::create($data);

    }



    public function update($id, $data)

    {

        return SubFeaturesModel::where('id', $id)->update($data);

    }

    

    public function delete($id)

    {

        return SubFeaturesModel::where('id', $id)->delete();

    }



}

