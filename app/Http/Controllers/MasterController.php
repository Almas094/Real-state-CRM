<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Validator;
use App\Models\UserLimit;
use App\Models\Subscription;

class MasterController extends Controller
{
    public function limitView()
    {
        return view('superadmin.master.user-limit');
    }

    public function limitList()
    {
        $query = UserLimit::get();

        return DataTables::of($query)
            ->addColumn('limit_number', function ($limit) {
                return $limit->limit_number;
            })
            ->addColumn('status', function ($limit) {
                $statusClass = match ($limit->status) {
                    'active' => 'text-success',
                    'inactive' => 'text-warning',
                    'delete' => 'text-danger'
                };
                return '<span class="' . $statusClass . '">' . ucfirst($limit->status) . '</span>';
            })
            ->addColumn('created_at', function ($limit) {
                return date('d/m/Y', strtotime($limit->created_at));
            })
            ->addColumn('action', function ($limit) {
                return '<button class="btn btn-primary edit-btn" data-id="' . $limit->id . '">
                            <i class="fas fa-pencil-alt"></i>
                        </button>
                        <!--<button class="btn btn-danger delete-btn" data-id="' . $limit->id . '">
                            <i class="fas fa-trash-alt"></i>
                        </button>-->';
                        
            })
            ->rawColumns(['status', 'action'])
            ->make(true);
    }

    public function userLimitStore(Request $request)
    {
        $rules = [
            'limit_number' => 'required',
            'status' => 'required',
        ];
        
        $errors = [];
        foreach ($rules as $field => $rule) {
            $validator = Validator::make($request->only($field), [$field => $rule]);
            if ($validator->fails()) {
                $errors[$field] = $validator->errors()->first($field);
                break;
            }
        }
        
        if (!empty($errors)) {
            return response()->json(['errors' => $errors], 422);
        }
  
        $UserLimit = UserLimit::create([
            'limit_number' => $request->limit_number,
            'status' => $request->status
        ]);

        return response()->json(['success' => true, 'message' => 'User Limit added successfully']);
    }

    public function userLimitEdit($id)
    {
        $UserLimit = UserLimit::findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => [
                'id' => $UserLimit->id,
                'limit_number' => $UserLimit->limit_number,
                'status' => $UserLimit->status
            ]
        ]);
    }

    public function userLimitUpdate(Request $request)
    {
        $rules = [
            'userLimit_id' => 'required',
            'limit_number' => 'required',
            'status' => 'required',
        ];
        
        $errors = [];
        foreach ($rules as $field => $rule) {
            $validator = Validator::make($request->only($field), [$field => $rule]);
            if ($validator->fails()) {
                $errors[$field] = $validator->errors()->first($field);
                break;
            }
        }
        
        if (!empty($errors)) {
            return response()->json(['errors' => $errors], 422);
        }
  
        $UserLimit = UserLimit::where('id', $request->userLimit_id)->Update([
            'limit_number' => $request->limit_number,
            'status' => $request->status
        ]);

        return response()->json(['success' => true, 'message' => 'User Limit updated successfully']);
    }

    public function userLimitDelete(Request $request)
    {
        $UserLimit = UserLimit::where('id', $request->id)->Update([
            'status' => 'delete'
        ]);

        return response()->json(['success' => true, 'message' => 'User Limit delete successfully']);
    }

    public function subscriptionView()
    {
        return view('superadmin.master.subscription');
    }

    public function subscriptionList()
    {
        $query = Subscription::get();

        return DataTables::of($query)
            ->addColumn('name', function ($subscription) {
                return $subscription->name;
            })
            ->addColumn('no_months', function ($subscription) {
                return $subscription->no_months;
            })
            ->addColumn('no_days', function ($subscription) {
                return $subscription->no_days;
            })
            ->addColumn('status', function ($subscription) {
                $statusClass = match ($subscription->status) {
                    'active' => 'text-success',
                    'inactive' => 'text-warning'
                };
                return '<span class="' . $statusClass . '">' . ucfirst($subscription->status) . '</span>';
            })
            ->addColumn('created_at', function ($subscription) {
                return date('d/m/Y', strtotime($subscription->created_at));
            })
            ->addColumn('action', function ($subscription) {
                return '<button class="btn btn-primary edit-btn" data-id="' . $subscription->id . '">
                            <i class="fas fa-pencil-alt"></i>
                        </button>';
                        
            })
            ->rawColumns(['status', 'action'])
            ->make(true);
    }

    public function subscriptionStore(Request $request)
    {
        $rules = [
            'subscription_name' => 'required',
            'no_months' => 'nullable',
            'no_days' => 'nullable',
            'status' => 'required',
        ];
        
        $errors = [];
        $atLeastOneProvided = $request->filled('no_months') || $request->filled('no_days');
        
        foreach ($rules as $field => $rule) {
            if (!$atLeastOneProvided && ($field === 'no_months' || $field === 'no_days')) {
                $errors[$field] = 'Either number of months or number of days must be provided.';
                break; 
            }
        
            $validator = Validator::make($request->only($field), [$field => $rule]);
            if ($validator->fails()) {
                $errors[$field] = $validator->errors()->first($field);
                break;
            }
        }
        
        if (!empty($errors)) {
            return response()->json(['errors' => $errors], 422);
        }        
  
        $subscription = Subscription::create([
            'name' => $request->subscription_name,
            'no_months' => $request->no_months,
            'no_days' => $request->no_days,
            'status' => $request->status
        ]);

        return response()->json(['success' => true, 'message' => 'Subscription added successfully']);
    }

    public function subscriptionEdit($id)
    {
        $subscription = Subscription::findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => [
                'id' => $subscription->id,
                'subscription_name' => $subscription->name,
                'no_months' => $subscription->no_months,
                'no_days' => $subscription->no_days,
                'status' => $subscription->status
            ]
        ]);
    }

    public function subscriptiontUpdate(Request $request)
    {
        $rules = [
            'subscription_id' => 'required',
            'subscription_name' => 'required',
            'no_months' => 'nullable',
            'no_days' => 'nullable',
            'status' => 'required',
        ];
        
        $errors = [];
        $atLeastOneProvided = $request->filled('no_months') || $request->filled('no_days');
        
        foreach ($rules as $field => $rule) {
            if (!$atLeastOneProvided && ($field === 'no_months' || $field === 'no_days')) {
                $errors[$field] = 'Either number of months or number of days must be provided.';
                break; 
            }
        
            $validator = Validator::make($request->only($field), [$field => $rule]);
            if ($validator->fails()) {
                $errors[$field] = $validator->errors()->first($field);
                break;
            }
        }
        
        if (!empty($errors)) {
            return response()->json(['errors' => $errors], 422);
        }  
  
        $Subscription = Subscription::where('id', $request->subscription_id)->Update([
            'name' => $request->subscription_name,
            'no_months' => $request->no_months,
            'no_days' => $request->no_days,
            'status' => $request->status
        ]);

        return response()->json(['success' => true, 'message' => 'Subscription updated successfully']);
    }


}
