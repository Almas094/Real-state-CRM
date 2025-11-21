<?php

namespace App\Repositories;



use App\Models\FeaturesModel;



class FeaturesRepository

{

    public function get()

    {

        return FeaturesModel::orderBy('id', 'desc')->get();

    }





    public function find($id)

    {

        return FeaturesModel::where('id', $id)->first();

    }



    public function create($data)

    {

        return FeaturesModel::create($data);

    }



    public function update($id, $data)

    {

        return FeaturesModel::where('id', $id)->update($data);

    }

    

    public function delete($id)

    {

        return FeaturesModel::where('id', $id)->delete();

    }



}

