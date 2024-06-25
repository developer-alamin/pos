<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Product;
use App\Serial;
use Illuminate\Http\Request;

class SerialController extends Controller
{
    public function index($id)
    {
        $product = Product::find($id);
        $brand_list = Brand::all();
        return view('backend.serial.index', compact('product', 'brand_list'));
    }

    public function post(Request $request, $id)
    {
        $request->validate([
            'warranty' => 'required',
            'cost' => 'required',
            'price' => 'required',
            'serials' => 'required',
        ]);

        $serialsArray = explode("\n", $request->serials);
        $serialsArray = array_map('trim', $serialsArray);
        foreach ($serialsArray as $serialNumber) {
            // Save each serial number to the database
            Serial::create([
                'product_id' => $id,
                'cost' => $request->cost,
                'price' => $request->price,
                'brand_id' => $request->brand,
                'color' => $request->color,
                'network' => $request->network,
                'size' => $request->size,
                'condition' => $request->condition,
                'warranty' => $request->warranty,
                'serials' => $serialNumber,
            ]);
        }

        return redirect()->route('serial.view', $id);
    }

    public function view($id)
    {
        $serials = Serial::where('product_id', $id)->with('brand')->latest()->get();
        $brand_list = Brand::all();
        return view('backend.serial.view', compact('serials', 'brand_list'));
    }

    public function edit($id)
    {
        $serial = Serial::find($id);
        return response()->json($serial);
    }

    public function update(Request $request, $id)
    {
        $serial = Serial::find($id);
        $serial->cost = $request->cost;
        $serial->price = $request->price;
        $serial->brand_id = $request->brand_id;
        $serial->color = $request->color;
        $serial->network = $request->network;
        $serial->size = $request->size;
        $serial->condition = $request->condition;
        $serial->warranty = $request->warranty;
        $serial->save();

        return response()->json([
            'success' => true,
            'message' => 'Serial Updated Successfully!!',
        ]);
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        // dd($id);
        foreach ($id as $user) {
            Serial::where('id', $user)->delete();
        }
        return redirect()->back()->with('message', 'Data Deleted Successfully!!');
    }
}
