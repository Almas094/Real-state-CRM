<?php

namespace App\Http\Controllers;
use App\Services\RolesService;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RolesController extends Controller
{
    public function __construct(RolesService $rolesService)
    {
        $this->rolesService = $rolesService;
    }
    
    public function index(){
        return view('master.roles');
    }

     public function list(Request $request)
    {
        $roles = $this->rolesService->get();
        return response()->json([
            'data' => $roles
        ]);
    }
     
    
     public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'   => 'required|string|max:100|unique:roles,name',
            'status' => 'required|in:active,inactive',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $role = $this->rolesService->create($request->only(['name', 'status']));

        return response()->json([
            'success' => true,
            'message' => 'Role created successfully.',
            'data'    => $role
        ]);
    }

    public function updateStatus(Request $request)
    {
        
        $updated = $this->rolesService->update($request->id, $request->only(['status']));
        return response()->json(['success' => (bool)$updated]);
    }

    public function edit($id)
    {
        $role = $this->rolesService->find($id);
        return response()->json([
            'success' => $role ? true : false,
            'data' => $role
        ]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name'   => 'required|string|max:100|unique:roles,name,' . $id,
            'status' => 'required|in:active,inactive',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $updated = $this->rolesService->update($id, $request->only(['name', 'status']));

        return response()->json([
            'success' => (bool)$updated,
            'message' => $updated ? 'Role updated successfully.' : 'Failed to update role.'
        ]);
    }


    public function delete($id)
    {
        try {
            $deleted = $this->rolesService->delete($id);

            if ($deleted) {
                return response()->json([
                    'success' => true,
                    'message' => 'Role deleted successfully.'
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Role not found or could not be deleted.'
                ], 404);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while deleting the role.',
                'error' => $e->getMessage()
            ], 500);
        }
    }




}
