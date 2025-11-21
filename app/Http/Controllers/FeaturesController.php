<?php

namespace App\Http\Controllers;
use App\Services\FeaturesService;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FeaturesController extends Controller
{
    public function __construct(FeaturesService $featuresService)
    {
        $this->featuresService = $featuresService;
    }
    
    public function index(){
        return view('master.features');
    }

     public function list(Request $request)
    {
        $roles = $this->featuresService->get();
        return response()->json([
            'data' => $roles
        ]);
    }
     
    
     public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'   => 'required|string|max:100|unique:features,name',
            'status' => 'required|in:active,inactive',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $role = $this->featuresService->create($request->only(['name', 'status']));

        return response()->json([
            'success' => true,
            'message' => 'Features created successfully.',
            'data'    => $role
        ]);
    }

    public function updateStatus(Request $request)
    {
        
        $updated = $this->featuresService->update($request->id, $request->only(['status']));
        return response()->json(['success' => (bool)$updated]);
    }

    public function edit($id)
    {
        $role = $this->featuresService->find($id);
        return response()->json([
            'success' => $role ? true : false,
            'data' => $role
        ]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name'   => 'required|string|max:100|unique:features,name,' . $id,
            'status' => 'required|in:active,inactive',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $updated = $this->featuresService->update($id, $request->only(['name', 'status']));

        return response()->json([
            'success' => (bool)$updated,
            'message' => $updated ? 'Features updated successfully.' : 'Failed to update pfeatures.'
        ]);
    }


    public function delete($id)
    {
        try {
            $deleted = $this->featuresService->delete($id);

            if ($deleted) {
                return response()->json([
                    'success' => true,
                    'message' => 'Features deleted successfully.'
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Features not found or could not be deleted.'
                ], 404);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while deleting the features.',
                'error' => $e->getMessage()
            ], 500);
        }
    }




}
