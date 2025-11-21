<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\OrderService;
use App\Services\UserPlanService;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Carbon;

class OrderController extends Controller
{
    public function __construct(OrderService $orderService,UserPlanService $userPlanService){
        $this->orderService=$orderService;
        $this->userPlanService=$userPlanService;
    }

    public function index(){
        $userPlan=$this->userPlanService->get();
        return view('superadmin.order.index',compact('userPlan'));
    }

    public function list(Request $request){
        $orders=$this->orderService->getOrderList($request);
        // dd($orders);
        return DataTables::of($orders)

            ->addColumn('company_name', function ($order) {
                return '
                    <h6 class="mb-2">'.$order->user->login_id.'</h6>
                    <p class="f-14 mb-0">POC: '.$order->user->name.'</p>
                ';
            })

            // ->addColumn('contact', function ($order) {
            //     return '
            //         <p class="f-14 mb-2">'.$order->user->company_name.'</p>
            //         <p class="f-14 mb-0">'.$order->user->name.'</p>
            //     ';
            // })

            ->addColumn('subscription', function ($order) {
              
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

            ->addColumn('duration', function ($order) {
               
                return '<p class="f-14 mb-2">From: '.$order->start_date.'</p>
                        <p class="f-14 mb-0">To: '.$order->expiry_date.'</p>';
            })
            
            ->addColumn('status', function ($order) {
                $class = match($order->status) {
                    'completed' => 'bg-light-success',
                    'pending' => 'bg-light-warning',
                    'canclled' => 'bg-light-danger',
                };

                return '<p class="f-14 mb-2">₹ '.$order->grand_total.'</p>
                        <span class="badge '.$class.'">'.ucfirst($order->status).'</span>';
            })

            ->addColumn('action', function ($order) {
                $checked=$order->status=='active' ? 'checked' : '';
                $url = url("admin/client/edit/$order->id");
                return '
                    <div class="btn-group mr-2 mb-2">
                        <i class="ti ti-menu-2 f-30 cursor-p" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false"></i>
                        <ul class="dropdown-menu dropdown-action-1">
                        <li><a class="dropdown-item f-13 open-status" href="#"  data-id="'.$order->id.'"  data-order-id="'.$order->order_id.'"  data-company-name="'.$order->user->company_name.'"  data-status="'.$order->status.'" data-id="'.$order->id.'" ><i class="ti ti-edit"></i>Change Status </a></li>
                        <li><a class="dropdown-item f-13" href="#" onclick="openDownloadInvoiceBar('.$order->id.')" ><i class="ti ti-download"></i>Download Invoice</a></li>
                        </ul>
                    </div>
                ';
            })

            ->rawColumns(['company_name', 'amount', 'subscription', 'duration', 'status', 'action'])
            ->make(true);
    }

    
    public function store(Request $request)
    {
        $isFreeMonth = $request->months == 1;
        $rules=[
            'id'              => 'required',
            'user_plan_id'    => 'required',
            'months'          => 'required',
            'sub_total'       => 'required|numeric',
            'gst_amount'      => 'required|numeric',
            'finalTotal'      => 'required|numeric',
            'payment_method'  => 'nullable',
            'coupon'          => 'nullable',
            'coupon_id'       => 'nullable',
            'coupon_code'     => 'nullable',
            'discount_amount' => 'nullable',
            'attachment'      => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
        ];

        // 👉 Only require user_plan_id when month is NOT free
        if (!$isFreeMonth) {
            $rules['user_plan_id'] = 'required';
        }

        // Validate after dynamic rule setup
        $validated = $request->validate($rules);

        // 👉 If free month → auto-set user_plan_id = 2
        if ($isFreeMonth) {
            $validated['user_plan_id'] = 5;
        }
        $startDate = now();  // subscription starts immediately

       if ($request->months == 0) {

            // FREE PLAN → Expires in 7 days (DATE ONLY)
            $endDate = now()->addDays(7)->toDateString();
            $isFree  = 1;

        } else {

            // PAID PLAN → Add selected months (DATE ONLY)
            $endDate = now()->addMonths((int) $request->months)->toDateString();
            $isFree  = 0;
        }
        $data=[
            'user_id'        => $request->id,
            'user_plan_id'   => $request->user_plan_id,
            'is_free'        => $isFree,
            'no_of_month'    => $request->months,
            'sub_total'      => $request->sub_total,
            'gst_amount'     => $request->gst_amount,
            'grand_total'    => $request->finalTotal,
            'payment_method' => $request->payment_method,
            'coupon_code'    => $request->coupon_code ?? null,
            'coupon_id'      => $request->coupon_id ?? null,
            'discount_amount'=> $request->discount_amount,            
            'start_date'     => $startDate,            
            'expiry_date'    => $endDate,            
            'status'         => 'completed',
        ];

        if ($request->File('attachment')) {
            $image = $request->file('attachment');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('order_attachement');
            $image->move($destinationPath, $imageName);
            $data['attachment'] = $imageName;
        }

        $order = $this->orderService->create($data);
        if($order['error']){
                return response()->json([
            'success' => false,
            'message' => 'Server Error: ' . $e->getMessage(),
        ], 500);
        }
        return response()->json([
            'success' => true,
            'message' => 'Order saved successfully!',
            'order_id' => $order->id
        ]);

    }

    public function updateStatus(Request $request)
    {
        $request->validate([
            'order_id' => 'required',
            'status' => 'required'
        ]);

        $data=['status'=>$request->status];
        $ersult=$this->orderService->update($request->order_id,$data);
        // if($ersult['error']){
        //     return response()->json(['message' => 'some error occured']);
        // }
       

        return response()->json(['message' => 'Payment status updated successfully']);
    }

    public function getOrderDetail(Request $request)
    {
       
        $order=$this->orderService->getOrderDetail($request->id);
        // calculate validity
        $start = Carbon::parse($order->start_date);
        $end   = Carbon::parse($order->expiry_date);
        $totalMonths = $start->diffInMonths($end);

        return response()->json([
            "invoice_no"   => "##" . $order->order_id,
            "date"         => $order->start_date,
            "due_date"     => $order->expiry_date,
            "grand_total"     => $order->grand_total,

            "company" => [
                "name"    => $order->user->company_name,
                "address" => $order->user->address ?? "N/A",
                "email"   => $order->user->email ?? "N/A",
                "poc"     => $order->user->name ?? "N/A",
            ],

            "client" => [
                "login_id" => $order->user->login_id,
                "name"     => $order->user->name,
                "email"    => $order->user->email,
            ],

            "order" => [
                "plan"     => $order->userPlan->name ?? 'N/A',
                "months"   => $order->is_free ? "7 Days Free" : "$totalMonths Months",
                "subtotal" => $order->sub_total,
                "gst"      => $order->gst_amount,
                "discount" => $order->discount_amount,
                "total"    => $order->grand_total,
            ],

            "items_html" => '
                <tr>
                    <td>1</td>
                    <td>'.$order->userPlan->name.'</td>
                    <td>'.$totalMonths.'</td>
                    <td>₹ '.$order->sub_total.'</td>
                    <td>₹ '.$order->gst_amount.'</td>
                    <td>₹ '.$order->discount_amount.'</td>
                    <td>₹ '.$order->grand_total.'</td>
                </tr>
            ',
        ]);
    }



}
