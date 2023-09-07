<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        foreach(Auth::user()->getRoleNames() as $v){
            if($v == 'مستخدم'){
               $orders= Order::with('user')->where('user_id',Auth::user()->id)->get();
            }elseif('مدير'){
                $orders= Order::with('user')->get();
            }else{
                $orders= Order::with('user')->where(function ($query)  {
                    $query->where('recipient', '=', Auth::user()->id)
                          ->orWhere('recipient',null);
                })->get();
            }
            return view('orders.index',compact('orders'));
            }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::where('type','!=','none')->get();
        return view('orders.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'service_type' => 'required',
            'service_description' => 'required'
        ]);

         if(auth()->user()->type != 'none'){
            $request->user_id = auth()->user()->id;
         }
         $user= find($request->user_id);
         $order = Order::create([
            'user_id' => $request->user_id,
            'service_type' =>  $request->service_type,
            'service_description'=> $request->service_description,
            'service_status' =>'new',
            'invoice_status'=> 'unpaid',

            'user_name' => $user->name,
            'user_email' =>  $user->email,
            'user_mobile_no'=> $user->mobile_no,
            'user_type'=> $user->type,

        ]);

        return redirect()->route('orders.index')
        ->with('success','Order created successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function orderFilter(Request $request){

        $request->validate([
            'value' => 'required',
            'field' => 'required',
            'type' => 'required'
        ]);


        foreach(Auth::user()->getRoleNames() as $v){
            if($v == 'مستخدم'){
               $orders= Order::with('user')->where('user_id',Auth::user()->id)->where($request->field,$request->type,$request->value)->get();
            }elseif('مدير'){
                $orders= Order::with('user')->where($request->field,$request->type,$request->value)->get();
            }else{
                $orders= Order::with('user')->where(function ($query)  {
                    $query->where('recipient', '=', Auth::user()->id)
                          ->orWhere('recipient',null);
                })->where($request->field,$request->type,$request->value)->get();
            }
            return view('orders.index',compact('orders'));
            }

    }


    public function Modify_request_type(Request $request){

        $request->validate([
            'service_type' => 'required',
            'order_id'=>'required'
        ]);

        $order = Order::find($request->order_id);
        if(!$order){
            return redirect()->back()->with('error','هذه الطلب غير موجود');
        }

        $order->service_type= $request->service_type;
        if($order->save()){
            return redirect()->back()->with('success','تم تعديل الطلب بنجاح');
        }

        return redirect()->back()->with('error','هذه الطلب غير موجود');
    }


    public function Modify_service_status(Request $request){

        $request->validate([
            'service_status' => 'required',
            'order_id'=>'required'
        ]);

        $order = Order::find($request->order_id);
        if(!$order){
            return redirect()->back()->with('error','هذه الطلب غير موجود');
        }

        $order->service_status= $request->service_status;
        if($request->service_status == "underway"){
            $order->service_start_date= Carbon::now();
        }if($request->service_status == "finished"){
            $order->service_end_date= Carbon::now();
        }
        if($order->save()){
            return redirect()->back()->with('success','تم تعديل الطلب بنجاح');
        }

        return redirect()->back()->with('error','هذه الطلب غير موجود');
    }

    public function Edit_invoice_status(Request $request){

        $request->validate([
            'invoice_status' => 'required',
            'order_id'=>'required'
        ]);

        $order = Order::find($request->order_id);
        if(!$order){
            return redirect()->back()->with('error','هذه الطلب غير موجود');
        }

        $order->invoice_status= $request->invoice_status;

        if($order->save()){
            return redirect()->back()->with('success','تم تعديل الطلب بنجاح');
        }

        return redirect()->back()->with('error','هذه الطلب غير موجود');
    }

    public function order_recipient(Request $request){

        $request->validate([
            'recipient' => 'required',
            'order_id'=>'required'
        ]);

        $order = Order::find($request->order_id);
        if(!$order){
            return redirect()->back()->with('error','هذه الطلب غير موجود');
        }

        $order->recipient = $request->recipient;
        if($order->save()){
            return redirect()->back()->with('success','تم تعديل الطلب بنجاح');
        }

        return redirect()->back()->with('error','هذه الطلب غير موجود');
    }


    public function order_recipient_price(Request $request){

        $request->validate([
            'recipient_price' => 'required',
            'order_id'=>'required'
        ]);

        $order = Order::find($request->order_id);
        if(!$order){
            return redirect()->back()->with('error','هذه الطلب غير موجود');
        }
        $user = User::find($request->recipient_price);
        $order->recipient_price = $request->recipient_price;
        $order->recipient_name = $user->name;

        if($order->save()){
            return redirect()->back()->with('success','تم تعديل الطلب بنجاح');
        }

        return redirect()->back()->with('error','هذه الطلب غير موجود');
    }



    public function recipient_order(Request $request){

        $request->validate([
            'order_id'=>'required'
        ]);

        $order = Order::find($request->order_id);
        if(!$order){
            return redirect()->back()->with('error','هذه الطلب غير موجود');
        }

        $order->recipient_price = Auth::user()->id;
        $order->recipient_name = Auth::user()->name;
        if($order->save()){
            return redirect()->back()->with('success','تم استلام الطلب بنجاح');
        }

        return redirect()->back()->with('error','هذه الطلب غير موجود');
    }



    public function View_additional_information(Request $request){

        $request->validate([
            'order_id'=>'required',
            'price'=>'required',
        ]);

        $order = Order::find($request->order_id);
        if(!$order){
            return redirect()->back()->with('error','هذه الطلب غير موجود');
        }

        $order->total_price = $request->price;
        if($order->save()){
            return redirect()->back()->with('success','تم تعديل الطلب بنجاح');
        }

        return redirect()->back()->with('error','هذه الطلب غير موجود');
    }

    public function publish(Request $request){

        $request->validate([
            'order_id'=>'required',

        ]);

        $order = Order::find($request->order_id);
        if(!$order){
            return redirect()->back()->with('error','هذه الطلب غير موجود');
        }

        $order->publish = 1;
        if($order->save()){
            return redirect()->back()->with('success','تم نشر الطلب بنجاح');
        }

        return redirect()->back()->with('error','هذه الطلب غير موجود');
    }

}
