<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Services\ProjectTypeService;
use App\Services\ClientService;
use App\Services\UserPlanService;
use Hash;
use Carbon\Carbon;


class ClientController extends Controller
{
    function __construct(ProjectTypeService $projectTypeService,ClientService $clientService,UserPlanService $userPlanService)
        {
            $this->projectTypeService=$projectTypeService;
            $this->clientService=$clientService;
            $this->userPlanService=$userPlanService;
        }

    public function index()
    {
        $userPlan=$this->userPlanService->get();
        return view('superadmin.client.index',compact('userPlan'));
    }

    public function clientList(Request $request)
    {
        $clients = $this->clientService->get($request);
        //dd($clients);
        return DataTables::of($clients)

            ->addColumn('company_name', function ($client) {
                return '
                    <h6 class="mb-2">'.$client->company_name.'</h6>
                    <p class="f-14 mb-0">POC: '.$client->name.'</p>
                ';
            })

            ->addColumn('contact', function ($client) {
                return '
                    <p class="f-14 mb-2">+91 '.$client->phone.'</p>
                    <p class="f-14 mb-0">'.$client->email.'</p>
                ';
            })

            ->addColumn('subscription', function ($client) {
                $order = $client->latestOrder;

                if (!$order) {
                    return '<p class="f-14 mb-0 text-danger">No subscription</p>';
                }

                $planName = $order->userPlan->name ?? 'N/A';

                // calculate month from start_date - expiry_date
                $start = Carbon::parse($order->start_date);
                $end   = Carbon::parse($order->expiry_date);

                if ($order->is_free) {
                    $validity = '7 Days (Free)';
                } else {
                    $totalMonths = $start->diffInMonths($end);
                    $validity = $totalMonths . " Months";
                }
                $validity = $order->is_free ? '7 Days (Free)' : $validity;
                return "<p class='f-14 mb-2'>Users: $planName</p>
                        <p class='f-14 mb-0'>Validity: $validity</p>";
            })

            ->addColumn('duration', function ($client) {
                $order = $client->latestOrder;

                if (!$order) {
                    return '<p class="f-14">Not available</p>';
                }

                return '<p class="f-14 mb-2">From: '.$order->start_date.'</p>
                        <p class="f-14 mb-0">To: '.$order->expiry_date.'</p>';
            })

            ->addColumn('status', function ($client) {
                $class = match($client->status) {
                    'active' => 'bg-light-success',
                    'inactive' => 'bg-light-warning',
                    'delete' => 'bg-light-danger',
                };

                return '<span class="badge '.$class.'">'.ucfirst($client->status).'</span>';
            })

            ->addColumn('action', function ($client) {
                $checked=$client->status=='active' ? 'checked' : '';
                $url = url("admin/client/edit/$client->id");
                return '
                    <input type="checkbox" class="form-check-input input-success mt-1 toggle-status" data-id="'.$client->id.'" '.$checked.'>
                    <div class="btn-group mr-2 mb-2">
                        <i class="ti ti-menu-2 f-30 cursor-p" data-bs-toggle="dropdown"></i>
                        <ul class="dropdown-menu dropdown-action-1">
                        <li>
                                <a class="dropdown-item f-13" href="'.$url.'">
                                    <i class="ti ti-pencil"></i> Edit
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item f-13" href="#" onclick="openViewClientDetails('.$client->id.')">
                                    <i class="ti ti-eye"></i> View Details
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item f-13" href="#" onclick="openSubscriptionbar('.$client->id.')">
                                    <i class="ti ti-brand-pocket"></i> Manage Subscription
                                </a>
                            </li>
                        </ul>
                    </div>
                ';
            })

            ->rawColumns(['company_name', 'contact', 'subscription', 'duration', 'status', 'action'])
            ->make(true);
    }


