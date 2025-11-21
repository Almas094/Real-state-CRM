<?php

namespace App\Http\Controllers;
use App\Services\CouponService;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CouponController extends Controller
{
    public function __construct(CouponService $couponService)
    {
        $this->couponService = $couponService;
    }
    
    public function index(){
        return view('master.coupon');
    }

     public function list(Request $request)
    {
        $subscriptions = $this->couponService->get();
        return response()->json([
            'data' => $subscriptions
        ]);
    }
     
    
     public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'       => 'required|string|max:100|unique:coupon,name',
            'type'       => 'required',
            'type_value' => 'required',
            'status'     => 'required|in:active,inactive',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $coupon = $this->couponService->create($request->only(['name', 'type','type_value','status']));

        return response()->json([
            'success' => true,
            'message' => 'Coupon created successfully.',
            'data'    => $coupon
        ]);
    }

    public function updateStatus(Request $request)
    {
        
        $updated = $this->couponService->update($request->id, $request->only(['status']));
        return response()->json(['success' => (bool)$updated]);
    }

    public function edit($id)
    {
        $subscription = $this->couponService->find($id);
        return response()->json([
            'success' => $subscription ? true : false,
            'data' => $subscription
        ]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name'           => 'required|string|max:100|unique:subscription,name,' . $id,
            'type'           => 'required',
            'type_value'     => 'required|integer',
            'status'         => 'required|in:active,inactive',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $data=[
            'name'          =>$request->name,
            'type'          =>$request->type,
            'type_value'    =>$request->type_value,
            'status'        =>$request->status,
        ];
        $updated = $this->couponService->update($id, $data);

        return response()->json([
            'success' => (bool)$updated,
            'message' => $updated ? 'Coupon updated successfully.' : 'Failed to update coupon.'
        ]);
    }


    public function delete($id)
    {
        try {
            $deleted = $this->couponService->delete($id);

            if ($deleted) {
                return response()->json([
                    'success' => true,
                    'message' => 'Coupon deleted successfully.'
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Coupon not found or could not be deleted.'
                ], 404);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while deleting the coupon.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function validateCoupon(Request $request)
    {
        $coupon = $this->couponService->check($request);
        
        // Valid coupon
        if($coupon) {
            return response()->json([
                'success' => true,
                'data' => [
                    'code'  => $coupon['code'],
                    'type'  => $coupon['type'],     // percentage | amount
                    'value' => $coupon['type_value'],    // number
                    'message' => 'Coupon applied successfully'
                ],
            ], 200);
        }
        else{
            return response()->json([
                'success' => false,
                'message' => $coupon['message'] ?? 'Coupon not found.',
            ], 200);
        }
    }


}
