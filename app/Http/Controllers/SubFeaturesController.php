<?php

namespace App\Http\Controllers;
use App\Services\SubFeaturesService;
use App\Services\FeaturesService;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubFeaturesController extends Controller
{
    public function __construct(SubFeaturesService $subFeaturesService,FeaturesService $featuresService)
    {
        $this->subFeaturesService = $subFeaturesService;
        $this->featuresService = $featuresService;
    }
    
    public function index(){
        $features=$this->featuresService->get();
        return view('master.sub_features',compact('features'));
    }

     public function list(Request $request)
    {
        $sub_features = $this->subFeaturesService->get();
        return response()->json([
            'data' => $sub_features
        ]);
    }
     
    
     public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'   => 'required|string|max:100|unique:features,name',
            'feature_id' => 'required',
            'status' => 'required|in:active,inactive',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $role = $this->subFeaturesService->create($request->only(['feature_id','name', 'status']));

        return response()->json([
            'success' => true,
            'message' => 'Sub Features created successfully.',
            'data'    => $role
        ]);
    }

    public function updateStatus(Request $request)
    {
        
        $updated = $this->subFeaturesService->update($request->id, $request->only(['status']));
        return response()->json(['success' => (bool)$updated]);
    }

    public function edit($id)
    {
        $role = $this->subFeaturesService->find($id);
        return response()->json([
            'success' => $role ? true : false,
            'data' => $role
        ]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name'   => 'required|string|max:100|unique:sub_features,name,' . $id,
            'feature_id' => 'required',
            'status' => 'required|in:active,inactive',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $updated = $this->subFeaturesService->update($id, $request->only(['feature_id','name', 'status']));

        return response()->json([
            'success' => (bool)$updated,
            'message' => $updated ? 'Sub Features updated successfully.' : 'Failed to update sub features.'
        ]);
    }


    public function delete($id)
    {
        try {
            $deleted = $this->subFeaturesService->delete($id);

            if ($deleted) {
                return response()->json([
                    'success' => true,
                    'message' => 'Sub Features deleted successfully.'
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Sub Features not found or could not be deleted.'
                ], 404);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while deleting the sub features.',
                'error' => $e->getMessage()
            ], 500);
        }
    }




}