    public function addClient(){
        $projct_type=$this->projectTypeService->get();
        
        return view('superadmin.client.create',['projct_type'=>$projct_type,'clientInfo'=>null]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'company_name'   => 'required|string|max:150',
            'client_name'    => 'required|string|max:150',
            'phone'          => 'required|digits:10',
            'email'          => 'required|email|unique:users,email',
            'project_type_id'=> 'required',
            'company_logo'   => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'login_id'       => 'required|string|unique:users,login_id',
            'password'       => 'required|min:8',
            'confirm_password'=> 'required|min:8|same:password',
            'address'        => 'required|string|max:255',
            'status'         => 'required|in:Active,Inactive',
        ],
        [
            'confirm_password.same' => 'Passwords do not match.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }
        $imageName = null;
        if ($request->hasFile('company_logo')) {
            $image = $request->file('company_logo');
            $imageName = uniqid() . '_' . $image->getClientOriginalName(); 
            $directory = public_path('attachments/logos');
            //$directory = \AppConfig::LOGO_UPLOAD_DIR_INTERNAL;
            if (!is_writable($directory)) {
                throw new \Exception("The directory {$directory} is not writable.");
            }
            $image->move($directory, $imageName);
        }
        
        $client = User::create([
            'role_id'           => 2,
            'company_name'      => $request->company_name,
            'name'              => $request->client_name,
            'phone'             => $request->phone,
            'login_id'          => $request->login_id,
            'company_logo'      => $imageName,
            'email'             => $request->email,
            'project_type_id'    => $request->project_type_id,
            'password'          => Hash::make($request->password),
            'remember_password' => $request->password,
            'status'            => $request->status,
        ]);
        return response()->json(['success' => true, 'message' => 'Client added successfully']);
    }

    public function edit($id) {
        $clientInfo=$this->clientService->find($id);
        $projct_type=$this->projectTypeService->get();
        return view('superadmin.client.create',['clientInfo'=>$clientInfo,'projct_type'=>$projct_type]);
    }

    public function userLimitEdit($id)
    {
        $UserLimit = User::findOrFail($id);
        return response()->json([
            'success' => true,
            'data' => [
                'id' => $UserLimit->id,
                'limit_number' => $UserLimit->limit_number,
                'status' => $UserLimit->status
            ]
        ]);
    }

     public function updateStatus(Request $request)
    {
        
        $updated = $this->clientService->update($request->id, $request->only(['status']));
        return response()->json(['success' => (bool)$updated]);
    }


    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id'               => 'required|integer|exists:users,id',
            'company_name'     => 'required|string|max:150',
            'client_name'      => 'required|string|max:150',
            'phone'            => 'required|digits:10',
            'email'            => 'required|email|unique:users,email,' . $request->id,
            'project_type_id'  => 'required',
            'company_logo'     => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'login_id'         => 'required|string|unique:users,login_id,' . $request->id,
            'password'         => 'nullable|min:8',
            'confirm_password' => 'nullable|min:8|same:password',
            'address'          => 'required|string|max:255',
            'status'           => 'required|in:Active,Inactive',
        ],
        [
            'confirm_password.same' => 'Passwords do not match.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        $user = User::find($request->id);

        // ========== IMAGE UPDATE ==========
        $imageName = $user->company_logo; // keep old image if no new one

        if ($request->hasFile('company_logo')) {

            // delete old image
            //$directory = \AppConfig::LOGO_UPLOAD_DIR_INTERNAL;
            $directory = public_path('attachments/logos');
            
            if ($user->company_logo && file_exists($directory . '/' . $user->company_logo)) {
                unlink($directory . '/' . $user->company_logo);
            }

            // upload new image
            $image = $request->file('company_logo');
            $imageName = uniqid() . '_' . $image->getClientOriginalName();
            $image->move($directory, $imageName);
        }

        // ========== PASSWORD UPDATE ==========
        $password = $user->password; // keep existing password
        $remember_password = $user->remember_password;

        if ($request->password) {
            $password = Hash::make($request->password);
            $remember_password = $request->password;
        }

        // ========== UPDATE DB ==========
        $user->update([
            'company_name'      => $request->company_name,
            'name'              => $request->client_name,
            'phone'             => $request->phone,
            'login_id'          => $request->login_id,
            'company_logo'      => $imageName,
            'email'             => $request->email,
            'project_type_id'   => $request->project_type_id,
            'password'          => $password,
            'remember_password' => $remember_password,
            'status'            => $request->status,
        ]);

        return response()->json(['success' => true, 'message' => 'Client updated successfully']);
    }


    public function view($id)
    {
        $client = $this->clientService->find($id);
        //dd($client);
        //echo $client->id;die;
        return response()->json([
            'id'           => $client->id,
            'company_name' => $client->company_name,
            'company_logo' => \AppConfig::LOGO_HTTP_PATH . '' . $client->company_logo,
            'client_code'  => "ADWCRM" . str_pad($client->id, 4, '0', STR_PAD_LEFT),
            'name'         => $client->name,
            'phone'        => $client->phone,
            'email'        => $client->email,
            'address'      => $client->address,
            'login_id'     => $client->login_id,
            'remember_password' => $client->remember_password,

            'subscriptions' => $client->order->map(function($s){

                $start_date = Carbon::parse($s->start_date);
                $expiry_date   = Carbon::parse($s->expiry_date);

                if ($s->is_free) {
                    $validity = '7 Days (Free)';
                } else {
                    $totalMonths = $start_date->diffInMonths($expiry_date);
                    $validity = $totalMonths . " Months";
                }
                $validity = $s->is_free ? '7 Days (Free)' : $validity;
                
                $today = Carbon::today();
                $expiry = Carbon::parse($s->expiry_date);

                if ($expiry->isPast()) {
                    $status = "Expired";
                    $statusColor = "danger";
                } else {
                    $status = "Active";
                    $statusColor = "success";
                }
                        
                return [
                    'subscription_no' => $s->order_id,
                    'users' => $s->userPlan->name,
                    'validity' => $validity,
                    'start_date' =>  $start_date->format('d-m-Y'),
                    'end_date' =>  $expiry_date->format('d-m-Y'),
                    'amount' => $s->grand_total,
                    'status' => $status,
                    'payment_status' => $s->status,
                    'status_color' => $statusColor,
                ];
            })
        ]);
    }
   
   
   
    public function createSubscription($id)
    {
        $client = User::find($id);
        $userPlan = $this->userPlanService->get()->sortBy('name')->values();

        return response()->json([
            'company_name' => $client->company_name,
            'company_logo' => \AppConfig::LOGO_HTTP_PATH.''. $client->company_logo,
            'client_code'  => "ADWCRM" . str_pad($client->id, 4, '0', STR_PAD_LEFT),
            'name'         => $client->name,
            'phone'        => $client->phone,
            'email'        => $client->email,
            'address'      => $client->address,
            'login_id'     => $client->login_id,
            'user_plan'     => $userPlan,
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
        $UserLimit = User::where('id', $request->userLimit_id)->Update([
            'limit_number' => $request->limit_number,
            'status' => $request->status
        ]);
        return response()->json(['success' => true, 'message' => 'User Limit updated successfully']);
    }

    public function userLimitDelete(Request $request)
    {
        $UserLimit = User::where('id', $request->id)->Update([
            'status' => 'delete'
        ]);
        return response()->json(['success' => true, 'message' => 'User Limit delete successfully']);
    }
}

