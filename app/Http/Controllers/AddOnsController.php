<?php

namespace App\Http\Controllers;
use App\Services\AddOnsService;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AddOnsController extends Controller
{
    public function __construct(AddOnsService $addOnsService)
    {
        $this->addOnsService = $addOnsService;
    }
    
    public function index(){
        return view('master.add_ons');
    }

    public function list(Request $request)
    {
        $roles = $this->addOnsService->get();
        return response()->json([
            'data' => $roles
        ]);
    }
     
    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'        => 'required|max:100|unique:add_ons,name',
            'description' => 'nullable|string',
            'type'        => 'required|in:paid,free',
            'price'       => 'nullable|numeric',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'status'      => 'required|in:active,inactive',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }
         $imageName = null;
        // Example save (you can adjust this as per your service)
        $data = $request->only(['name', 'description', 'type', 'price', 'status']);
        
        if ($request->File('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('addons');
            $image->move($destinationPath, $imageName);
            $data['image'] = $imageName;
        }


        $addOn = $this->addOnsService->create($data);

        return response()->json([
            'success' => true,
            'message' => 'Add On created successfully.',
            'data' => $addOn
        ]);
    }


    public function updateStatus(Request $request)
    {
        
        $updated = $this->addOnsService->update($request->id, $request->only(['status']));
        return response()->json(['success' => (bool)$updated]);
    }

    public function edit($id)
    {
        $addons = $this->addOnsService->find($id);
        return response()->json([
            'success' => $addons ? true : false,
            'data' => $addons
        ]);
    }

   public function update(Request $request)
    {
        $id = $request->id;
        $validator = Validator::make($request->all(), [
            'name'        => 'required|string|max:100|unique:add_ons,name,' . $id,
            'description' => 'nullable|string',
            'type'        => 'required|in:paid,free',
            'price'       => 'nullable|numeric',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'status'      => 'required|in:active,inactive',
        ]);

        // Image required when type = paid
        $validator->sometimes('image', 'required', function ($input) {
            return $input->type === 'paid';
        });

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $addOn = $this->addOnsService->find($id);

        // Prepare update data
        $data = [
            'name'        => $request->name,
            'description' => $request->description,
            'type'        => $request->type,
            'price'       => $request->price,
            'status'      => $request->status,
        ];

        // ✅ Handle new image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('addons');
            
            // Delete old image if exists
            if (!empty($addOn->image) && file_exists(public_path($addOn->image))) {
                unlink(public_path($addOn->image));
            }

            // Move new image
            $image->move($destinationPath, $imageName);
            $data['image'] =$imageName;
        }

        $updated = $addOn->update($data);

        return response()->json([
            'success' => (bool)$updated,
            'message' => $updated
                ? 'Add On updated successfully.'
                : 'Failed to update Add On.',
        ]);
    }



    public function delete($id)
    {
        try {
            $deleted = $this->addOnsService->delete($id);

            if ($deleted) {
                return response()->json([
                    'success' => true,
                    'message' => 'Add Ons deleted successfully.'
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Add Ons not found or could not be deleted.'
                ], 404);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while deleting the Add Ons.',
                'error' => $e->getMessage()
            ], 500);
        }
    }




}
