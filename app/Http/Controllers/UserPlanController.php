<?php

namespace App\Http\Controllers;
use App\Services\UserPlanService;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserPlanController extends Controller
{
    public function __construct(UserPlanService $userPlanService)
    {
        $this->userPlanService = $userPlanService;
    }
    
    public function index(){
        return view('master.user_plan');
    }

     public function list(Request $request)
    {
        $user_plan = $this->userPlanService->get();
        return response()->json([
            'data' => $user_plan
        ]);
    }
     
    
     public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'          => 'required|string|max:100|unique:user_plan,name',
            'price'         => 'required|integer',
            'status'        => 'required|in:active,inactive',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $user_plan = $this->userPlanService->create($request->only(['name', 'status']));

        return response()->json([
            'success' => true,
            'message' => 'User Plan created successfully.',
            'data'    => $user_plan
        ]);
    }

    public function updateStatus(Request $request)
    {
        
        $updated = $this->userPlanService->update($request->id, $request->only(['status']));
        return response()->json(['success' => (bool)$updated]);
    }

    public function edit($id)
    {
        $user_plan = $this->userPlanService->find($id);
        return response()->json([
            'success' => $user_plan ? true : false,
            'data' => $user_plan
        ]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name'   => 'required|string|max:100|unique:user_plan,name,' . $id,
            'price' => 'required|integer',
            'status' => 'required|in:active,inactive',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $data=[
            'name'          =>$request->name,
            'price'         =>$request->price,
            'status'        =>$request->status,
        ];
        $updated = $this->userPlanService->update($id, $data);

        return response()->json([
            'success' => (bool)$updated,
            'message' => $updated ? 'User plan updated successfully.' : 'Failed to update user plan.'
        ]);
    }


    public function delete($id)
    {
        try {
            $deleted = $this->userPlanService->delete($id);

            if ($deleted) {
                return response()->json([
                    'success' => true,
                    'message' => 'User plan deleted successfully.'
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'User plan not found or could not be deleted.'
                ], 404);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while deleting the user plan.',
                'error' => $e->getMessage()
            ], 500);
        }
    }




}
