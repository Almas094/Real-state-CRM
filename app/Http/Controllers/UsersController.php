<?php

namespace App\Http\Controllers;
use App\Services\UserService;
use App\Services\RolesService;
use App\Http\Requests\UserCreateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


class UsersController extends Controller
{
    public function __construct(UserService $userService,RolesService $rolesService)
    {
        $this->userService = $userService;
        $this->rolesService = $rolesService;
    }
    
    public function index(){
        $roles = $this->rolesService->get();
        return view('users.index',['roles'=>$roles]);
    }

     public function list(Request $request)
    {
        $subscriptions = $this->userService->get();
        return response()->json([
            'data' => $subscriptions
        ]);
    }
    
    public function store(UserCreateRequest $request)
    {
        $data = $request->all();
        $data['remember_password'] = $data['password'];
        $data['password'] = Hash::make($data['password']);
        
        $imageName = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = uniqid() . '_' . $image->getClientOriginalName(); 
            $directory = \AppConfig::LOGO_UPLOAD_DIR_INTERNAL;
            if (!is_writable($directory)) {
                // Optionally log or handle this issue
                throw new \Exception("The directory {$directory} is not writable.");
            }
            $image->move($directory, $imageName);
        }
        $data['image']=$imageName;
        $coupon = $this->userService->create($data);

        return response()->json([
            'success' => true,
            'message' => 'User created successfully.',
            'data'    => $data
        ]);
    }

    public function updateStatus(Request $request)
    {
        
        $updated = $this->userService->update($request->id, $request->only(['status']));
        return response()->json(['success' => (bool)$updated]);
    }

    public function edit($id)
    {
        $users = $this->userService->find($id);
        return response()->json([
            'success' => $users ? true : false,
            'data' => $users
        ]);
    }

    public function update(UserCreateRequest $request, $id)
    {
        $data=$request->all();
        $data = $request->except(['confirm_password', '_token']);
        $data['remember_password'] = $data['password'];
        $data['password'] = Hash::make($data['password']);
        $updated = $this->userService->update($id, $data);

        return response()->json([
            'success' => (bool)$updated,
            'message' => $updated ? 'Users updated successfully.' : 'Failed to update coupon.'
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
