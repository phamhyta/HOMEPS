<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::whereNull('deleted_at')->with('pc')->get();
        return view('back-end.bills.list', compact(['orders']));
    }

    public function create()
    {
        $orders = Order::all();
        $amount = 0;
        $annual = 0;
        $earning = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $revenue = [0, 0];
        $earningProduct = 0;
        $earningPc = 0;
        foreach ($orders as $order) {
            if ($order->amount) {
                if ((new Carbon($order->updated_at))->year == Carbon::now()->year)
                    $annual = $annual + $order->amount;
                if ((new Carbon($order->updated_at))->month == Carbon::now()->month)
                    $amount = $amount + $order->amount;
            }
            for ($i = 1; $i <= 12; $i++) {
                if ((new Carbon($order->updated_at))->month == $i) $earning[$i] = $earning[$i] + $order->amount;
            }
            $earningProduct = $earningProduct + $order->amount($order);
            $earningPc = $earningPc + $order->amountTimeUse($order);
        }
        $revenue[0] = round($earningProduct * 100 / ($earningProduct + $earningPc), 2);
        $revenue[1] = 100 - $revenue[0];
        $earning = implode(",", $earning);
        $revenue = implode(",", $revenue);
        return view('home', compact(['amount', 'annual', 'earning', 'revenue']));
    }

    public function show($id)
    {
        $order = Order::where('id', '=', $id)->first();
        $products = $order->getProducts($order->ids_product);
        return view('back-end.bills.detail', compact(['order', 'products']));
    }

    public function update(Request $request)
    {
        $order = Order::where('id', '=', $request->id)->first();
        $order->status = $request->status;
        if ($request->status == 3) $order->amount = $order->amount($order) + $order->amountTimeUse($order);
        else $order->amount = null;
        $order->save();
        return redirect()->route('admin.bill.list')->with('success', 'Updated successfully');
    }

    public function destroy(Request $request)
    {
        $order = Order::where('id', '=', $request->id)->first();
        $order->deleted_at = Carbon::now();
        $order->save();
        return redirect()->route('admin.bill.list')->with('success', 'Deleted successfully');
    }
}
