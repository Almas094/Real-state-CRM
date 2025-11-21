<?php

namespace App\Http\Controllers;
use App\Services\ProjectTypeService;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProjectTypeController extends Controller
{
    public function __construct(ProjectTypeService $projectTypeService)
    {
        $this->projectTypeService = $projectTypeService;
    }
    
    public function index(){
        return view('master.project_type');
    }

     public function list(Request $request)
    {
        $roles = $this->projectTypeService->get();
        return response()->json([
            'data' => $roles
        ]);
    }
     
    
     public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'   => 'required|string|max:100|unique:project_type,name',
            'status' => 'required|in:active,inactive',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $role = $this->projectTypeService->create($request->only(['name', 'status']));

        return response()->json([
            'success' => true,
            'message' => 'Project type created successfully.',
            'data'    => $role
        ]);
    }

    public function updateStatus(Request $request)
    {
        
        $updated = $this->projectTypeService->update($request->id, $request->only(['status']));
        return response()->json(['success' => (bool)$updated]);
    }

    public function edit($id)
    {
        $role = $this->projectTypeService->find($id);
        return response()->json([
            'success' => $role ? true : false,
            'data' => $role
        ]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name'   => 'required|string|max:100|unique:project_type,name,' . $id,
            'status' => 'required|in:active,inactive',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $updated = $this->projectTypeService->update($id, $request->only(['name', 'status']));

        return response()->json([
            'success' => (bool)$updated,
            'message' => $updated ? 'Project type updated successfully.' : 'Failed to update project type.'
        ]);
    }


    public function delete($id)
    {
        try {
            $deleted = $this->projectTypeService->delete($id);

            if ($deleted) {
                return response()->json([
                    'success' => true,
                    'message' => 'Project type deleted successfully.'
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Project type not found or could not be deleted.'
                ], 404);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while deleting the project type.',
                'error' => $e->getMessage()
            ], 500);
        }
    }




}
