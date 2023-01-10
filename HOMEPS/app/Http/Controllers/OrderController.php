<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Pc;
use App\Models\Product;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::whereNull('deleted_at')->with('pc')->get();
        return view('back-end.bills.list', compact(['orders']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::where('id', '=', $id)->first();
        $products = $order->getProducts($order->ids_product);
        return view('back-end.bills.detail', compact(['order', 'products']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $order = Order::where('id', '=', $request->id)->first();
        $order->status = $request->status;
        if($request->status == 3) $order->amount = $order->amount($order) + $order->amountTimeUse($order);
        else $order->amount = null;
        $order->save();
        return redirect()->route('admin.bill.list')->with('success','Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $order = Order::where('id', '=', $request->id)->first();
        $order->deleted_at = Carbon::now();
        $order->save();
        return redirect()->route('admin.bill.list')->with('success','Deleted successfully');
    }
}
