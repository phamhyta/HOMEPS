<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    public function index()
    {
        $products = Product::whereNull('deleted_by')->get();
        return view('back-end.products.list', compact(['products']));
    }

    public function show($id)
    {
        $product = Product::where('id', '=', $id)->first();
        $thumbnail = explode(",", $product->thumbnail);
        $thumbnail[0] = str_replace("[", "", $thumbnail[0]);
        $thumbnail[sizeof($thumbnail) - 1] = str_replace("]", "", $thumbnail[sizeof($thumbnail) - 1]);
        for ($x = 0; $x < sizeof($thumbnail); $x++) {
            $thumbnail[$x] = str_replace("\"", "", $thumbnail[$x]);
        }
        return view('back-end.products.detail', compact(['product', 'thumbnail']));
    }

    public function update(Request $request)
    {
        $product = Product::where('id', '=', $request->id)->first();
        $product->name = $request->name;
        $product->product_desc = $request->product_desc;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->amount = $request->amount;
        $product->save();
        return redirect()->route('admin.product.list')->with('success', 'Updated successfully');
    }

    public function destroy(Request $request)
    {
        $product = Product::where('id', '=', $request->id)->first();
        $product->deleted_by = Carbon::now();
        $product->save();
        return redirect()->route('admin.product.list')->with('success', 'Deleted successfully');
    }

    public function create(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->product_desc = $request->product_desc;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->amount = $request->amount;

        $image = $request->file('url_image');
        $destinationPath = 'images/';
        $rand = substr(md5(microtime()), rand(0, 26), 5);
        $profileImage = date('YmdHis') . $rand . "." . $image->getClientOriginalExtension();
        $image->move($destinationPath, $profileImage);
        $product->url_image = "/images/" . $profileImage;

        $thumbnail = $request->file('thumbnail');
        $product->thumbnail = "[";

        foreach ($thumbnail as $file) {
            $rands = substr(md5(microtime()), rand(0, 26), 5);
            $fileName = date('YmdHis') . $rands . "." . $image->getClientOriginalExtension();
            $destinationPath = 'images/';
            $file->move($destinationPath, $fileName);

            $product->thumbnail = $product->thumbnail . "\"/images/" . $fileName . "\",";
        }
        $product->thumbnail = $product->thumbnail . "]";
        $product->save();
        return redirect()->route('admin.product.list')->with('success', 'Created successfully');
    }
}
