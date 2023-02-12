<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Pc;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $orders = Pc::whereNull('deleted_by')->get();
        return view('back-end.PSmanager.PSlist', compact(['orders']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $PC = new Pc;
        $PC->name = $request->name;
        $PC->save();
        return redirect()->route('admin.PSmanager.PSlist')->with('success','Create. successfully');
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
     * @param  \App\Models\Pc  $pc
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $PC = Pc::where('id',"=",$id)->first();
        return view('back-end.PSmanager.detail',compact(('PC')));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pc  $pc
     * @return \Illuminate\Http\Response
     */
    public function edit(Pc $pc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pc  $pc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $order = Pc::where('id', '=', $request->id)->first();
        $order->name = $request->name;
        if($request->status == 1) $order->use_at = Carbon::now();
        $order->save();
        return redirect()->route('admin.PSmanager.PSlist')->with('success','Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pc  $pc
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $order = Pc::where('id', '=', $request->id)->first();
        $order->deleted_by = 'admin Number';
        $order->save();
        return redirect()->route('admin.PSmanager.PSlist')->with('success','Deleted successfully');
    }
}
