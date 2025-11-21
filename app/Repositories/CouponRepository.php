<?php
namespace App\Repositories;
use App\Models\CouponModel;

class CouponRepository
{
    public function get()
    {
        return CouponModel::orderBy('id', 'desc')->get();
    }


    public function find($id)
    {
        return CouponModel::where('id', $id)->first();
    }
    
    public function check($data)
    {
        return CouponModel::where('name', $data->code)->first();
    }

    public function create($data)
    {
        return CouponModel::create($data);
    }

    public function update($id, $data)
    {
        return CouponModel::where('id', $id)->update($data);
    }
    
    public function delete($id)
    {
        return CouponModel::where('id', $id)->delete();
    }

}