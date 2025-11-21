<?php

namespace App\Repositories;



use App\Models\ProjectTypeModel;



class ProjectTypeRepository

{

    public function get()

    {

        return ProjectTypeModel::orderBy('id', 'desc')->get();

    }





    public function find($id)

    {

        return ProjectTypeModel::where('id', $id)->first();

    }



    public function create($data)

    {

        return ProjectTypeModel::create($data);

    }



    public function update($id, $data)

    {

        return ProjectTypeModel::where('id', $id)->update($data);

    }

    

    public function delete($id)

    {

        return ProjectTypeModel::where('id', $id)->delete();

    }



}

