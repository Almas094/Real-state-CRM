<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderModel extends Model
{
    use HasFactory;

    protected $table="orders";
    protected $fillable =[
        'user_id',
        'order_id',
        'user_plan_id',
        'no_of_month',
        'payment_mode',
        'is_free',
        'coupon_id',
        'coupon_code',
        'discount_amount',
        'sub_total',
        'gst_amount',
        'grand_total',
        'txn_id',
        'status',
        'start_date',
        'expiry_date',
        'attachment',
    ];

    public function userPlan(){
        return $this->belongsTo(UserPlanModel::class,'user_plan_id');
    }
    
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }


}
