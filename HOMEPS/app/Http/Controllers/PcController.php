<?php

namespace App\Http\Controllers;

use App\Models\Pc;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PcController extends Controller
{
    public function index()
    {
        $orders = Pc::whereNull('deleted_by')->get();
        return view('back-end.PSmanager.PSlist', compact(['orders']));
    }

   
    public function create(Request $request)
    {
        $PC = new Pc;
        $PC->name = $request->name;
        $PC->save();
        return redirect()->route('admin.pc.list')->with('success','Create. successfully');
    }

   
    public function store(Request $request)
    {
    }

    public function show($id)
    {
        $PC = Pc::where('id',"=",$id)->first();
        return view('back-end.pc.detail',compact(('PC')));
    }

    public function edit(Pc $pc)
    {
    }

    public function update(Request $request)
    {
        $order = Pc::where('id', '=', $request->id)->first();
        $order->name = $request->name;
        if($request->status == 1) $order->use_at = Carbon::now();
        $order->save();
        return redirect()->route('admin.pc.list')->with('success','Updated successfully');
    }

    public function destroy(Request $request)
    {
        $order = Pc::where('id', '=', $request->id)->first();
        $order->deleted_by = 'admin Number';
        $order->save();
        return redirect()->route('admin.pc.list')->with('success','Deleted successfully');
    }
}
