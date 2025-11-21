<?php

namespace App\Http\Controllers;
use App\Services\UserService;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    
    public function index(){
        return view('master.coupon');
    }

     public function list(Request $request)
    {
        $subscriptions = $this->userService->get();
        return response()->json([
            'data' => $subscriptions
        ]);
    }
    
     
    
     public function store(UserRequest $request)
    {
        $user = $request->all();
        $coupon = $this->userService->create($data);

        return response()->json([
            'success' => true,
            'message' => 'User created successfully.',
            'data'    => $user
        ]);
    }

    public function updateStatus(Request $request)
    {
        
        $updated = $this->userService->update($request->id, $request->only(['status']));
        return response()->json(['success' => (bool)$updated]);
    }

    public function edit($id)
    {
        $subscription = $this->userService->find($id);
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
        $updated = $this->userService->update($id, $data);

        return response()->json([
            'success' => (bool)$updated,
            'message' => $updated ? 'Coupon updated successfully.' : 'Failed to update coupon.'
        ]);
    }


    public function delete($id)
    {
        try {
            $deleted = $this->userService->delete($id);

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




}
