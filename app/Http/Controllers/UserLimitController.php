<?php

namespace App\Http\Controllers;
use App\Services\UserLimitService;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserLimitController extends Controller
{
    public function __construct(UserLimitService $userLimitService)
    {
        $this->userLimitService = $userLimitService;
    }
    
    public function index(){
        return view('master.user-limit');
    }

    public function list()
    {
        $query = $this->userLimitService->get();
        
        return response()->json([
            'data' => $query
        ]); 
        
        // return DataTables::of($query)
        //     ->addColumn('limit_number', function ($limit) {
        //         return $limit->limit_number;
        //     })
        //     ->addColumn('status', function ($limit) {
        //         $statusClass = match ($limit->status) {
        //             'active' => 'text-success',
        //             'inactive' => 'text-warning',
        //             'delete' => 'text-danger'
        //         };
        //         return '<span class="' . $statusClass . '">' . ucfirst($limit->status) . '</span>';
        //     })
        //     ->addColumn('created_at', function ($limit) {
        //         return date('d/m/Y', strtotime($limit->created_at));
        //     })
        //     ->addColumn('action', function ($limit) {
        //         return '<button class="btn btn-primary edit-btn" data-id="' . $limit->id . '">
        //                     <i class="fas fa-pencil-alt"></i>
        //                 </button>
        //                 <!--<button class="btn btn-danger delete-btn" data-id="' . $limit->id . '">
        //                     <i class="fas fa-trash-alt"></i>
        //                 </button>-->';
                        
        //     })
        //     ->rawColumns(['status', 'action'])
        //     ->make(true);
    }
     
    
     public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'   => 'required|string|max:100|unique:user_limits,name',
            'status' => 'required|in:active,inactive',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $role = $this->userLimitService->create($request->only(['name', 'status']));

        return response()->json([
            'success' => true,
            'message' => 'User Limit created successfully.',
            'data'    => $role
        ]);
    }

    public function updateStatus(Request $request)
    {
        
        $updated = $this->userLimitService->update($request->id, $request->only(['status']));
        return response()->json(['success' => (bool)$updated]);
    }

    public function edit($id)
    {
        $role = $this->userLimitService->find($id);
        return response()->json([
            'success' => $role ? true : false,
            'data' => $role
        ]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name'   => 'required|integer|max:100|unique:user_limits,name,' . $id,
            'status' => 'required|in:active,inactive',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $updated = $this->userLimitService->update($id, $request->only(['name', 'status']));

        return response()->json([
            'success' => (bool)$updated,
            'message' => $updated ? 'User limit updated successfully.' : 'Failed to update user limit.'
        ]);
    }


    public function delete($id)
    {
        try {
            $deleted = $this->userLimitService->delete($id);

            if ($deleted) {
                return response()->json([
                    'success' => true,
                    'message' => 'User limit deleted successfully.'
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'User limit not found or could not be deleted.'
                ], 404);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while deleting the user limit.',
                'error' => $e->getMessage()
            ], 500);
        }
    }




}
