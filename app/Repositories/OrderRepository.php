<?php
namespace App\Repositories;
use App\Models\OrderModel;

class OrderRepository
{
    public function get()
    {
        return OrderModel::orderBy('id', 'desc')->get();
    }


    public function find($id)
    {
        return OrderModel::where('id', $id)->first();
    }
    
    public function check($data)
    {
        return OrderModel::where('name', $data->code)->first();
    }

    public function create($data)
    {
        return OrderModel::create($data);
    }

    public function update($id, $data)
    {
        return OrderModel::where('id', $id)->update($data);
    }
    
    public function delete($id)
    {
        return OrderModel::where('id', $id)->delete();
    }

    public function getOrderList($request){
        $result=OrderModel::with('user','userPlan');
            if(!empty($request->order_status)){
                $result->where('status', $request->order_status);
            }
            if(!empty($request->user_plan_id)){
                $result->where('user_plan_id', $request->user_plan_id);
            }
            if(!empty($request->no_of_month)){
                $result->where('no_of_month', $request->no_of_month);
            }
            if(!empty($request->start_date) && !empty($request->end_date)){
                $result->whereDate('expiry_date','>=', $request->start_date);
                $result->whereDate('expiry_date','<=', $request->end_date);
            }
            else if(!empty($request->start_date) && empty($request->end_date)){
                $result->whereDate('expiry_date','>=', $request->start_date);
            }
            else if(empty($request->start_date) && !empty($request->end_date)){
                $result->whereDate('expiry_date','<=', $request->end_date);
            }
        $query=$result->get();
        
        return $query;
    }

    public function getOrderDetail($id)
    {
        $result = OrderModel::with('user', 'userPlan')->find($id);
        return $result;
    }
}